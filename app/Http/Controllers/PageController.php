<?php

namespace App\Http\Controllers;

use App\Models\Diary;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function diary(Diary $diary)
    {
        return view('single-record', [
            'diary' => $diary
        ]);
    }
}
