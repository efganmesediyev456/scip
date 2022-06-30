<?php

namespace App\Services\Payment;

use App\Jobs\ProcessKapitalBankPayment;
use App\Models\Transaction;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class KapitalBankGateway extends PaymentHandler
{
    /**
     * @throws \Throwable
     */
    public function purchase(): PaymentHandler
    {
        $xml = [
            'TKKPG' => [
                'Request' => [
                    'Operation' => 'CreateOrder',
                    'Order' => [
                        'OrderType' => 'Purchase',
                        'Amount' => $this->transaction->amount * 100,
                        'Currency' => $this->transaction->currency,
                        'Description' => $this->transaction->description
                    ]
                ]
            ]
        ];

        $response = $this->request($xml, 'Purchase');

        throw_if($response->Status !== "00", new \Exception("Purchase failed with code: " . $response->Status));

        $transactionId = Str::uuid();

        $this->transaction->gateway = Transaction::GATEWAYS['kapitalbank'];
        $this->transaction->transaction_id = $transactionId;
        $this->transaction->meta = [
            'order_id' => $response->Order->OrderID,
            'session_id' => $response->Order->SessionID,
        ];

        $this->transaction->checksum = $this->generateChecksum();
        $this->transaction->save();

        return $this;
    }

    /**
     * @throws \Throwable
     */
    public function information(): array
    {
        $xml = [
            'TKKPG' => [
                'Request' => [
                    'Operation' => 'GetOrderInformation',
                    'Order' => [
                        'OrderID' => $this->transaction->meta->order_id,
                    ],
                    'SessionID' => $this->transaction->meta->session_id
                ]
            ]
        ];

        return (array) $this->request($xml, 'GetOrderStatus');
    }

    public function redirect(): RedirectResponse
    {
        return redirect()->to(config('services.kapitalbank.client_url') . '?' . http_build_query([
                'orderid' => $this->transaction->meta->order_id,
                'sessionid' => $this->transaction->meta->session_id
            ]));
    }

    /**
     * @throws \Exception
     */
    public function process(): void
    {
        $body = xml_to_countable(request()->toArray()['xmlmsg']);

        dispatch(new ProcessKapitalBankPayment((array)$body))->onQueue('payment');
    }

    /**
     * @throws \Exception
     */
    private function request(array $xml, string $operation): object
    {
        $xml['TKKPG']['Request']['Language'] = strtoupper($this->language);
        $xml['TKKPG']['Request']['Order']['Merchant'] = config('services.kapitalbank.merchant_id');
        $xml['TKKPG']['Request']['Order']['ApproveURL'] = route('process-payment');
        $xml['TKKPG']['Request']['Order']['CancelURL'] = route('process-payment');
        $xml['TKKPG']['Request']['Order']['DeclineURL'] = route('process-payment');

        Log::channel('payment')->notice("Payment request $operation:", [array_to_xml($xml)]);

        $response = Http::send('post', config('services.kapitalbank.base_url'), [
            'body' => array_to_xml($xml),
            'headers' => [
                'Content-Type' => 'text/xml; charset=UTF8'
            ],
            'verify' => false,
            'cert' => [storage_path('app/private/kapitalbank.pem'), ''],
            'ssl_key' => storage_path('app/private/kapitalbank.key'),
        ]);

        Log::channel('payment')->notice("Payment response $operation:", [$response->body()]);

        return xml_to_countable($response)->Response ?? xml_to_countable($response)->row ?? xml_to_countable($response);
    }
}
