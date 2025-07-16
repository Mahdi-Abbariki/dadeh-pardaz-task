<?php

declare(strict_types=1);

namespace App\Models;

use App\Casts\PaymentRequestDescriptionCast;
use App\Enums\PaymentRequestStatusEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PaymentRequest extends Model
{
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
