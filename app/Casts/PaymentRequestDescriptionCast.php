<?php

namespace App\Casts;

use App\ValueObjects\PaymentRequestDescription;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;
use InvalidArgumentException;

class PaymentRequestDescriptionCast implements CastsAttributes
{
    /**
     * Cast the given value.
     *
     * @param  array<string, mixed>  $attributes
     */
    public function get(Model $model, string $key, mixed $value, array $attributes): PaymentRequestDescription
    {
        return PaymentRequestDescription::fromArray(json_decode($value, associative: true, flags: JSON_UNESCAPED_UNICODE) ?? []);
    }

    /**
     * Prepare the given value for storage.
     *
     * @param  array<string, mixed>  $attributes
     */
    public function set(Model $model, string $key, mixed $value, array $attributes): mixed
    {
        if ($value instanceof PaymentRequestDescription) {
            return $value->hasDescription() ? json_encode($value->toArray(), flags: JSON_UNESCAPED_UNICODE) : null;
        }

        throw new InvalidArgumentException('The given value is not a PaymentRequestDescription instance.');
    }
}
