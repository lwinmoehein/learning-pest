<?php

use App\Http\Controllers\CourseHomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', CourseHomeController::class)->name('home');
