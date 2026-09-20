<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{
    public function profile(){

        return view('pages.profile');
    }

    public function update(Request $request) {
        $user = auth()->user();

        $request->validate([
            'name' => ['required', 'string', 'max:255'],

        ]);

        $user->update([
            'name' => $request->name,
        ]);

        return back()->with('success_1', 'Kullanıcı adı başarıyla güncellendi.');
    }

    public function updatePassword(Request $request) {
        $request->validate([
            'current_password' => ['required', 'current_password'], // Laravel şifreyi otomatik kontrol eder
            'password' => ['required', 'confirmed', Password::min(4)], // Senin isteğine göre min 4
        ]);

        $request->user()->update([
            'password' => Hash::make($request->password),
        ]);

        return back()->with('success', 'Şifreniz başarıyla güncellendi.');
    }
}
