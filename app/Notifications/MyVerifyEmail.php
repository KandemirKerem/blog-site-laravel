<?php

namespace App\Notifications;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;

class MyVerifyEmail extends VerifyEmail
{
    public function toMail($notifiable)
    {
        $verificationUrl = $this->verificationUrl($notifiable);

        return (new MailMessage)
            ->subject('NovaBlog - Hesabını Doğrula 🚀')
            ->greeting('Merhaba ' . $notifiable->name . '!')
            ->line('NovaBlog ailesine hoş geldin! Aramıza katıldığın için çok mutluyuz.')
            ->line('Hesabını aktifleştirmek ve blog yazmaya başlamak için aşağıdaki butona tıklaman yeterli.')
            ->action('E-posta Adresimi Doğrula', $verificationUrl)
            ->line('Eğer bu hesabı sen oluşturmadıysan, bu maili görmezden gelebilirsin.')
            ->salutation('Keyifli okumalar, NovaBlog.');
    }
}
