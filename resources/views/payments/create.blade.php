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
            <!-- Header -->
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-2xl font-semibold text-gray-800">Add Payment</h2>
                <a href="{{ route('payments.index') }}" class="bg-gray-500 text-white py-2 px-4 rounded hover:bg-gray-600">
                    Back to Payments
                </a>
            </div>

            <!-- Success/Error message display -->
            @if(session('success'))
                <div id="success-message" class="bg-green-500 text-white p-4 rounded mt-4 shadow">
                    {{ session('success') }}
                </div>
                <script>
                    setTimeout(function () {
                        document.getElementById("success-message").style.display = "none";
                    }, 3000); // 3 seconds
                </script>
            @endif

            <div class="mt-6 bg-white shadow-md rounded-lg p-6">
                <form action="{{ route('payments.store') }}" method="POST">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- User Dropdown -->
                        <div>
                            <label for="user_id" class="block text-gray-700 font-semibold mb-2">User</label>
                            <select id="user_id" name="user_id" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option value="">Select User</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                        {{ $user->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('user_id')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Amount -->
                        <div>
                            <label for="amount" class="block text-gray-700 font-semibold mb-2">Amount</label>
                            <input type="number" name="amount" id="amount" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('amount') }}" required>
                            @error('amount')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Payment Date -->
                        <div>
                            <label for="payment_date" class="block text-gray-700 font-semibold mb-2">Payment Date</label>
                            <input type="date" name="payment_date" id="payment_date" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('payment_date') }}" required>
                            @error('payment_date')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Payment Status -->
                        <div>
                            <label for="payment_status" class="block text-gray-700 font-semibold mb-2">Payment Status</label>
                            <select name="payment_status" id="payment_status" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option value="Paid" {{ old('payment_status') == 'Paid' ? 'selected' : '' }}>Paid</option>
                                <option value="Pending" {{ old('payment_status') == 'Pending' ? 'selected' : '' }}>Pending</option>
                            </select>
                            @error('payment_status')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-6 flex justify-end">
                        <button type="submit" class="bg-blue-500 text-white py-2 px-6 rounded hover:bg-blue-600 shadow">
                            Add Payment
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
