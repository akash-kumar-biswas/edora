<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    /**
     * Display a simple list of all active courses.
     */
    public function index()
    {
        // Fetch only active courses (status = 2)
        $courses = Course::where('status', 2)->latest()->get();
        return view('courses', compact('courses'));
    }
}
