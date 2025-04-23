<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="w-1/4 bg-black text-white p-6">
            <ul>
                <li><a href="{{ route('dashboard') }}" class="block py-3 text-lg hover:text-gray-400">Dashboard</a></li>
                <li><a href="#" class="block py-3 text-lg hover:text-gray-400">Profile</a></li>
                <li><a href="#" class="block py-3 text-lg hover:text-gray-400">Trainers</a></li>
                <li><a href="{{ route('appointments.index') }}" class="block py-3 text-lg hover:text-gray-400">Appointments</a></li>
                <li><a href="{{route('payments.index')}}" class="block py-3 text-lg hover:text-gray-400">Payments</a></li>
                <li><a href="{{ route('attendances.index') }}" class="block py-3 text-lg hover:text-gray-400">Attendance</a></li>
                <li><a href="{{ route('members.index') }}" class="block py-3 text-lg hover:text-gray-400">Members</a></li>

            </ul>
            <div class="mt-6">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-primary-button>{{ __('Logout') }}</x-primary-button>
                </form>
            </di
    </body>
</html>
