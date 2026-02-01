<?php

use App\Http\Controllers\CourseDetailController;
use App\Http\Controllers\CourseHomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', CourseHomeController::class)->name('pages.home');
Route::get('/courses/{course:slug}', CourseDetailController::class)->name('pages.course-details');
