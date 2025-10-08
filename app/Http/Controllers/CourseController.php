<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    /**
     * Display a simple list of all active courses.
     */
    public function index(Request $request)
    {
        $query = Course::query()->where('status', 2); // only active courses

        // ✅ Apply filters if provided
        if ($request->filled('difficulty')) {
            $query->where('difficulty', $request->difficulty);
        }

        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        if ($request->filled('duration')) {
            // Define custom duration ranges
            switch ($request->duration) {
                case 'short':
                    $query->where('duration', '<=', 5);
                    break;
                case 'medium':
                    $query->whereBetween('duration', [6, 20]);
                    break;
                case 'long':
                    $query->where('duration', '>', 20);
                    break;
            }
        }

        $courses = $query->latest()->get();

        return view('courses', compact('courses'));
    }
}
