<?php

namespace App\Http\Controllers\User\PaymentRequests;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\PaymentRequest\StoreRequest;
use App\Models\User;
use App\Repositories\Contracts\PaymentRequestRepositoryInterface;

class StoreController extends Controller
{
    public function __construct(protected PaymentRequestRepositoryInterface $repository) {}

    /**
     * Handle the incoming request.
     */
    public function __invoke(StoreRequest $request)
    {
        $data = $request->only([
            "expenditureCategory",
            "shaba",
            "amount",
            "description"
        ]);
        $data["userId"] = User::query()->where("national_code", $request->nationalCode)->first(["id"])?->getKey();

        $this->repository->save($data, $request->hasFile("attachment") ? $request->file("attachment") : null);

        return redirect()->back()->with("store-success", "هزینه کرد با موفقیت ثبت شد.");
    }
}
