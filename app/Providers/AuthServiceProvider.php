<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Auth\Notifications\VerifyEmail;
use App\Notifications\CustomVerifyEmail;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Menyesuaikan email verifikasi dengan custom template
        VerifyEmail::toMailUsing(function ($notifiable, $url) {
            return (new CustomVerifyEmail())->toMail($notifiable);
        });
    }
}
