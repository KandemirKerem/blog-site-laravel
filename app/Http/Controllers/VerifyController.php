<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

class VerifyController extends Controller
{
    public function notice(){
        return view('auth.verify-email');
    }

    public function verify(EmailVerificationRequest $request){
        $request->fulfill();
        return redirect('/profile');
    }

    public function resend(Request $request){
        // 1. Zaten doğrulanmışsa mail atma
        if ($request->user()->hasVerifiedEmail()) {
            return redirect('/profile');
        }

        // 2. 500 Hatası ve Duplicate Koruması
        if (session()->has('verification_mail_sent') && $this->isDuplicateVerification($request)) {
            return back()->with('error', 'Doğrulama mailini zaten gönderdik, lütfen kutunu kontrol et.');
        }

        $request->user()->sendEmailVerificationNotification();

        // 4. Session İşaretlerini Koy
        session(['verification_mail_sent' => true]);
        session(['last_verification_email' => $request->user()->email]);

        return back()->with('status', 'verification-link-sent');
    }

    private function isDuplicateVerification(Request $request)
    {
        // Önce kullanıcı var mı diye bak, yoksa direkt false dön
        if (!$request->user()) {
            return false;
        }
        // Giriş yapmış kullanıcının maili, session'daki 'last_verification_email' ile aynı mı?
        return session('last_verification_email') === $request->user()->email;
    }
}

