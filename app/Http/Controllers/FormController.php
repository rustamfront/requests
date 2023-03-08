<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RequestForm;
use Illuminate\Support\Facades\Auth;

class FormController extends Controller
{
    public function show()
    {
        return view('form');
    }

    public function send(Request $request)
    {
        $except = ['bat', 'jar', 'exe'];
        if (in_array($request->input('ext'), $except)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Нельзя загружать файл с расширениями .bat, .jar, .exe'
            ]);
        }

        $date = $request->validate([
            'subject' => 'required|max:255',
            'message' => 'required|max:255',
            'file'    => 'required|max:3072'
        ]);

        $file = $request->file('file')->store('upload');
        $user = Auth::id();
        $data = [
            'user_id' => $user,
            'name' => $request->input('subject'),
            'desciption' => $request->input('message'),
            'file' => $file
        ];

        RequestForm::create($data);

        return response()->json([
            'status' => 'ok',
            'message' => 'Заявка оставлена!'
        ]);
    }
}
