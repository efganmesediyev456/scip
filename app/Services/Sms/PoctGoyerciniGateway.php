<?php

namespace App\Services\Sms;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class PoctGoyerciniGateway extends SmsHandler
{
    public function send(string $message): bool
    {
        $to = $this->to;

        dispatch(function () use ($message, $to) {
            Log::channel('sms')->notice("SMS Request to $this->to: " . preg_replace('/<hidden>.*<\/hidden>/', 'XXX', $message));

            $response = Http::asJson()->post(config('services.poctgoyercini.base_url'), [
                "Message" => str_replace(['<hidden>','</hidden>'], '', $message),
                "Receivers" => [
                    $to
                ],
                "Username" => config('services.poctgoyercini.username'),
                "Password" => config('services.poctgoyercini.password'),
            ]);

            Log::channel('sms')->notice("SMS Response to $this->to: ", [$response->body()]);
        })->onQueue('sms');

        return true;
    }
}
