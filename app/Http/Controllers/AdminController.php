<?php

namespace App\Http\Controllers;

use App\Models\Instructor;
use App\Models\Student;
use App\Models\Course;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $instructors = Instructor::count();
        $students = Student::count();
        $courses = Course::count();

        return view('admin.dashboard', [
            'admin_name' => session('admin_name'),
            'instructors' => $instructors,
            'students' => $students,
            'courses' => $courses,
        ]);
    }

    public function instructors(Request $request)
    {
        // Get sorting parameters
        $sort_by = $request->get('sort_by', 'id');
        $sort_order = $request->get('sort_order', 'asc');

        // Validate column to avoid injection
        $allowed = ['id', 'name', 'email', 'status', 'created_at'];
        if (!in_array($sort_by, $allowed)) {
            $sort_by = 'id';
        }

        $instructors = Instructor::orderBy($sort_by, $sort_order)->get();

        return view('admin.instructors', [
            'admin_name' => session('admin_name'),
            'instructors' => $instructors,
            'sort_by' => $sort_by,
            'sort_order' => $sort_order
        ]);
    }

    public function students()
    {
        return view('admin.students', ['admin_name' => session('admin_name')]);
    }

    public function courses()
    {
        return view('admin.courses', ['admin_name' => session('admin_name')]);
    }

    public function enrollments()
    {
        return view('admin.enrollments', ['admin_name' => session('admin_name')]);
    }
}
