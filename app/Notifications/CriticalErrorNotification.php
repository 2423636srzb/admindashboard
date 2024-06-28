<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CriticalErrorNotification extends Notification
{
    use Queueable;

    public $errorDetails;

    public function __construct($errorDetails)
    {
        $this->errorDetails = $errorDetails;
    }

    public function via($notifiable)
    {

        return ['database'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('A critical error has occurred:')
                    ->line($this->errorDetails)
                    ->line('Please check the system immediately.');
    }

    public function toArray($notifiable)
    {
        return [
            'errorDetails' => $this->errorDetails,
        ];
    }
}
