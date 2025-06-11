<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ], [
            'email.required' => 'Email Wajib Diisi',
            'email.email' => 'Format Email Tidak Valid',
            'password.required' => 'Password Wajib Diisi'
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user) {
                $request->session()->put('id', $user->id);
                return redirect()->intended('/dashboard');
            } else {
                Auth::logout();
                return redirect('/')->withErrors('Anda Berhasil Logout')->withInput();
            }
        } else {
            return redirect('/')
                ->withErrors(['loginError' => 'Username atau password yang anda masukkan salah'])
                ->withInput()
                ->with('openLoginModal', true);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
