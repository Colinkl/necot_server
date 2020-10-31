<?php

namespace App\Http\Controllers\API\v1;

use App\Models\Course;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * GET http://site.local/api/v1/courses
     *
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request)
    {
        $limit = $request->input('limit') ?? Course::LIMIT;
        return Course::getLast($limit);
    }

    /**
     * POST http://site.local/api/v1/courses
     *
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        return Course::create($request->input());
    }

    /**
     * GET http://site.local/api/v1/course/{course}
     *
     * @param Course $course
     * @return Course
     */
    public function show(Course $course)
    {
        return $course;
    }
}
