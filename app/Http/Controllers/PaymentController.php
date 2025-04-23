<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        // Get all payments
        $payments = Payment::with('user')->get();
        return view('payments.index', compact('payments'));
    }

    public function create()
    {
        $users = User::all();  // Fetch all users (without filtering)
        return view('payments.create', compact('users'));
    }



    public function store(Request $request)
    {
        // Validate the payment data
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'amount' => 'required|numeric|min:1',
            'payment_date' => 'required|date',
            'payment_status' => 'required|in:Paid,Pending',
        ]);

        // Create and store the payment
        Payment::create([
            'user_id' => $request->user_id,
            'amount' => $request->amount,
            'payment_date' => $request->payment_date,
            'payment_status' => $request->payment_status,
        ]);

        return redirect()->route('payments.index')->with('success', 'Payment recorded successfully');
    }

    public function edit(Payment $payment)
    {
        // Get all users for editing payment
        $users = User::all();
        return view('payments.edit', compact('payment', 'users'));
    }

    public function update(Request $request, Payment $payment)
    {
        // Validate the updated payment data
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'amount' => 'required|numeric|min:1',
            'payment_date' => 'required|date',
            'payment_status' => 'required|in:Paid,Pending',
        ]);

        // Update payment details
        $payment->update([
            'user_id' => $request->user_id,
            'amount' => $request->amount,
            'payment_date' => $request->payment_date,
            'payment_status' => $request->payment_status,
        ]);

        return redirect()->route('payments.index')->with('success', 'Payment updated successfully');
    }

    public function destroy(Payment $payment)
    {
        $payment->delete();
        return redirect()->route('payments.index')->with('success', 'Payment record deleted successfully');
    }
}
