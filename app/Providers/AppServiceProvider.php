<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Product;
use App\Models\Brand;



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
        if (!app()->runningInConsole()) {
            View::share('brands', Brand::all());
            View::share('carousels', Product::latest()->limit(5)->get());
        }
        Schema::defaultStringLength(191);


        // Mail::extend('sendgrid', function (array $config = []) {
        //     return new MailchimpTransport();
        // })
    }
}
