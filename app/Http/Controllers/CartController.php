<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    // Show all courses in student's cart
    public function index()
    {
        $studentId = Auth::id(); // assuming student is logged in
        $cartItems = Cart::with('course')
            ->where('student_id', $studentId)
            ->get();

        return view('cart.index', compact('cartItems'));
    }

    // Add a course to cart
    public function add(Request $request, $courseId)
    {
        $studentId = Auth::id();

        // Prevent duplicate
        $exists = Cart::where('student_id', $studentId)
            ->where('course_id', $courseId)
            ->exists();

        if (!$exists) {
            Cart::create([
                'student_id' => $studentId,
                'course_id' => $courseId,
            ]);
        }

        return redirect()->back()->with('success', 'Course added to cart!');
    }

    // Remove a course from cart
    public function remove($id)
    {
        $studentId = Auth::id();

        $cartItem = Cart::where('id', $id)
            ->where('student_id', $studentId)
            ->firstOrFail();

        $cartItem->delete();

        return redirect()->back()->with('success', 'Course removed from cart!');
    }

    // Clear entire cart
    public function clear()
    {
        $studentId = Auth::id();
        Cart::where('student_id', $studentId)->delete();

        return redirect()->back()->with('success', 'Cart cleared!');
    }
}
