<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function show()
    {
        if (Auth::check()) {
            return redirect()->intended(route('form'));
        }
        return view('login');
    }

    public function login(Request $request)
    {
        $fields = $request->only(['email', 'password']);

        if (Auth::attempt($fields)) {
            return redirect()->intended(route('form'));
        }

        return redirect(route('login'))->withError([
            'email' => 'Не удалось авторизоваться'
        ]);
    }
}
