<?php

namespace App\Contracts;

interface SmsContract
{
    public function to(string $to): self;

    public function send(string $message): bool;
}
