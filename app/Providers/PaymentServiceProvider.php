<?php

namespace App\Providers;

use App\Payment\Gateways\BarGateway;
use App\Payment\Gateways\FooGateway;
use App\Payment\Gateways\TestGateway;
use App\Payment\PaymentService;
use Illuminate\Support\ServiceProvider;

class PaymentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(FooGateway::class);
        $this->app->bind(BarGateway::class);
        $this->app->bind(TestGateway::class);

        $this->app->tag([
            FooGateway::class,
            BarGateway::class,
            TestGateway::class,
        ], 'payment.gateways');

        $this->app->bind(PaymentService::class, function ($app) {
            $gateways = $app->tagged('payment.gateways');
            return new PaymentService($gateways);
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
