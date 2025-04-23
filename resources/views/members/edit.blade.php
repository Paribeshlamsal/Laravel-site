@extends('layouts.app')

@section('header')
    <div class="flex items-center space-x-4">
        <img src="{{ asset('images/gym-logo.png') }}" alt="Gym Logo" class="w-12 h-12">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Edit Member') }}
        </h2>
    </div>
@endsection

@section('content')
    <div class="flex min-h-screen bg-gray-900">
        <div class="w-1/4 bg-black text-white p-6">
            <!-- Sidebar links -->
            <ul>
                <li><a href="{{ route('dashboard') }}" class="block py-3 text-lg hover:text-gray-400">Dashboard</a></li>
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

        <!-- Edit Member Form -->
        <div class="flex-1 bg-white p-6">
            <h3 class="text-2xl font-semibold text-gray-800 mb-6">Edit Member</h3>

            <!-- Validation Errors -->
            @if ($errors->any())
                <div class="mb-4 text-red-500">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Edit Form -->
            <form action="{{ route('members.update', $member->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="name" class="block text-sm font-semibold text-gray-700">Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $member->name) }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-sm font-semibold text-gray-700">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email', $member->email) }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div class="mb-4">
                    <label for="phone" class="block text-sm font-semibold text-gray-700">Phone</label>
                    <input type="text" name="phone" id="phone" value="{{ old('phone', $member->phone) }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div class="mb-4">
                    <label for="membership_type" class="block text-sm font-semibold text-gray-700">Membership Type</label>
                    <select name="membership_type" id="membership_type" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="monthly" {{ old('membership_type', $member->membership_type) == 'monthly' ? 'selected' : '' }}>Monthly</option>
                        <option value="yearly" {{ old('membership_type', $member->membership_type) == 'yearly' ? 'selected' : '' }}>Yearly</option>
                    </select>
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600">Update Member</button>
                </div>
            </form>
        </div>
    </div>
@endsection
