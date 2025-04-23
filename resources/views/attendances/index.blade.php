@extends('layouts.app')

@section('header')
    <div class="flex items-center space-x-4">
        <img src="{{ asset('images/gym-logo.png') }}" alt="Gym Logo" class="w-12 h-12">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Attendance') }}
        </h2>
    </div>
@endsection

@if(session('success'))
<div id="success-message" class="bg-green-500 text-white p-2 rounded mt-4 shadow-sm w-auto mx-auto text-center">
    {{ session('success') }}
</div>
<script>
    setTimeout(function () {
        document.getElementById("success-message").style.display = "none";
    }, 3000);
</script>
@endif

@section('content')
    <div class="flex min-h-screen bg-gray-900">
        <!-- Sidebar -->
        <div class="w-1/4 bg-black text-white p-6">
            <!-- Sidebar links -->
            <ul>
                <li><a href="{{ route('dashboard') }}" class="block py-3 text-lg hover:text-gray-400">Dashboard</a></li>
                <li><a href="#" class="block py-3 text-lg hover:text-gray-400">Profile</a></li>
                <li><a href="{{ route('appointments.index') }}" class="block py-3 text-lg hover:text-gray-400">Appointments</a></li>
                <li><a href="{{ route('payments.index') }}" class="block py-3 text-lg hover:text-gray-400">Payments</a></li>
                <li><a href="{{ route('attendances.index') }}" class="block py-3 text-lg hover:text-gray-400">Attendance</a></li>
                <li><a href="{{ route('members.index') }}" class="block py-3 text-lg hover:text-gray-400">Members</a></li>
            </ul>
            <!-- Logout -->
            <div class="mt-6">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-primary-button>{{ __('Logout') }}</x-primary-button>
                </form>
            </div>
        </div>

        <div class="flex-1 bg-white p-6">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-2xl font-semibold text-gray-800">Attendance Records</h3>
                <button onclick="openAddModal()" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    Add Attendance
                </button>
            </div>

            <table class="w-full border-collapse border border-gray-300 text-gray-800">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="py-2 px-4 border">Member Name</th>
                        <th class="py-2 px-4 border">Date</th>
                        <th class="py-2 px-4 border">Check-In Time</th>
                        <th class="py-2 px-4 border">Check-Out Time</th>
                        <th class="py-2 px-4 border">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($attendances as $attendance)
                        <tr class="text-center">
                            <td class="py-2 px-4 border">{{ $attendance->member->name }}</td>
                            <td class="py-2 px-4 border">{{ $attendance->date }}</td>
                            <td class="py-2 px-4 border">{{ $attendance->check_in }}</td>
                            <td class="py-2 px-4 border">{{ $attendance->check_out }}</td>
                            <td class="py-2 px-4 border">
                                <!-- Trigger for Delete Modal -->
                                <button onclick="openDeleteModal({{ $attendance->id }})" class="text-red-500 hover:underline">
                                    Delete
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="py-4 text-center text-gray-600">No attendance records found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div id="addModal" class="fixed inset-0 bg-black bg-opacity-70 flex items-center justify-center hidden z-50">
        <div class="bg-white rounded-lg p-6 shadow-lg w-1/3">
            <h3 class="text-xl font-semibold text-gray-800">Add Attendance</h3>
            <form action="{{ route('attendances.store') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label for="member_id" class="block text-gray-700">Member:</label>
                    <select name="member_id" id="member_id" required class="w-full border-gray-300 rounded">
                        <option value="">-- Select Member --</option>
                        @foreach($members as $member)
                            <option value="{{ $member->id }}">{{ $member->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="date" class="block text-gray-700">Date:</label>
                    <input type="date" name="date" id="date" required class="w-full border-gray-300 rounded">
                </div>
                <div>
                    <label for="check_in" class="block text-gray-700">Check-In Time:</label>
                    <input type="time" name="check_in" id="check_in" required class="w-full border-gray-300 rounded">
                </div>
                <div>
                    <label for="check_out" class="block text-gray-700">Check-Out Time (Optional):</label>
                    <input type="time" name="check_out" id="check_out" class="w-full border-gray-300 rounded">
                </div>
                <div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                        Add Attendance
                    </button>
                </div>
            </form>

        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div id="deleteModal" class="fixed inset-0 bg-black bg-opacity-70 flex items-center justify-center hidden z-50">
        <div class="bg-white rounded-lg p-6 shadow-lg w-1/3">
            <h3 class="text-xl font-semibold text-gray-800">Are you sure you want to delete this attendance record?</h3>
            <div class="flex justify-between mt-4">
                <button onclick="closeDeleteModal()" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Cancel</button>
                <form id="deleteForm" action="" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Delete</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Function to open the add modal
        function openAddModal() {
            document.getElementById('addModal').classList.remove('hidden');
        }

        // Function to close the add modal
        function closeAddModal() {
            document.getElementById('addModal').classList.add('hidden');
        }

        // Function to open the delete confirmation modal
        function openDeleteModal(attendanceId) {
            document.getElementById('deleteModal').classList.remove('hidden');
            document.getElementById('deleteForm').action = '/attendances/' + attendanceId;
        }

        // Function to close the delete confirmation modal
        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.add('hidden');
        }
    </script>
@endsection
