@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-6">
        <h2 class="text-2xl font-semibold text-gray-800">Edit Attendance</h2>

        @if ($errors->any())
            <div class="bg-red-500 text-white p-4 rounded mt-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('attendances.update', $attendance) }}" method="POST" class="mt-6 bg-white p-6 rounded shadow">
            @csrf
            @method('PUT') 

            <div class="mb-4">
                <label for="user_id" class="block text-gray-700 font-medium">User</label>
                <select name="user_id" id="user_id" class="border-gray-300 rounded w-full">
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" {{ $attendance->user_id == $user->id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="attendance_date" class="block text-gray-700 font-medium">Date</label>
                <input type="date" name="attendance_date" id="attendance_date" value="{{ $attendance->attendance_date }}" class="border-gray-300 rounded w-full">
            </div>

            <div class="mb-4">
                <label for="status" class="block text-gray-700 font-medium">Status</label>
                <select name="status" id="status" class="border-gray-300 rounded w-full">
                    <option value="Present" {{ $attendance->status == 'Present' ? 'selected' : '' }}>Present</option>
                    <option value="Absent" {{ $attendance->status == 'Absent' ? 'selected' : '' }}>Absent</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="trainer_id" class="block text-gray-700 font-medium">Trainer</label>
                <select name="trainer_id" id="trainer_id" class="border-gray-300 rounded w-full">
                    @foreach ($trainers as $trainer)
                        <option value="{{ $trainer->id }}" {{ $attendance->trainer_id == $trainer->id ? 'selected' : '' }}>
                            {{ $trainer->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="text-right">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    Update
                </button>
            </div>
        </form>
    </div>
@endsection
