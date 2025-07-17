<?php

declare(strict_types=1);

namespace App\Payment\Gateways;

use App\Payment\Contracts\GatewayInterface;

class FooGateway implements GatewayInterface
{
    public function validateShaba(string $shaba): bool
    {
        return substr($shaba, 0, 2) == "11";
    }
}
