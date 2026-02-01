<?php

namespace App\Http\Controllers;

use App\Models\Course;

class CourseHomeController extends Controller
{
    public function __invoke()
    {
        $courses = Course::released()
            ->orderByDesc('released_at')
            ->get();

        return view('pages.home', compact('courses'));
    }
}
