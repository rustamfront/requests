<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function show()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $date = $request->validate([
            'name'     => 'required|max:255',
            'email'    => 'required|email|max:255',
            'password' => 'required|min:6|confirmed'
        ]);

        $user = User::create([
            'name'     => $date['name'],
            'email'    => $date['email'],
            'password' => bcrypt($date['password'])
        ]);

        if ($user) {
            Auth::login($user);
            return redirect()->to(route('form'));
        }
    }
}
