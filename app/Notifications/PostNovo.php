<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PostNovo extends Notification
{
    use Queueable;
    private $mensagem;
    private $conteudo;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($mensagem,$conteudo)
    {
        $this->mensagem = $mensagem;
        $this->conteudo = $conteudo;
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
                    ->subject($this->mensagem)
                    ->line('Ola você cadastrou um novo post,com o seguinte conteudo:')
                    ->line($this->conteudo)
                    ->line('Obrigado por cadastrar!');
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
