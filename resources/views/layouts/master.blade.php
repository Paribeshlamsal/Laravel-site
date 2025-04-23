<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gym Management Navbar & Footer</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <!-- Navbar -->
    <nav class="bg-blue-600 text-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <!-- Logo -->
                <div class="flex items-center">
                    <span class="text-lg font-bold">GymPro</span>
                </div>

                <!-- Links -->
                <div class="hidden md:flex space-x-4">
                    <a href="#" class="hover:text-gray-300">Home</a>
                    <a href="#" class="hover:text-gray-300">About Us</a>
                    <a href="#" class="hover:text-gray-300">Membership</a>
                    <a href="#" class="hover:text-gray-300">Trainers</a>
                    <a href="#" class="hover:text-gray-300">Contact</a>
                </div>

                <!-- Mobile Menu Button -->
                <div class="md:hidden">
                    <button id="mobile-menu-button" class="text-white focus:outline-none">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="md:hidden hidden">
            <div class="px-2 pt-2 pb-3 space-y-1">
                <a href="#" class="block px-3 py-2 rounded-md text-base font-medium hover:bg-blue-700">Home</a>
                <a href="#" class="block px-3 py-2 rounded-md text-base font-medium hover:bg-blue-700">About Us</a>
                <a href="#" class="block px-3 py-2 rounded-md text-base font-medium hover:bg-blue-700">Membership</a>
                <a href="#" class="block px-3 py-2 rounded-md text-base font-medium hover:bg-blue-700">Trainers</a>
                <a href="#" class="block px-3 py-2 rounded-md text-base font-medium hover:bg-blue-700">Contact</a>
            </div>
        </div>
    </nav>

    <!-- Main Content Placeholder -->
    {{-- <div class="flex-grow">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <h1 class="text-3xl font-bold text-center">Welcome to GymPro!</h1>
            <p class="text-gray-700 text-center mt-4">Your fitness journey starts here.</p>
        </div>
    </div> --}}

    @yield('content')

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center">
                <div class="text-sm">
                    &copy; 2024 GymPro. All rights reserved.
                </div>
                <div class="space-x-4">
                    <a href="#" class="text-gray-400 hover:text-white">Privacy Policy</a>
                    <a href="#" class="text-gray-400 hover:text-white">Terms of Service</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Script for Mobile Menu Toggle -->
    <script>
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            const mobileMenu = document.getElementById('mobile-menu');
            mobileMenu.classList.toggle('hidden');
        });
    </script>
</body>
</html>
