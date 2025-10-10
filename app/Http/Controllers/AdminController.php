<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    // Show admin login page
    public function login()
    {
        return view('admin-login');
    }

    // Handle admin login
    public function authenticate(Request $request)
    {
        // Validate form input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Hardcoded admin credentials for testing
        $adminEmail = 'admin@example.com';
        $adminPassword = 'password123'; // plain text for testing

        $email = $request->input('email');
        $password = $request->input('password');

        // Check if submitted credentials match hardcoded admin
        if ($email === $adminEmail && $password === $adminPassword) {
            // Ensure admin user exists in database
            $user = User::firstOrCreate(
                ['email' => $adminEmail],
                [
                    'name' => 'Admin',
                    'password' => Hash::make($adminPassword),
                    'is_admin' => 1,
                ]
            );

            // Log in the admin
            Auth::login($user);

            return redirect()->route('admin.dashboard');
        }

        // Invalid credentials
        return back()->with('error', 'Access denied!');
    }

    // Admin dashboard
    public function dashboard()
    {
        $userCount = User::count();
        $postCount = Post::count();
        $commentCount = Comment::count();

        return view('admin', compact('userCount', 'postCount', 'commentCount'));
    }

    // Admin logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }
}
