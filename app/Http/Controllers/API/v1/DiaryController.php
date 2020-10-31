<?php

namespace App\Http\Controllers\API\v1;

use App\Models\Diary;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DiaryController extends Controller
{
    /**
     * GET http://site.local/api/v1/diary
     *
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request)
    {
        $limit = $request->input('limit') ?? Diary::LIMIT;
        return Diary::getLast($limit);
    }

    /**
     * POST http://site.local/api/v1/diaries
     *
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        return Diary::create($request->input());
    }

    /**
     * GET http://site.local/api/v1/diary/{diary}
     *
     * @param Diary $diary
     * @return Diary
     */
    public function show(Diary $diary)
    {
        return $diary;
    }
}
