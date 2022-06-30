<?php

namespace App\Services\Sms;

use Illuminate\Support\Facades\Log;

class LogSmsGateway extends SmsHandler
{
    public function send(string $message): bool
    {
        Log::channel('sms')->info("SMS sent to $this->to: $message");

        return true;
    }
}
