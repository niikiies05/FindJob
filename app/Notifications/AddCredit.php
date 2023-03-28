<?php

namespace App\Notifications;

use App\Models\Credit;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;

class AddCredit extends Notification
{
    use Queueable;

    public $credit;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Credit $credit)
    {
        $this->credit = $credit;
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
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
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
            'credit_id' => $this->credit->id,
            'credit_transaction' => $this->credit->transaction_number,
            'user_id' => Auth::user()->id
        ];
    }
}
