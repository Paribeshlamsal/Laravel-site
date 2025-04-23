<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Payment;
use App\Models\User;
use App\Models\Attendance;
use App\Models\Member;

class DashboardController extends Controller
{
    public function index()
    {
        // Fetch the necessary data
        $totalMembers = Member::count();
        $totalAppointments = Appointment::count();
        $totalPayments = Payment::sum('amount');  // Assuming 'amount' is the payment column
        $totalAttendances = Attendance::count();  // This will give the total number of attendances

        // Return the dashboard view with all the data
        return view('dashboard', compact('totalMembers', 'totalAppointments', 'totalPayments', 'totalAttendances'));
    }
}
