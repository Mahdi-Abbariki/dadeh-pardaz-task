<?php

namespace App\Repositories\Contracts;

use Illuminate\Http\UploadedFile;

interface PaymentRequestRepositoryInterface
{
    public function save(array $data, ?UploadedFile $attachment = null): void;
}
