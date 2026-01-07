<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function contactmail(Request $request){

        if(session()->has('message_sent') && $this->isDuplicateSubmission($request)){
            return response()->json(['error'=>'message has already sent'],400);
        }

        $request->validate([
            'name'    => 'required|min:3|max:50', // Zorunlu, en az 3, en fazla 50 karakter
            'email'   => 'required|email',        // Zorunlu ve geçerli bir e-posta olmalı
            'message' => 'required|min:10',       // Zorunlu ve en az 10 karakter
        ]);

        session(['message_sent'=>true]);
        session(['contactData' => $request->only(['name', 'email', 'message'])]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message
        ];

        Mail::to('kandemirhuseyinkerem@gmail.com')->send(new ContactMail($data));

        return back()->with('success', 'Mesajın başarıyla iletildi!');
    }
    private function isDuplicateSubmission(Request $request)
    {
        // Session'daki veriler ile şu anki formu karşılaştırıyor
        return session('contactData.name') == $request->input('name') &&
            session('contactData.email') == $request->input('email') &&
            session('contactData.message') == $request->input('message');
    }

}
