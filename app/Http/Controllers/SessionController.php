<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    //login form
    public function create(){
        return view('pages.login');
    }

    // log in
    public function store(){

        $attributes = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if(!Auth::attempt($attributes)){
            throw ValidationException::withMessages([
                'email' => 'Giriş Bilgileriniz Uyuşmuyor',
            ]);
        }

        request()->session()->regenerate();

        return redirect()->route('profile');
    }

    // log out
    public function destroy(Request $request){

        Auth::logout();

        //500 hatası için düzelmezse sil
        $request->session()->flush();
        $request->session()->regenerate();

        return redirect(route('homepage'));
    }
}
