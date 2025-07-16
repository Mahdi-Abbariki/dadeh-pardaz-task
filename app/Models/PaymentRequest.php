<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PaymentRequest extends Model
{
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
