<?php

namespace App\Providers;

use App\Repositories\Contracts\PaymentRequestRepositoryInterface;
use App\Repositories\Eloquent\PaymentRequestRepository;
use App\Uploader\FileUploader;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(PaymentRequestRepositoryInterface::class, PaymentRequestRepository::class);
        $this->app->singleton(FileUploader::class, function ($app) {
            return new FileUploader(config('filesystems.default'), 'uploads');
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
