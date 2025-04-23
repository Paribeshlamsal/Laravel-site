@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-6">
        <div class="flex items-center justify-between">
            <h2 class="text-2xl font-semibold text-white bg-gray-800 px-4 py-2 rounded shadow">
                Book an Appointment
            </h2>
        </div>

        <form action="{{ route('appointments.store') }}" method="POST" class="mt-6">
            @csrf
            <div class="bg-white p-6 rounded shadow-md">
                <!-- User Selection -->
                <div class="mb-4">
                    <label for="user_id" class="block text-sm font-medium text-gray-700">User</label>
                    <select name="user_id" id="user_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                        <option value="">Select User</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Trainer Selection -->
                <div class="mb-4">
                    <label for="trainer_id" class="block text-sm font-medium text-gray-700">Trainer</label>
                    <select name="trainer_id" id="trainer_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                        <option value="">Select Trainer</option>
                        @foreach($trainers as $trainer)
                            <option value="{{ $trainer->id }}">{{ $trainer->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Appointment Date -->
                <div class="mb-4">
                    <label for="appointment_date" class="block text-sm font-medium text-gray-700">Appointment Date</label>
                    <input type="datetime-local" name="appointment_date" id="appointment_date" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                </div>

                <!-- Submit Button -->
                <div class="mt-6">
                    <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 shadow">
                        Book Appointment
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
