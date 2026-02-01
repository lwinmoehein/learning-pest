<?php

namespace App\Http\Controllers;

class CourseDashboardController extends Controller
{
    public function __invoke()
    {
        $courses = auth()->user()->courses;

        return view('pages.courses', compact('courses'));
    }
}
