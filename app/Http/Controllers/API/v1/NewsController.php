<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Network\News;

class NewsController extends Controller
{
    public function index()
    {
        return 'News';
    }
}
