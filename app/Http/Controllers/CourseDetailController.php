<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CourseDetailController extends Controller
{
    public function __invoke(Course $course)
    {
        if(!$course->released_at){
            throw new NotFoundHttpException();
        }

        $course->loadCount('videos');

        return view('pages.detail', compact('course'));
    }
}
