<?php

namespace App\Listeners;

use App\Events\NewUserAdded as NewEvent;
use App\Mail\NewUserAdded;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;

class SendMailToUser
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\NewUserAdded  $event
     * @return void
     */
    public function handle(NewEvent $event)
    {
        Mail::to($event->user)->send(new NewUserAdded($event->user, $event->token));
    }

}
