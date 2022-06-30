<?php

namespace App\Services\Sms;

use App\Contracts\SmsContract;

abstract class SmsHandler implements SmsContract
{
    protected ?string $to = null;

    abstract public function send(string $message): bool;

    public function to(string $to): self
    {
        $this->to = $to;

        return $this;
    }
}
