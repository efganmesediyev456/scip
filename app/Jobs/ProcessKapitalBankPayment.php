<?php

namespace App\Jobs;

use App\Events\PaymentProcessed;
use App\Exceptions\ExhaustedTransactionException;
use App\Exceptions\InvalidTransactionStatusException;
use App\Exceptions\MissingTransactionException;
use App\Models\Transaction;
use App\Services\Payment\PaymentHandler;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessKapitalBankPayment implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    private array $body;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(array $body)
    {
        $this->body = $body;
    }

    /**
     * Execute the job.
     *
     * @return void
     * @throws \Throwable
     */
    public function handle(PaymentHandler $paymentHandler)
    {
        unset($this->body['@attributes']);

        $this->body['order_id'] = $this->body['OrderID'];
        $this->body['session_id'] = $this->body['SessionID'];

        /** @var $transaction Transaction */
        $transaction = Transaction::whereStatus(Transaction::STATUS['pending'])
            ->whereJsonContains('meta->order_id', $this->body['order_id'])
            ->whereJsonContains('meta->session_id', $this->body['session_id'])
            ->first();

        throw_unless($transaction, new MissingTransactionException());

        $result = $paymentHandler->setTransaction($transaction)->information();

        unset($result['id']);
        unset($result['SessionID']);

        $transaction->meta = array_merge((array)$transaction->meta, $result);
        $transaction->checksum = $transaction->makeChecksum();

        $status = (match ($transaction->meta->Orderstatus) {
            'PREAUTH-APPROVED', 'APPROVED' => $transaction::STATUS['approved'],
            'CANCELED' => $transaction::STATUS['canceled'],
            'EXPIRED', 'DECLINED' => $transaction::STATUS['declined'],
            'ON-PAYMENT', 'ON-LOCK', 'CREATED' => $transaction::STATUS['pending'],
            default => throw new InvalidTransactionStatusException($transaction->meta->OrderStatus)
        });

        if ($status === $transaction::STATUS['pending']) {
            throw_if($this->attempts() > 5, new ExhaustedTransactionException());

            $this->release(60);
            return;
        }

        $transaction->status = $status;
        $transaction->save();

        PaymentProcessed::dispatch($transaction);
    }
}
