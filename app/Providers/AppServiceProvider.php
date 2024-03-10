<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
    Validator::extend('base64image', function ($attribute, $value, $parameters, $validator) {
        // Check if the value starts with 'data:image'
        if (Str::startsWith($value, 'data:image')) {
            // Extract the MIME type from the data URL
            $mime = explode(';', $value)[0];

            // Check if the MIME type is supported
            return in_array($mime, ['data:image/jpeg', 'data:image/png']);
        }

        return false;
    });
    }
}
