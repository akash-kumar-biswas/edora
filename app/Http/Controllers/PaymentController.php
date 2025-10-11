<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Payment;
use App\Models\PaymentItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    // Show payment history for logged-in student
    public function index()
    {
        $studentId = Auth::id();

        $payments = Payment::with('items.course')
            ->where('student_id', $studentId)
            ->latest()
            ->get();

        return view('payments.index', compact('payments'));
    }

    // Checkout all courses in cart
    public function checkout(Request $request)
    {
        $studentId = Auth::id();

        $cartItems = Cart::with('course')->where('student_id', $studentId)->get();

        if ($cartItems->isEmpty()) {
            return redirect()->back()->with('error', 'Your cart is empty.');
        }

        // Start transaction
        DB::transaction(function () use ($cartItems, $studentId) {

            $totalAmount = $cartItems->sum(fn($item) => $item->course->price);

            // Create Payment record
            $payment = Payment::create([
                'student_id' => $studentId,
                'method' => 'manual',
                'status' => 1, // completed
            ]);

            // Create PaymentItems for each course
            foreach ($cartItems as $item) {
                PaymentItem::create([
                    'payment_id' => $payment->id,
                    'course_id' => $item->course->id,
                    'price' => $item->course->price,
                ]);

                // Optional: enroll student automatically
                $item->course->students()->attach($studentId);
            }

            // Clear cart
            Cart::where('student_id', $studentId)->delete();
        });

        return redirect()->route('payments.index')->with('success', 'Checkout completed successfully!');
    }
}
