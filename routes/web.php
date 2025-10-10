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


// Show registration form
Route::get('/register', [AdminRegisterController::class, 'showRegistrationForm'])->name('register');

// Handle registration form submission
Route::post('/register', [AdminRegisterController::class, 'register'])->name('register.store');

// Login form
Route::get('/login', [AdminLoginController::class, 'showLoginForm'])->name('login');

// Handle login
Route::post('/login', [AdminLoginController::class, 'login'])->name('login.submit');

// Logout
Route::post('/logout', [AdminLoginController::class, 'logout'])->name('logout');

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


// ----------------------------------------------------------------------------------

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminController;

// Admin Login Routes
Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
Route::get('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

// Admin Pages (no middleware, manual session check)
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/admin/instructors', [AdminController::class, 'instructors'])->name('admin.instructors');
Route::get('/admin/students', [AdminController::class, 'students'])->name('admin.students');
Route::get('/admin/courses', [AdminController::class, 'courses'])->name('admin.courses');
Route::get('/admin/enrollments', [AdminController::class, 'enrollments'])->name('admin.enrollments');

// ----------------------------------------------------------------------------------