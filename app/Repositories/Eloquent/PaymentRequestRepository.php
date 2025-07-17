<?php

declare(strict_types=1);

namespace App\Repositories\Eloquent;

use App\Models\PaymentRequest;
use App\Repositories\Contracts\PaymentRequestRepositoryInterface;
use App\Uploader\FileUploader;
use App\ValueObjects\PaymentRequestDescription;
use Illuminate\Http\UploadedFile;

class PaymentRequestRepository implements PaymentRequestRepositoryInterface
{
    public function __construct(protected PaymentRequest $model, protected FileUploader $uploader) {}

    public function save(array $data, ?UploadedFile $attachment = null): void
    {
        $this->model->user_id = $data["userId"];
        $this->model->expenditure_category_id = $data["expenditureCategory"];
        $this->model->shaba = $data["shaba"];
        $this->model->amount = $data["amount"];

        if ($attachment) {
            $fileData = $this->uploader->upload(file: $attachment, subPath: "payment_requests");
            $this->model->file = $fileData["fileName"];
        }

        if (!empty($data["description"])) {
            $this->model->description = new PaymentRequestDescription($data["description"]);
        }

        $this->model->save();
    }
}
