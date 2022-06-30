<?php

namespace App\Services\Payment;

use App\Jobs\ProcessKapitalBankPayment;
use App\Models\Transaction;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class FakeBankGateway extends PaymentHandler
{
    public function create(): PaymentHandler
    {
        $params = [
            "amount" => urlencode($this->transaction->amount * 100),
            "currency" => urlencode($this->transaction->currency),
            "description" => urlencode($this->transaction->description),
            "language" => urlencode($this->language),
            "client_ip_addr" => urlencode(request()->ip())
        ];

        Log::channel('payment')->notice("Payment request:", $params);

        Log::channel('payment')->notice("Payment response:", ['OK']);

        $this->transaction->gateway = Transaction::GATEWAYS['fake'];
        $this->transaction->transaction_id = strtoupper(Str::random());
        $this->transaction->meta = $params;

        $this->transaction->checksum = $this->generateChecksum();
        $this->transaction->save();

        return $this;
    }

    public function redirect(): RedirectResponse
    {
        echo '<html>
<form method="post" name="fake_payment" action="'.route('process-payment', ['transaction_id' => $this->transaction->transaction_id]).'">

</form>
<script >
window.onload = function(){
  document.forms["fake_payment"].submit();
}
</script>
</html>';
        exit;
    }

    public function process(): void
    {
        $this->setTransaction(Transaction::whereTransactionId(request()->query('transaction_id'))->first());

        $this->transaction->status = Transaction::STATUS['approved'];
    }
}
