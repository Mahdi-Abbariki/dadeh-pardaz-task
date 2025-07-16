<?php

namespace App\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;
use InvalidArgumentException;

class PhoneNumberCast implements CastsAttributes
{
    /**
     * Cast the given value.
     *
     * @param  array<string, mixed>  $attributes
     */
    public function get(Model $model, string $key, mixed $value, array $attributes): mixed
    {
        return $value;
    }

    /**
     * Prepare the given value for storage. it will convert any of {"+989123456789","00989123456789","9123456789","09123456789"} to 09123456789
     *
     * @param  array<string, mixed>  $attributes
     * @throws InvalidArgumentException
     * @return string
     */
    public function set(Model $model, string $key, mixed $value, array $attributes): mixed
    {
        throw_unless(is_scalar($value), throw new InvalidArgumentException('Phone number must be a string or number.'));

        // Remove any non-digit characters
        $digits = preg_replace('/\D/', '', $value);

        // Normalize different possible formats
        if (preg_match('/^98(\d{10})$/', $digits, $matches)) {
            return '0' . $matches[1];
        }
        if (preg_match('/^0098(\d{10})$/', $digits, $matches)) {
            return '0' . $matches[1];
        }
        if (preg_match('/^9\d{9}$/', $digits)) {
            return '0' . $digits;
        }
        if (preg_match('/^09\d{9}$/', $digits)) {
            return $digits;
        }

        throw new InvalidArgumentException("Invalid mobile number format.");
    }
}
