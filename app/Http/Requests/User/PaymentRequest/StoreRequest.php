<?php

namespace App\Http\Requests\User\PaymentRequest;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\File;

class StoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "expenditureCategory" => "required|exists:expenditure_categories,id",
            "nationalCode" => "required|exists:users,national_code",
            "shaba" => "required",
            "amount" => "required|numeric|min:1",
            "description" => "nullable|max:1000",
            "attachment" => [
                "nullable",
                File::types(['pdf', 'jpg', 'jpeg', 'png'])
                    ->max('5mb'),
            ],
        ];
    }

    public function attributes()
    {
        return [
            "expenditureCategory" => "دسته بندی",
            "nationalCode" => "کد ملی",
            "shaba" => "شماره شبا",
            "amount" => "مبلغ",
            "description" => "توضیحات",
            "attachment" => "فایل پیوست",
        ];
    }
}
