<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchCourseController;
use App\Http\Controllers\CourseController as course;
use App\Http\Controllers\WatchCourseController as watchCourse;
use App\Http\Controllers\InstructorController as instructor;
use App\Http\Controllers\CheckoutController as checkout;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

use App\Http\Controllers\CourseController;


Route::get('/', function () {
    return view('home');
});
Route::get('/about', function () {
    return view('about');
});

// Show login form
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
// Handle login
Route::post('/login', [LoginController::class, 'login']);

// Show registration form
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
// Handle registration
Route::post('/register', [RegisterController::class, 'register']);

// Logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
