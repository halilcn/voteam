<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TestNotification extends Notification
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
        return ['database'];
    }


    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        if ($notifiable->language === User::$LANGUAGES['TR']) {
            return [
                'message' => 'Bur bir test bilidirimidir.',
                'action' => User::$NOTIFICATION_ACTIONS['CELEBRATION']
            ];
        }

        if ($notifiable->language === User::$LANGUAGES['EN']) {
            return [
                'message' => 'This is a example notification.',
                'action' => User::$NOTIFICATION_ACTIONS['CELEBRATION']
            ];
        }
    }
}
