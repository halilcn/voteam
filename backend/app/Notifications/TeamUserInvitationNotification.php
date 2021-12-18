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
        $notification = collect([
                                    User::$LANGUAGES['TR'] => [
                                        'message' => $this->teamName.' takımından sana davetiye gönderildi ! E-mail hesabını kontrol et',
                                    ],
                                    User::$LANGUAGES['EN'] => [
                                        'message' => $this->teamName.' an invitation has been sent to you ! Check your e-mail account',
                                    ]
                                ]);

        return $notification->map(function ($item) {
            $item['action'] = User::$NOTIFICATION_ACTIONS['INVITATION'];
            return $item;
        })->toArray();
    }
}
