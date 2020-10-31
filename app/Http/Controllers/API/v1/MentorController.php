<?php

namespace App\Http\Controllers\API\v1;

use App\Models\Mentor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MentorController extends Controller
{
    /**
     * GET http://site.local/api/v1/mentors
     *
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request)
    {
        $limit = $request->input('limit') ?? Mentor::LIMIT;
        return Mentor::getLast($limit);
    }

    /**
     * POST http://site.local/api/v1/mentors
     *
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        return Mentor::create($request->input());
    }

    /**
     * GET http://site.local/api/v1/mentors/{mentor}
     *
     * @param Mentor $mentor
     * @return Mentor
     */
    public function show(Mentor $mentor)
    {
        $mentor->directions;
        return $mentor;
    }

    /**
     * DELETE http://site.local/api/v1/mentors/{mentor}
     *
     * @param Mentor $mentor
     * @return Mentor
     * @throws \Exception
     */
    public function delete(Mentor $mentor)
    {
        $mentor->delete();
        return $mentor;
    }
}
