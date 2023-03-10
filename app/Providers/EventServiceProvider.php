<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Events\ModelCreated;
use App\Listeners\ProcessModelImageOnCreated;
use App\Events\NewUserAdded;
use App\Listeners\SendMailToUser;
// use Illuminate\Database\Events\MigrationsStarted;
// use App\Models\Make;
// use App\Observers\MakeObserver;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        NewUserAdded::class => [
            SendMailToUser::class,
        ],
        ModelCreated::class => [
            ProcessModelImageOnCreated::class,
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        // Make::observe(MakeObserver::class);

        // Event::listen(MigrationsStarted::class, function($event) {
            
        // });
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
