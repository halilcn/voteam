<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TeamUserInvitationNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(public string $teamName)
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
        $default = [
            'action' => User::$NOTIFICATION_ACTIONS['Invitation']
        ];

        return [
            'tr' => [
                array_merge([
                                'message' => $this->teamName.' takımından sana davetiye gönderildi ! E-mail hesabını kontrol et',
                            ], $default)
            ],
            'en' => [
                array_merge([
                                'message' => $this->teamName.' an invitation has been sent to you ! Check your e-mail account',
                            ], $default)
            ]
        ];
    }
}
