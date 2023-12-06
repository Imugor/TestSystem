<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function login_page() {
        return view('login');
    }

    public function login(Request $req) {
        $credentials = $req->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $req->session()->regenerate();

            return redirect()->route('account_profile');
        }

        return back()->withErrors([
            'auth' => 'Авторизация не удалась, проверьте правильность ввода пароля и логина',
        ]);
    }

    public function logout(Request $req) {
        auth()->logout();
        return redirect()->route('login_page');
    }
}
