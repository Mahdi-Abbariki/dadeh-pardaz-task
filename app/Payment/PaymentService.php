<?php

declare(strict_types=1);

namespace App\Payment;

use App\Payment\Contracts\GatewayInterface;

class PaymentService
{
    /**
     * @param GatewayInterface[] $gateways
     */
    public function __construct(
        protected iterable $gateways,
    ) {}

    public function validateShaba(string $shaba): bool
    {
        $flag = false;
        foreach ($this->gateways as $gateway) {
            $flag = $gateway->validateShaba($shaba);
            if ($flag) break;
        }
        return $flag;
    }
}
