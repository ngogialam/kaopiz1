<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        /*Register is_phone validator*/
        Validator::extend('is_phone', function ($attribute, $value, $parameters, $validator) {  
            return substr($value, 0, 3) === '+84';
        });
    }
}
