<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\User;
use App\Models\Trainer;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    // Show all appointments
    public function index()
    {
        $appointments = Appointment::with('user', 'trainer')->get();
        return view('appointments.index', compact('appointments'));
    }

    // Show form to create a new appointment
    public function create()
    {
        $users = User::all();
        $trainers = Trainer::all();
        return view('appointments.create', compact('users', 'trainers'));
    }

    // Store new appointment
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'trainer_id' => 'required|exists:trainers,id',
            'appointment_date' => 'required|date',
            'status' => 'required|in:Scheduled,Completed,Canceled', // Example status
        ]);

        Appointment::create([
            'user_id' => $request->user_id,
            'trainer_id' => $request->trainer_id,
            'appointment_date' => $request->appointment_date,
            'status' => $request->status,
        ]);

        return redirect()->route('appointments.index')->with('success', 'Appointment booked successfully');
    }

    // Show form to edit an existing appointment
    public function edit(Appointment $appointment)
    {
        $users = User::all();
        $trainers = Trainer::all();
        return view('appointments.edit', compact('appointment', 'users', 'trainers'));
    }

    // Update the appointment
    public function update(Request $request, Appointment $appointment)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'trainer_id' => 'required|exists:trainers,id',
            'appointment_date' => 'required|date',
            'status' => 'required|in:Scheduled,Completed,Canceled',
        ]);

        $appointment->update([
            'user_id' => $request->user_id,
            'trainer_id' => $request->trainer_id,
            'appointment_date' => $request->appointment_date,
            'status' => $request->status,
        ]);

        return redirect()->route('appointments.index')->with('success', 'Appointment updated successfully');
    }

    // Delete an appointment
    public function destroy(Appointment $appointment)
    {
        $appointment->delete();
        return redirect()->route('appointments.index')->with('success', 'Appointment canceled successfully');
    }
}
