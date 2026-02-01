<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Video;

class CourseVideosController extends Controller
{
    public function __invoke(Course $course, ?Video $video = null)
    {

        $video = $video ?? $course->videos->first();

        return view('pages.video', compact('video'));
    }
}
