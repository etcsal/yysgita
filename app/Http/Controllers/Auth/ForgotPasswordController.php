<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\CustomResetPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Str;  // Tambahkan ini
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    /*
    |----------------------------------------------------------------------
    | Password Reset Controller
    |----------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */
    public function showLinkRequestForm()
    {
        return view('auth.passwords.email'); // Pastikan ini sesuai dengan lokasi view Anda
    }
    // Gantilah trait SendsPasswordResetEmails dengan metode Anda sendiri
    public function sendResetLinkEmail(Request $request)
    {
        // Validasi email
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        // Kirim email reset password
        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status == Password::RESET_LINK_SENT
                ? back()->with('status', __($status))
                : back()->withErrors(['email' => __($status)]);
    }
}
