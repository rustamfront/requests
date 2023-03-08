<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $user = User::find(Auth::id());
            if ($user->roles == 1) {
                return redirect()->to('form');
            } else {
                return redirect()->to('table');
            }
        } else {
            return redirect()->to('login');
        }
    }
}
