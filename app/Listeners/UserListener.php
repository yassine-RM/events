<?php

namespace App\Listeners;

use App\Events\UserEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserMail;

class UserListener
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
     * @param  UserEvent  $event
     * @return void
     */
    public function handle(UserEvent $event)
    {
        //
        Mail::to($event->user->email)->send(new UserMail($event->user));
    }
}