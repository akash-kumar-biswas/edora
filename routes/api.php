<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PaymentController;



Route::apiResource('users', UserController::class);
Route::apiResource('roles', RoleController::class);
Route::apiResource('students', StudentController::class);
Route::apiResource('instructors', InstructorController::class);
Route::apiResource('courses', CourseController::class);
Route::apiResource('enrollments', EnrollmentController::class);
Route::apiResource('carts', CartController::class);
Route::apiResource('payments', PaymentController::class);