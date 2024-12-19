<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\URL;

class CustomVerifyEmail extends Notification
{
    /**
     * Kirim email verifikasi kustom.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        // Menghasilkan URL verifikasi
        $verificationUrl = URL::temporarySignedRoute(
            'verification.verify',  // Route untuk verifikasi email
            now()->addMinutes(60),   // Kedaluwarsa URL setelah 60 menit
            ['id' => $notifiable->getKey(), 'hash' => sha1($notifiable->getEmailForVerification())]
        );

        // Mengirim data ke view email
        return (new MailMessage)
            ->subject('Verifikasi Alamat Email Anda')
            ->view('emails.verification', [
                'actionUrl' => $verificationUrl,  // Pastikan actionUrl dikirim
                'actionText' => 'Verifikasi Email',  // Teks tombol yang ditampilkan
            ]);
    }

    /**
     * Membuat URL untuk verifikasi email.
     *
     * @param  mixed  $notifiable
     * @return string
     */
    protected function verificationUrl($notifiable)
    {
        // Membuat URL verifikasi berdasarkan ID pengguna dan hash email
        return url(route('verification.verify', [
            'id' => $notifiable->getKey(),
            'hash' => sha1($notifiable->getEmailForVerification()),
        ], false));
    }
}
