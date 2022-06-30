<?php

namespace App\Services\Payment;

use App\Models\Transaction;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

/**
 *      Generate P12 Keystore and regenerate certificate and key
 *
 *      > cat pashabank.key certificate.XXXXXX.pem > pashabank.keystore
 *      > openssl pkcs12 -export -in pashabank.keystore -out pashabank.pkcs12
 *      > openssl pkcs12 -in pashabank.pkcs12 -out pashabank.cert.pem -clcerts -nokeys
 *      > openssl pkcs12 -in pashabank.pkcs12 -out pashabank.key.pem -nocerts -nodes
 *
 *      Usage:
 *
 *      use App\Services\Payment\PaymentGateway;
 *
 *      Route::get('pay',function (PaymentHandler $paymentHandler) {
 *          return $paymentGateway->amount(10.5)
 *                      ->currency($paymentHandler::CURRENCY_AZN)
 *                      ->description('Test payment')
 *                      ->create()
 *                      ->redirect();
 *      });
 */
class PashaBankGateway extends PaymentHandler
{
    public function create(): PaymentHandler
    {
        $params = [
            "command" => "V",
            "amount" => urlencode($this->transaction->amount * 100),
            "currency" => urlencode($this->transaction->currency),
            "description" => urlencode($this->transaction->description),
            "purchase_description" => urlencode($this->transaction->description),
            "language" => urlencode($this->language),
            "msg_type" => "SMS",
            "client_ip_addr" => urlencode(request()->ip())
        ];

        Log::channel('payment')->notice("Payment request:", $params);

        $result = Http::withoutVerifying()->withOptions([
            'cert' => [config('services.pashabank.certificate'), config('services.pashabank.password')],
            'ssl_key' => config('services.pashabank.key'),
        ])->post(config('services.pashabank.merchant_url') . '?' . http_build_query($params));

        Log::channel('payment')->notice("Payment response:", [$result->body()]);

        $transactionId = explode(' ', $result->body())[1];

        $this->transaction->gateway = Transaction::GATEWAYS['pashabank'];
        $this->transaction->transaction_id = $transactionId;
        $this->transaction->meta = $params;

        $this->transaction->checksum = $this->generateChecksum();
        $this->transaction->save();

        return $this;
    }

    public function redirect(): RedirectResponse
    {
        return redirect()->to(config('services.pashabank.client_url') .
            '?trans_id=' . urlencode($this->transaction->transaction_id));
    }

    public function process(): void
    {
        // todo: implement payment process
    }
}
