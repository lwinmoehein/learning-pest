<?php

namespace App\Http\Controllers;

use App\Models\Course;

class CourseHomeController extends Controller
{
    public function __invoke()
    {
        $courses = Course::query()->orderBy('released_at','desc')->whereNotNull('released_at')->get();

        return view('home', compact('courses'));
    }
}
