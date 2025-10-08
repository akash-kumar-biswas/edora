<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchCourseController;
use App\Http\Controllers\CourseController as course;
use App\Http\Controllers\WatchCourseController as watchCourse;
use App\Http\Controllers\InstructorController as instructor;
use App\Http\Controllers\CheckoutController as checkout;

Route::get('/', function () {
    return view('home');
});

