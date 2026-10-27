<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Http;

class Turnstile implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (empty($value)) {
            $fail('Lütfen bot doğrulamasını tamamlayın.');
            return;
        }

        $secret = config('services.turnstile.secret');

        if (empty($secret)) {
            return;
        }

        try {
            $response = Http::asForm()->timeout(10)->post('https://challenges.cloudflare.com/turnstile/v0/siteverify', [
                'secret' => $secret,
                'response' => $value,
                'remoteip' => request()->ip(),
            ]);

            if (! $response->successful() || ! $response->json('success')) {
                $fail('Bot doğrulaması başarısız oldu. Lütfen tekrar deneyin.');
            }
        } catch (\Throwable $e) {
            report($e);
            $fail('Doğrulama servisine bağlanırken bir hata oluştu. Lütfen tekrar deneyin.');
        }
    }
}
