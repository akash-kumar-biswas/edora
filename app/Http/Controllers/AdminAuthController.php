<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminAuthController extends Controller
{
    // Show login page
    public function showLoginForm()
    {
        // If already logged in, redirect to dashboard
        if (session('admin_logged_in')) {
            return redirect()->route('admin.dashboard');
        }

        return view('admin.login');
    }

    // Handle login form
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $admin = User::where('email', $request->email)->first();

        if ($admin && Hash::check($request->password, $admin->password)) {
            // Save session
            session([
                'admin_logged_in' => true,
                'admin_name' => $admin->name,
                'admin_email' => $admin->email,
            ]);
            return redirect()->route('admin.dashboard');
        }

        return back()->with('error', 'Invalid email or password.');
    }

    // Logout
    public function logout()
    {
        session()->forget(['admin_logged_in', 'admin_name', 'admin_email']);
        return redirect()->route('admin.login');
    }
}
