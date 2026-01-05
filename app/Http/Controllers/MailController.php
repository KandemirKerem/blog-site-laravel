<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function contactmail(Request $request){

        $request->validate([
            'name'    => 'required|min:3|max:50', // Zorunlu, en az 3, en fazla 50 karakter
            'email'   => 'required|email',        // Zorunlu ve geçerli bir e-posta olmalı
            'message' => 'required|min:10',       // Zorunlu ve en az 10 karakter
        ]);

        // Verileri yakala
        $data = [
            'name'    => $request->name,
            'email'   => $request->email,
            'message' => $request->message,
        ];

        Mail::to('kandemirhuseyinkerem@gmail.com')->send(new ContactMail($data));

        return back()->with('success', 'Mesajın başarıyla iletildi!');
    }
}
