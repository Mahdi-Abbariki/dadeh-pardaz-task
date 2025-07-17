<?php

namespace App\Http\Controllers\User\PaymentRequests;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\PaymentRequest\StoreRequest;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(StoreRequest $request)
    {
        dd($request->all());
    }
}
