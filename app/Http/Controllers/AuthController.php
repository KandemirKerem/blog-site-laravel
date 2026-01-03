<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function create(){
        return view('pages.register');
    }

    public function store(Request $request){


        //500 hatası için. düzelmezse sil
        $request->session()->flush();
        $request->session()->regenerate();

        $attributes = request()->validate([
            'name' => ['required',],
            'email' => ['required','email','unique:users,email'],
            'password' => ['required','confirmed','min:4'],

        ]);

        $user = User::create($attributes);

        event(new Registered($user));

        Auth::login($user);

        return redirect()->route('verification.notice');

    }
}
