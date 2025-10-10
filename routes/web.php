<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Student\LoginController;
use App\Http\Controllers\Student\RegisterController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PaymentController;


Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});


// Courses
Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
Route::get('/courses/{id}', [CourseController::class, 'show'])->name('courses.show');

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

Route::prefix('student')->name('student.')->group(function () {

    // Guest routes
    Route::middleware('guest:student')->group(function () {
        Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
        Route::post('register', [RegisterController::class, 'register']);
        Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
        Route::post('login', [LoginController::class, 'login']);
    });

    // Authenticated student routes
    Route::middleware('auth:student')->group(function () {
        Route::get('dashboard', [LoginController::class, 'dashboard'])->name('dashboard');
        Route::post('logout', [LoginController::class, 'logout'])->name('logout');
        Route::get('profile', [LoginController::class, 'profile'])->name('profile');
    });
});

// Cart routes - protected by custom student auth
Route::get('/cart', [CartController::class, 'index'])->name('cart.index')->middleware('student.auth');
Route::post('/cart/add/{courseId}', [CartController::class, 'add'])->name('cart.add')->middleware('student.auth');
Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove')->middleware('student.auth');
Route::delete('/cart/clear', [CartController::class, 'clear'])->name('cart.clear')->middleware('student.auth');

// Payment routes - protected by custom student auth
Route::get('/payments', [PaymentController::class, 'index'])->name('payments.index')->middleware('student.auth');
Route::post('/checkout', [PaymentController::class, 'checkout'])->name('checkout')->middleware('student.auth');
