<?php

namespace App\Http\Controllers;

use App\Models\Instructor;
use App\Models\Student;
use App\Models\Course;

class AdminController extends Controller
{
    private function checkSession()
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login')->send();
        }
    }

    public function dashboard()
    {
        $this->checkSession();

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

    public function instructors()
    {
        $this->checkSession();
        return view('admin.instructors', ['admin_name' => session('admin_name')]);
    }

    public function students()
    {
        $this->checkSession();
        return view('admin.students', ['admin_name' => session('admin_name')]);
    }

    public function courses()
    {
        $this->checkSession();
        return view('admin.courses', ['admin_name' => session('admin_name')]);
    }

    public function enrollments()
    {
        $this->checkSession();
        return view('admin.enrollments', ['admin_name' => session('admin_name')]);
    }
}
