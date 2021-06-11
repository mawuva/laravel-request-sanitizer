<?php

namespace Mawuekom\RequestSanitizer;

use Illuminate\Support\ServiceProvider;

class RequestSanitizerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Register the main class to use with the facade
        $this->app->singleton('request-sanitizer', function () {
            return new RequestSanitizer;
        });
    }
}
