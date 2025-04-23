@extends('layouts.app')

@section('header')
    <div class="flex items-center space-x-4">
        <img src="{{ asset('images/gym-logo.png') }}" alt="Gym Logo" class="w-12 h-12">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Add New Member') }}
        </h2>
    </div>
@endsection

@section('content')
    <div class="flex min-h-screen bg-gray-900">
        <div class="w-1/4 bg-black text-white p-6">
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

        <!-- Add Member Form -->
        <div class="flex-1 bg-white p-6">
            <h3 class="text-2xl font-semibold text-gray-800 mb-6">Add New Member</h3>

            <form action="{{ route('members.store') }}" method="POST">
                @csrf
                <div class="space-y-4">
                    <div>
                        <label for="name" class="block text-gray-700">Name</label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" class="w-full p-3 mt-2 border rounded-lg" required>
                    </div>

                    <div>
                        <label for="email" class="block text-gray-700">Email</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" class="w-full p-3 mt-2 border rounded-lg" required>
                    </div>

                    <div>
                        <label for="phone" class="block text-gray-700">Phone</label>
                        <input type="text" id="phone" name="phone" value="{{ old('phone') }}" class="w-full p-3 mt-2 border rounded-lg" required>
                    </div>

                    <div>
                        <label for="membership_type" class="block text-gray-700">Membership Type</label>
                        <select id="membership_type" name="membership_type" class="w-full p-3 mt-2 border rounded-lg" required>
                            <option value="basic">Basic</option>
                            <option value="premium">Premium</option>
                            <option value="vip">VIP</option>
                        </select>
                    </div>

                    <div class="flex justify-end mt-6">
                        <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600">
                            Add Member
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
