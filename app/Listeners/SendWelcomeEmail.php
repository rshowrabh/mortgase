<?php

namespace App\Listeners;

use App\Events\SendUserConfirmEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\SendConfirmEmail;
use Mail;

class SendWelcomeEmail
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
     * @param  SendUserConfirmEmail  $event
     * @return void
     */
    public function handle(SendUserConfirmEmail $event)
    {
        $email = $event->user->email;
        Mail::to($email)->queue(new SendConfirmEmail($event->user));
    }
}
