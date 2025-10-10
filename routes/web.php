<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Student\LoginController;
use App\Http\Controllers\Student\RegisterController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

// Show login form
// Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
// // Handle login
// Route::post('/login', [LoginController::class, 'login']);

// // Show registration form
// Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
// // Handle registration
// Route::post('/register', [RegisterController::class, 'register']);

// // Logout
// Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Courses
Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');

// ------------------------
// Admin routes (using AdminController)
// ------------------------


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

//
Route::middleware('auth')->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{courseId}', [CartController::class, 'add'])->name('cart.add');
    Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
    Route::delete('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');
});


Route::middleware('auth')->group(function () {
    Route::get('/payments', [PaymentController::class, 'index'])->name('payments.index');
    Route::post('/checkout', [PaymentController::class, 'checkout'])->name('checkout');
});