<?php

namespace App\Providers;

use App\Services\FonadaSmsService;
use App\Services\SmsService;
use App\Services\TwilioSmsService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    //register services
    public function register(): void
    {
        $mobile = request()->mobile;
        if ($mobile && (str_starts_with($mobile, "+91") || str_starts_with($mobile, "91"))) {
            $this->app->bind(SmsService::class, FonadaSmsService::class);
        } else {
            $this->app->bind(SmsService::class, TwilioSmsService::class);
        }
    }

    //Bootstrap any application services.
    public function boot(): void
    {
    }
}