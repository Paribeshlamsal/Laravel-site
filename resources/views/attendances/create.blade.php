@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-6">
        <h2 class="text-2xl font-semibold text-white bg-gray-800 px-4 py-2 rounded shadow">
            Add Attendance
        </h2>

        @if ($errors->any())
            <div class="bg-red-500 text-white p-4 rounded mt-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('attendances.store') }}" method="POST" class="mt-6 bg-white p-6 rounded shadow">
            @csrf
            <!-- Member Dropdown -->
            <div class="mb-4">
                <label for="member_id" class="block text-gray-700 font-medium">Member</label>
                <select name="member_id" id="member_id" class="border-gray-300 rounded w-full">
                    <option value="" disabled selected>Select a member</option>
                    @foreach ($members as $member)
                        <option value="{{ $member->id }}">{{ $member->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- User Dropdown -->
            <div class="mb-4">
                <label for="user_id" class="block text-gray-700 font-medium">User</label>
                <select name="user_id" id="user_id" class="border-gray-300 rounded w-full">
                    <option value="" disabled selected>Select a user</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Date Input -->
            <div class="mb-4">
                <label for="date" class="block text-gray-700 font-medium">Date</label>
                <input type="date" name="date" id="date" class="border-gray-300 rounded w-full" value="{{ old('date') }}">
            </div>

            <!-- Status Dropdown -->
            <div class="mb-4">
                <label for="status" class="block text-gray-700 font-medium">Status</label>
                <select name="status" id="status" class="border-gray-300 rounded w-full">
                    <option value="Present">Present</option>
                    <option value="Absent">Absent</option>
                </select>
            </div>

            <!-- Trainer Dropdown -->
            <div class="mb-4">
                <label for="trainer_id" class="block text-gray-700 font-medium">Trainer</label>
                <select name="trainer_id" id="trainer_id" class="border-gray-300 rounded w-full">
                    <option value="" disabled selected>Select a trainer</option>
                    @foreach ($trainers as $trainer)
                        <option value="{{ $trainer->id }}">{{ $trainer->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="text-right">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    Submit
                </button>
            </div>
        </form>
    </div>
@endsection
