<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Resident Panel')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100 flex">

    <!-- Sidebar -->
    <div class="w-64 bg-yellow-500 text-gray-900 min-h-screen flex flex-col">
        <div class="p-6 flex flex-col items-center border-b border-yellow-400">
            <!-- Logo Circle -->
            <div class="flex justify-center mb-2 -mt-2">
                <div class="w-24 h-24 rounded-full overflow-hidden shadow-xl">
                    <img src="{{ asset('LOGO.png') }}" 
                         alt="Barangay Logo" 
                         class="w-full h-full object-cover scale-125">
                </div>
            </div>
            <!-- Logo Name -->
            <span class="text-2xl font-bold text-center">BARANGAY 22-C</span>
        </div>

        <!-- Navigation -->
        <nav class="flex-1 mt-4">
            <!-- Dashboard -->
            <a href="{{ route('resident.dashboard') }}" 
               class="flex items-center py-3 px-6 transition duration-200 {{ request()->routeIs('resident.dashboard') ? 'bg-yellow-400' : '' }}">
                <i class="fas fa-tachometer-alt w-6 mr-3"></i>
                Dashboard
            </a>

            <!-- Make Reservation -->
            <a href="{{ route('resident.reservation.add') }}" 
               class="flex items-center py-3 px-6 transition duration-200 {{ request()->routeIs('resident.reservation.add') ? 'bg-yellow-400' : '' }}">
                <i class="fas fa-plus-circle w-6 mr-3"></i>
                Make Reservation
            </a>

            <!-- My Reservations -->
            <a href="{{ route('resident.reservation') }}" 
               class="flex items-center py-3 px-6 transition duration-200 {{ request()->routeIs('resident.reservation') ? 'bg-yellow-400' : '' }}">
                <i class="fas fa-calendar-check w-6 mr-3"></i>
                My Reservations
            </a>

            <!-- Booking History -->
            <a href="{{ route('resident.booking.history') }}" 
               class="flex items-center py-3 px-6 transition duration-200 {{ request()->routeIs('resident.booking.history') ? 'bg-yellow-400' : '' }}">
                <i class="fas fa-history w-6 mr-3"></i>
                Booking History
            </a>

            <!-- Logout -->
            <div class="mt-4 px-6">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="flex items-center w-full py-3 px-6 hover:bg-yellow-400 transition duration-200 rounded">
                        <i class="fas fa-sign-out-alt w-6 mr-3"></i>
                        Log Out
                    </button>
                </form>
            </div>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="flex-1 p-8">
        <!-- Header -->
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-gray-800">@yield('title', 'Resident Panel')</h1>
            <div class="flex items-center space-x-4">
                <span class="text-gray-600">Welcome, {{ Auth::user()->name ?? 'Resident' }}</span>
                <div class="w-10 h-10 bg-yellow-500 rounded-full flex items-center justify-center">
                    <span class="text-white font-bold">{{ strtoupper(substr(Auth::user()->name ?? 'R', 0, 1)) }}</span>
                </div>
            </div>
        </div>

        <!-- Page Content -->
        @yield('content')
    </div>

</body>
</html>
