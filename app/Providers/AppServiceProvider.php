<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Car;
use App\Models\Make;
use App\Models\Bodytype;



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
        View::share('makes', Make::all());
        View::share('bodies', Bodytype::all());
        View::share('carousels', Car::latest()->limit(5)->get());
        Schema::defaultStringLength(191);


        // Mail::extend('sendgrid', function (array $config = []) {
        //     return new MailchimpTransport();
        // })
    }
}
