<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function show()
    {
        $this->authorize('show-form');
        return view('form');
    }
}
