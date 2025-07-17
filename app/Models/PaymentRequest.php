<?php

declare(strict_types=1);

namespace App\Models;

use App\Casts\PaymentRequestDescriptionCast;
use App\Enums\PaymentRequestStatusEnum;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property string $user_id
 * @property string $expenditure_category_id
 * @property string $shaba
 * @property int $amount
 * @property string|null $file
 * @property \App\ValueObjects\PaymentRequestDescription|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 */
class PaymentRequest extends Model
{

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['file_path'];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'status' => PaymentRequestStatusEnum::class,
            "description" => PaymentRequestDescriptionCast::class
        ];
    }

    public function filePath(): Attribute
    {
        return Attribute::make(
            get: fn(mixed $value, array $attributes) => "uploads" . DIRECTORY_SEPARATOR .
                "payment_requests" . DIRECTORY_SEPARATOR .
                $attributes['file'],
        );
    }

    // ========================= Relationships =========================
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function expenditureCategory(): BelongsTo
    {
        return $this->belongsTo(ExpenditureCategory::class, 'expenditure_category_id');
    }
}
