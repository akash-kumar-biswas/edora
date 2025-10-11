<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('student.login'); // your blade
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $remember = $request->has('remember');

        if (Auth::guard('student')->attempt($credentials, $remember)) {
            $request->session()->regenerate();
            return redirect()->intended(route('student.dashboard'));
        }

        return back()->withErrors([
            'email' => 'Invalid credentials.',
        ])->withInput();
    }

    public function dashboard()
    {
        $student = Auth::guard('student')->user();

        // Get all enrolled courses with instructor info
        $allCourses = $student->courses()
            ->with('instructor')
            ->withPivot('created_at')
            ->get();

        // Calculate progress for each course (for now, using random percentage)
        $allCourses->each(function ($course) {
            $course->progress = rand(10, 95); // Replace with actual progress calculation
        });

        // Get enrolled courses count
        $enrolledCount = $allCourses->count();

        // Get completed courses count (courses with 100% progress)
        $completedCount = 0; // Replace with actual completed course logic

        // Get purchase history - fetch payment_items grouped by payment_id
        $purchaseHistory = \App\Models\PaymentItem::with(['payment.student', 'course.instructor'])
            ->whereHas('payment', function ($query) use ($student) {
                $query->where('student_id', $student->id);
            })
            ->get()
            ->groupBy('payment_id')
            ->map(function ($items) {
                return (object) [
                    'payment_id' => $items->first()->payment_id,
                    'payment' => $items->first()->payment,
                    'items' => $items,
                    'total_price' => $items->sum('price'),
                    'total_courses' => $items->count(),
                    'created_at' => $items->first()->payment->created_at,
                    'txnid' => $items->first()->payment->txnid,
                ];
            })
            ->sortByDesc('created_at')
            ->values();

        return view('student.dashboard', compact('student', 'allCourses', 'enrolledCount', 'completedCount', 'purchaseHistory'));
    }

    public function profile()
    {
        return view('student.profile'); // create this blade
    }

    public function logout(Request $request)
    {
        Auth::guard('student')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('student.login');
    }
}
