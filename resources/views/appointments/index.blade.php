@extends('layouts.app')

@section('content')
    <div class="flex min-h-screen bg-gray-900">
        <!-- Sidebar -->
        <div class="w-1/4 bg-black text-white p-6">
            <ul>
                <li><a href="{{ route('dashboard') }}" class="block py-3 text-lg hover:text-gray-400">Dashboard</a></li>
                <li><a href="#" class="block py-3 text-lg hover:text-gray-400">Profile</a></li>
                <li><a href="{{ route('appointments.index') }}" class="block py-3 text-lg hover:text-gray-400">Appointments</a></li>
                <li><a href="{{ route('payments.index') }}" class="block py-3 text-lg hover:text-gray-400">Payments</a></li>
                <li><a href="{{ route('attendances.index') }}" class="block py-3 text-lg hover:text-gray-400">Attendance</a></li>
                <li><a href="{{ route('members.index') }}" class="block py-3 text-lg hover:text-gray-400">Members</a></li>
            </ul>
            <div class="mt-6">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-primary-button>{{ __('Logout') }}</x-primary-button>
                </form>
            </div>
        </div>

        <div class="flex-1 bg-white p-6">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-2xl font-semibold text-gray-800">Appointment Records</h3>
                <a href="{{ route('appointments.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    Book Appointment
                </a>
            </div>

            <!-- Success/Error message display -->
            @if(session('success'))
                <div class="bg-green-500 text-white p-4 rounded mt-4 shadow">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="bg-red-500 text-white p-4 rounded mt-4 shadow">
                    {{ session('error') }}
                </div>
            @endif



            <div class="mt-6">
                <table class="min-w-full bg-white border border-gray-200 shadow">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 border-b bg-gray-100 text-gray-800">User</th>
                            <th class="py-2 px-4 border-b bg-gray-100 text-gray-800">Trainer</th>
                            <th class="py-2 px-4 border-b bg-gray-100 text-gray-800">Appointment Date</th>
                            <th class="py-2 px-4 border-b bg-gray-100 text-gray-800">Status</th>
                            <th class="py-2 px-4 border-b bg-gray-100 text-gray-800">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($appointments as $appointment)
                            <tr>
                                <td class="py-2 px-4 border-b">{{ $appointment->user->name }}</td>
                                <td class="py-2 px-4 border-b">{{ $appointment->trainer->name }}</td>
                                <td class="py-2 px-4 border-b">{{ $appointment->appointment_date }}</td>
                                <td class="py-2 px-4 border-b">{{ $appointment->status }}</td>
                                <td class="py-2 px-4 border-b">
                                    <!-- Cancel Appointment -->
                                    <form action="{{ route('appointments.destroy', $appointment) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:underline">Cancel</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
