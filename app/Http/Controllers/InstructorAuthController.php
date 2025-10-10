<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Instructor;
use Illuminate\Support\Facades\Hash;

class InstructorAuthController extends Controller
{
    // Show login form
    public function showLoginForm()
    {
        return view('instructor.login');
    }

    // Handle login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $instructor = Instructor::where('email', $request->email)->first();

        if ($instructor && Hash::check($request->password, $instructor->password)) {
            session([
                'instructor_logged_in' => true,
                'instructor_name' => $instructor->name,
                'instructor_id' => $instructor->id,
            ]);
            return redirect()->route('instructor.dashboard');
        }

        return back()->with('error', 'Invalid email or password.');
    }

    // Logout
    public function logout()
    {
        session()->forget(['instructor_logged_in', 'instructor_name', 'instructor_id']);
        return redirect()->route('instructor.login');
    }

    // Show signup form
    public function showRegisterForm()
    {
        return view('instructor.register');
    }

    // Handle signup
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:instructors,email',
            'password' => 'required|min:6|confirmed',
        ]);

        $instructor = Instructor::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Auto-login after registration
        session([
            'instructor_logged_in' => true,
            'instructor_name' => $instructor->name,
            'instructor_id' => $instructor->id,
        ]);

        return redirect()->route('instructor.dashboard');
    }
}
