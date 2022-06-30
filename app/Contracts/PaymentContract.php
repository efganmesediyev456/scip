<?php

namespace App\Contracts;

use App\Models\Transaction;
use Illuminate\Http\RedirectResponse;

interface PaymentContract
{
    public function description(string $description): self;

    public function amount(float $amount): self;

    public function currency(int $currency): self;

    public function create(): self;

    public function redirect(): RedirectResponse;

    public function generateChecksum(): string;

    public function verifyChecksum(): bool;

    public function process(): void;

    public function setTransaction(Transaction $transaction): self;
}
