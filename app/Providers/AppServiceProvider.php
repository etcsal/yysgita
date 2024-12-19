<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Auth\Notifications\VerifyEmail;
use App\Notifications\CustomVerifyEmail;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Mengubah tampilan email verifikasi dengan notifikasi kustom
        VerifyEmail::toMailUsing(function ($notifiable) {
            return (new CustomVerifyEmail())->toMail($notifiable);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
