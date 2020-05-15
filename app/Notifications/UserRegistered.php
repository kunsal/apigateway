<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserRegistered extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $appName = env('APP_NAME');
        $activationUrl = url('activate-account/'.$notifiable->activation_code);
        return (new MailMessage)
                    ->from('hello@deleevr.com', $appName)
                    ->subject('Welcome to ' . $appName)
                    ->line('Hi ' . $notifiable->name . ',')
                    ->line('Thank you for opening an account with us at ' . $appName . '.')
                    ->line('Please click the link below to activate your account and enjoy our services')
                    ->action('Activate your account', $activationUrl)
                    ->line(' ')
                    ->line('The ' . $appName . ' team');
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
