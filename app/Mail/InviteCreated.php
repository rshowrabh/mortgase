<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Invite;

class InviteCreated extends Mailable
{
    use Queueable, SerializesModels;
    public $url;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($url)
    {
        $this->url = $url;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->from('laravel@yourmortgageappy.ca')->markdown('emails.invite');
        //     $address = '_mainaccount@yourmortgageappy.ca';
        //     $subject = 'This is a demo!';
        //     $name = 'Jane Doe';

        //     return $this->view('emails.invite')
        //                 ->from($address, $name)
        //                 ->cc($address, $name)
        //                 ->bcc($address, $name)
        //                 ->replyTo($address, $name)
        //                 ->subject($subject)
        //                 ->with([ 'test_message' => $this->invite['email'] ]);
    }
}
