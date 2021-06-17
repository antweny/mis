<?php

namespace App\Notifications\User;

use App\Mail\User\CreateNewUserMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;

class CreateNewUserNotification extends Notification implements ShouldQueue
{
    use Queueable;

    private $password;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($password)
    {
        $this->password = $password;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail($notifiable)
    {
        $data = $this->data($notifiable,$this->password);

        return (new CreateNewUserMail($data))->to($notifiable->email);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }

    /* Assign data to one variable */
    private function data($notifiable,$password)
    {
        return [
            'name' => $notifiable->name,
            'email' => $notifiable->email,
            'password' => $password
        ];
    }
}
