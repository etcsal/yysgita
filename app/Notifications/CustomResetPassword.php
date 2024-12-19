<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class CustomResetPassword extends Notification
{
    protected $token;

    // Menerima token sebagai parameter
    public function __construct($token)
    {
        $this->token = $token;
    }

    // Menentukan saluran untuk mengirim notification (misalnya email)
    public function via($notifiable)
    {
        return ['mail'];  // Menggunakan saluran 'mail' untuk email
    }

    // Menentukan bagaimana email dikirim
    public function toMail($notifiable)
    {
        $url = route('password.reset', ['token' => $this->token]);

        return (new MailMessage)
            ->subject('Reset Password Request')
            ->view('emails.reset_password', ['url' => $url]);
    }
}
