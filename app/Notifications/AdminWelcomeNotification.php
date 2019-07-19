<?php

namespace App\Notifications;

use App\Entity\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class AdminWelcomeNotification extends Notification
{
    use Queueable;

    /** @var User $user */
    private $user;

    /**
     * AdminWelcomeNotification constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
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
        $url = url(route('admin::setPassword', ['token' => $this->user->getPasswordResetToken()]));

        return (new MailMessage)
                    ->greeting(sprintf("Hello %s", $this->user->getFullName()))
                    ->line('Your account admin has been successfully created')
                    ->line('Please setup your password by pressing button bellow')
                    ->action('Setup password', $url)
                    ->line('Thank you for using our application!')
                    ->subject('Welcome to Estimote App')
                    ->from('noreply@estimote-app.aslairlines.be', 'Estimote App');
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
