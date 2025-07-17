<?php

namespace App\Http\Controllers\User\PaymentRequests;

use App\Http\Controllers\Controller;
use App\Models\ExpenditureCategory;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $categories = ExpenditureCategory::all();

        return view("user.paymentRequest.create", [
            "categories" => $categories
        ]);
    }
}
