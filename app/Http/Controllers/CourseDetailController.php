<?php

namespace App\Http\Controllers;

use App\Models\Course;

class CourseDetailController extends Controller
{
    public function __invoke(Course $course)
    {
        return view('detail', compact('course'));
    }
}
