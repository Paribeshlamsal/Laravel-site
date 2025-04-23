@extends('layouts.app')

@section('header')
    <div class="flex items-center space-x-4">
        <img src="{{ asset('images/gym-logo.png') }}" alt="Gym Logo" class="w-12 h-12">
        <h2 class="font-semibold text-xl text-white bg-black">{{ __('Dashboard') }}</h2>
    </div>
@endsection

@section('content')
    <div class="flex min-h-screen bg-gray-900">
       v>
        </div>

        <div class="flex-1 bg-white p-6">
            <h3 class="text-2xl font-semibold text-gray-800 mb-6">Welcome, {{ Auth::user()->name }}!</h3>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Total Members -->
                <div class="bg-white p-6 rounded-lg shadow-md border border-gray-300">
                    <h3 class="text-xl font-semibold text-gray-700">Total Members</h3>
                    <p class="mt-2 text-2xl font-bold text-gray-800">{{ $totalMembers }}</p>
                </div>

                <!-- Total Appointments -->
                <div class="bg-white p-6 rounded-lg shadow-md border border-gray-300">
                    <h3 class="text-xl font-semibold text-gray-700">Appointments</h3>
                    <p class="mt-2 text-2xl font-bold text-gray-800">{{ $totalAppointments }}</p>
                </div>

                <!-- Total Payments -->
                <div class="bg-white p-6 rounded-lg shadow-md border border-gray-300">
                    <h3 class="text-xl font-semibold text-gray-700">Payments Received</h3>
                    <p class="mt-2 text-2xl font-bold text-gray-800">${{ number_format($totalPayments, 2) }}</p>
                </div>
            </div>

            <!-- Attendance -->
            <div class="bg-white p-6 rounded-lg shadow-md border border-gray-300 mt-6">
                <h3 class="text-xl font-semibold text-gray-700">Attendance</h3>
                <p class="mt-2 text-2xl font-bold text-gray-800">{{ $totalAttendances }}</p> <!-- Display total attendance -->
            </div>
        </div>
    </div>
@endsection
