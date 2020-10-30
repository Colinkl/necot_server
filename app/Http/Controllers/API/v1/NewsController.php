<?php

namespace App\Http\Controllers\API\v1;

use App\Models\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    /**
     * GET http://site.local/api/v1/news
     *
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request)
    {
        $limit = $request->input('limit') ?? News::LIMIT;
        return News::getLast($limit);
    }

    /**
     * GET http://site.local/api/v1/news/{news}
     *
     * @param News $news
     * @return News
     */
    public function show(News $news)
    {
        return $news;
    }
}
