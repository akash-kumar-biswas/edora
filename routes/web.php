<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Student\LoginController;
use App\Http\Controllers\Student\RegisterController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\StudentController;

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

Route::prefix('student')->name('student.')->group(function () {

    // Guest routes
    Route::middleware('guest:student')->group(function () {
        Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
        Route::post('register', [RegisterController::class, 'register']);
        Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
        Route::post('login', [LoginController::class, 'login']);
    });

    // Watch a course
// Route::middleware(['auth'])->group(function () {
//     Route::get('/student/course/{course}', [StudentController::class, 'watchCourse'])
//         ->name('student.course.watch');
// });


    // Authenticated student routes
    Route::middleware('auth:student')->group(function () {
        Route::get('dashboard', [LoginController::class, 'dashboard'])->name('dashboard');
        Route::post('logout', [LoginController::class, 'logout'])->name('logout');
        Route::get('profile', [LoginController::class, 'profile'])->name('profile');
        Route::get('profile/edit', [LoginController::class, 'editProfile'])->name('profile.edit');
        Route::put('profile/update', [LoginController::class, 'updateProfile'])->name('profile.update');
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

// ----------------------------------------------------------------------------------

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\InstructorController;

// Admin Login Routes
Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
Route::get('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

// Test route to verify middleware (remove this after testing)
Route::get('/admin/test', function () {
    return 'Middleware NOT working - this should redirect!';
})->middleware('admin.auth');

// Admin Pages (protected by admin.auth middleware)
Route::middleware('admin.auth')->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/export-report', [AdminController::class, 'exportReport'])->name('admin.export');
});

// ---------------------------------------------------------------------------------------------------------------

use App\Http\Controllers\InstructorAuthController;

// Instructor Login & Signup
Route::get('/instructor/login', [InstructorAuthController::class, 'showLoginForm'])->name('instructor.login');
Route::post('/instructor/login', [InstructorAuthController::class, 'login'])->name('instructor.login.submit');
Route::get('/instructor/logout', [InstructorAuthController::class, 'logout'])->name('instructor.logout');

Route::get('/instructor/register', [InstructorAuthController::class, 'showRegisterForm'])->name('instructor.register');
Route::post('/instructor/register', [InstructorAuthController::class, 'register'])->name('instructor.register.submit');

// Instructor Dashboard
Route::get('/instructor/dashboard', [InstructorController::class, 'dashboard'])->name('instructor.dashboard');
Route::get('/instructor/instructors', [InstructorController::class, 'instructorsList'])
    ->name('instructor.instructors');
    Route::get('/instructor/enrollments', [InstructorController::class, 'enrollments'])
     ->name('instructor.enrollments');

// ---------------------------------------------------------------------------------------------------------------

Route::prefix('admin')->name('admin.')->middleware('admin.auth')->group(function () {
    Route::resource('instructors', InstructorController::class);
    Route::resource('students', App\Http\Controllers\Admin\StudentController::class);
    Route::resource('courses', App\Http\Controllers\Admin\CourseController::class);
    Route::resource('enrollments', App\Http\Controllers\Admin\EnrollmentController::class);
});

// ----------------------------------------------------------------------------------