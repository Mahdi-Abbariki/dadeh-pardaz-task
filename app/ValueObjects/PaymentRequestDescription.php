<?php

declare(strict_types=1);

namespace App\ValueObjects;

use InvalidArgumentException;

class PaymentRequestDescription
{

    public readonly string $userDescription;
    public readonly string $adminRejectDescription;

    public function __construct(
        string $userDescription = '',
        string $adminRejectDescription = ''
    ) {
        // Validation rules
        if (strlen($userDescription) > 1000) {
            throw new InvalidArgumentException('User description must not exceed 1000 characters.');
        }

        if (strlen($adminRejectDescription) > 1000) {
            throw new InvalidArgumentException('Admin reject description must not exceed 1000 characters.');
        }

        $this->userDescription = $userDescription;
        $this->adminRejectDescription = $adminRejectDescription;
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['userDescription'] ?? '',
            $data['adminRejectDescription'] ?? ''
        );
    }

    public function toArray(): array
    {
        return [
            'userDescription' => $this->userDescription,
            'adminRejectDescription' => $this->adminRejectDescription,
        ];
    }
}
