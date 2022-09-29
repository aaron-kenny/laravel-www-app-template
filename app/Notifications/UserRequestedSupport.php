<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserRequestedSupport extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * The requester's name
     *
     * @var string
     */
    protected $requesterName;
    
    /**
     * The requester's email
     *
     * @var string
     */
    protected $requesterEmail;
    
    /**
     * The requester's message
     *
     * @var string
     */
    protected $requesterMessage;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->requesterName = $data['name'];
        $this->requesterEmail = $data['email'];
        $this->requesterMessage = $data['message'];
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
                    ->replyTo($this->requesterEmail, $this->requesterName)
                    ->markdown('mail.user-requested-support', [
                        'requesterName' => $this->requesterName,
                        'requesterMessage' => $this->requesterMessage
                    ]);
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