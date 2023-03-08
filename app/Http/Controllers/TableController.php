<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RequestForm;
use Carbon\Carbon;

class TableController extends Controller
{
    public function show()
    {
        $this->authorize('show-table');
        $data = RequestForm::with('user')->paginate(10);
        return view('table', ['requests' => $data]);
    }

    public function data(Request $request)
    {
        $data = RequestForm::with('user')->get();
        return datatables()->of($data)
            ->editColumn('file', function ($item) {
                return '<a href="' . $item->file . '" download>Файл</a>';
            })
            ->editColumn('created_at_user', function ($item) {
                return 'avav';
            })
            ->rawColumns(['file'])
            ->toJson();
    }
}
