<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function ContactMail(Request $request){

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
