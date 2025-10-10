<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchCourseController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\WatchCourseController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AdminController;

// Public routes
Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

// Auth routes (user login/registration)
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Courses
Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');

// ------------------------
// Admin routes (using AdminController)
// ------------------------

// Show admin login page
Route::get('/admin-login', [AdminController::class, 'login'])->name('admin.login');

// Handle admin login form submission
Route::post('/admin-login', [AdminController::class, 'authenticate'])->name('admin.authenticate');

// Admin dashboard (protected by AdminMiddleware)
Route::get('/admin', [AdminController::class, 'dashboard'])
    ->middleware(\App\Http\Middleware\AdminMiddleware::class)
    ->name('admin.dashboard');

// Admin logout
Route::get('/admin-logout', [AdminController::class, 'logout'])->name('admin.logout');
