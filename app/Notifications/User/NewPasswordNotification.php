<?php

namespace App\Notifications\User;

use App\Mail\User\NewPasswordMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewPasswordNotification extends Notification implements ShouldQueue
{
    use Queueable;


    //Get new generated password
    private $password;

    /**
     * Create a new notification instance.
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
//    public function toMail($notifiable)
//    {
//        $data = [ 'name'=>$notifiable->name, 'password'=>$this->password ];
//
//        return (new NewPasswordMail($data))->to($notifiable->email);
//    }
    public function toMail($notifiable)
    {
        return (new MailMessage)
                ->subject('New Password')
                ->markdown('emails.user.new-password', ['name' => $notifiable->name,'password'=>$this->password]);;
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
}
