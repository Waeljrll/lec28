<?php

namespace App\Listeners;

use App\Mail\UserRegisterMail;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendEmailForUserRegisterdListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(Registered $event): void
    {

        Mail::to($event->user->email)
        ->later(now()->addSeconds(2), new UserRegisterMail($event->user));
    }
}
