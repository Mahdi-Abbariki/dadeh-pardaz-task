<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ShabaNumberValidRule implements ValidationRule
{
    public function __construct(protected \App\Payment\PaymentService $paymentService) {}


    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!$this->paymentService->validateShaba($value))
            $fail(":attribute وارد شده صحیح نمی‌باشد");
    }
}
