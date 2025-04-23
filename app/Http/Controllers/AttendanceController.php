<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\User;
use App\Models\Trainer;
use Illuminate\Http\Request;
use App\Models\Member;

class AttendanceController extends Controller
{
    public function index()
    {
        // Fetch attendances with the related member data
        $attendances = Attendance::with('member')->get();
        $members = Member::all(); // Fetch all members for the dropdown

        return view('attendances.index', compact('attendances', 'members'));
    }

    public function create()
    {
        // Fetch all users and trainers for the dropdowns
        $users = User::all();
        $trainers = Trainer::all();
        $members = Member::all(); 

        return view('attendances.create', compact('users', 'trainers', 'members'));
    }

    public function store(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'member_id' => 'required|exists:members,id',
            'user_id' => 'required|exists:users,id',
            'date' => 'required|date',
            'check_in' => 'required|date_format:H:i',
            'check_out' => 'nullable|date_format:H:i|after:check_in', // Validate check-out if provided
        ]);

        // Create the attendance record
        Attendance::create([
            'member_id' => $validated['member_id'],
            'user_id' => $validated['user_id'],
            'date' => $validated['date'],
            'check_in' => $validated['check_in'],
            'check_out' => $validated['check_out'], // Use null if no check-out time
        ]);

        // Redirect with a success message
        return redirect()->route('attendances.index')->with('success', 'Attendance record added successfully!');
    }

    public function edit(Attendance $attendance)
    {
        // Fetch users and trainers for the dropdowns
        $users = User::all();
        $trainers = Trainer::all();
        return view('attendances.edit', compact('attendance', 'users', 'trainers'));
    }

    public function update(Request $request, Attendance $attendance)
    {
        // Validate the request
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'date' => 'required|date',
            'check_in' => 'required|date_format:H:i',
            'check_out' => 'nullable|date_format:H:i|after:check_in', // Validate check-out if provided
        ]);

        // Update the attendance record
        $attendance->update([
            'user_id' => $request->user_id,
            'date' => $request->date,
            'check_in' => $request->check_in,
            'check_out' => $request->check_out, // Use null if no check-out time
        ]);

        // Redirect with a success message
        return redirect()->route('attendances.index')->with('success', 'Attendance record updated successfully!');
    }

    public function destroy(Attendance $attendance)
    {
        // Delete the attendance record
        $attendance->delete();
        return redirect()->route('attendances.index')->with('success', 'Attendance record deleted successfully');
    }
}
