<?php

namespace App\Providers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // اطمینان از تشخیص درست پروتکل HTTPS در لیارا
        if (config('app.env') === 'production') {
            // اجبار HTTPS برای URLها (ضروری برای Liara)
            URL::forceScheme('https');
        }



    }
}
