<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ResetPasswordNotification extends Notification
{
    use Queueable;

    protected $token;
    public $email;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(string $token, $email)
    {
        //
        $this->token=$token;
        $this->email=$email;
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
        $url = "http://reserva.test/api/resetPassword/{$this->token}"."?email={$this->email}";

        return (new MailMessage)
                    ->subject('Nova senha')
                    ->line('Este é um link para recuperação de sua palavra passe. click no link a baixo para alterar sua senha')
                    ->action('Click aqui para redifinição da sua senha', $url)
                    ->line('Obrigado por usar a nossa aplicação para recuperação  de sua palavra passe!');
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
