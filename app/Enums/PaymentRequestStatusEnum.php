<?php

declare(strict_types=1);

namespace App\Enums;

enum PaymentRequestStatusEnum: int
{
    case Confirmed = "C";
    case Rejected = "R";
    case Pending = "P";
}
