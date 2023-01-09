<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SavedQoutationNotification extends Notification  implements ShouldQueue
{
    use Queueable;

    protected  $quotation;
    protected  $user;
    protected  $text;
    protected  $subject;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user,$text,$subject)
    {
        $this->user=$user;
        //$this->quotation=$quotation;
        $this->text=$text;
        $this->subject=$subject;
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
        return (new MailMessage)
            ->subject($this->subject)
            ->greeting('Ciao '. $this->user->name)
            ->line($this->text)
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
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
