<?php

namespace App\Payment\Contracts;

interface GatewayInterface
{
    public function validateShaba(string $shaba): bool;
}
