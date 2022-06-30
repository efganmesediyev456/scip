<?php

namespace App\Services\Payment;

use App\Contracts\CurrencyContract;
use App\Contracts\PaymentContract;
use App\Models\Transaction;
use Illuminate\Http\RedirectResponse;

abstract class PaymentHandler implements PaymentContract, CurrencyContract
{
    protected string $language = 'az';

    protected Transaction $transaction;

    public function __construct()
    {
        $this->transaction = new Transaction();
        $this->transaction->currency = self::AZN;
    }

    abstract public function redirect(): RedirectResponse;

    public function description(string $description): self
    {
        $this->transaction->description = $description;
        return $this;
    }

    public function amount(float $amount): self
    {
        $this->transaction->amount = $amount;
        return $this;
    }

    public function currency(int $currency): self
    {
        $this->transaction->currency = $currency;
        return $this;
    }

    public function language(string $language): self
    {
        $this->language = $language;

        return $this;
    }

    public function create(): self
    {
        return $this;
    }

    final public function generateChecksum(): string
    {
        return $this->transaction->makeChecksum();
    }

    final public function verifyChecksum(): bool
    {
        $checksum = hash('sha256', $this->transaction->gateway . '/'
            . $this->transaction->transaction_id . '/'
            . ($this->transaction->amount * 100)
            . $this->transaction->currency . '/'
            . hash('sha256', json_encode($this->transaction->meta)));

        return $this->transaction->checksum === $checksum;
    }

    public function setTransaction(Transaction $transaction): self
    {
        $this->transaction = $transaction;
        return $this;
    }
}
