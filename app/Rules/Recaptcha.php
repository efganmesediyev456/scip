<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Http;

class Recaptcha implements Rule
{
    protected string $action;

    public function __construct(string $action)
    {
        $this->action = $action;
    }

    public function passes($attribute, $value): bool
    {
        if (config('app.debug')) {
            return true;
        }

        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => config('services.recaptcha.secret'),
            'response' => $value,
            'remoteip' => request()->ip(),
        ])->object();

        if ($response->success && ($response->action === $this->action)) {
            if ($response->score < config('services.recaptcha.threshold')) {
                return false;
            }

            return true;
        }

        return false;
    }

    public function message(): string
    {
        return __('recaptcha-failed');
    }
}
