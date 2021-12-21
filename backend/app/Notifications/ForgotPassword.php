<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\ForgotPassword as ForgotPasswordModel;

class ForgotPassword extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(public ForgotPasswordModel $forgotPassword)
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
        $FORGOT_PASSWORD_URL = config('app.frontend_url').'forgot-password/'.$this->forgotPassword->key;

        return (new MailMessage)
            ->view('emails.users.forgot-password', ['url' => $FORGOT_PASSWORD_URL])
            ->subject(config('app.name').' | '.'Forgot Password');
    }
}
