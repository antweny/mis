<?php

namespace App\Mail\User;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CreateNewUserMail extends Mailable
{
    use Queueable, SerializesModels;

    /* Get user Pas*/
    public $data;

    /* Create a new message instance. */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /* Build the message */
    public function build()
    {
        return $this->markdown('emails.user.new-user')
            ->with([
                'name' => $this->data['name'],
                'email' => $this->data['email'],
                'password' =>$this->data['password'],
            ])
            ->subject('User Registered');
    }
}
