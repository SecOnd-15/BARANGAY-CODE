<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100 flex">

    <!-- Sidebar -->
    <div class="w-64 bg-yellow-500 text-gray-900 min-h-screen flex flex-col">
        <div class="p-6 text-2xl font-bold border-b border-yellow-400">
            BARANGAY 22-C
        </div>
        <nav class="flex-1 mt-4">
            <a href="{{ route('dashboard') }}" 
               class="flex items-center py-3 px-6 transition duration-200 {{ request()->routeIs('dashboard') ? 'bg-yellow-400' : '' }}">
                <i class="fas fa-tachometer-alt w-6 mr-3"></i>
                Dashboard
            </a>
            
            <a href="{{ route('reservation.dashboard') }}" 
               class="flex items-center py-3 px-6 transition duration-200 {{ request()->routeIs('reservation.dashboard') ? 'bg-yellow-400' : '' }}">
                <i class="fas fa-calendar-check w-6 mr-3"></i>
                Reservation
            </a>
            
            <a href="{{ route('reservation.modify') }}" 
               class="flex items-center py-3 px-6 transition duration-200 {{ request()->routeIs('reservation.modify') ? 'bg-yellow-400' : '' }}">
                <i class="fas fa-edit w-6 mr-3"></i>
                Modify Reservation
            </a>

            <a href="{{ route('reservation.cancel') }}" 
               class="flex items-center py-3 px-6 transition duration-200 {{ request()->routeIs('reservation.cancel') ? 'bg-yellow-400' : '' }}">
                <i class="fas fa-times-circle w-6 mr-3"></i>
                Cancel Reservation
            </a>

            <a href="{{ route('admin.users') }}" 
               class="flex items-center py-3 px-6 transition duration-200 {{ request()->routeIs('admin.users') ? 'bg-yellow-400' : '' }}">
                <i class="fas fa-users w-6 mr-3"></i>
                Users
            </a>

            <a href="{{ route('admin.settings') }}" 
               class="flex items-center py-3 px-6 transition duration-200 {{ request()->routeIs('admin.settings') ? 'bg-yellow-400' : '' }}">
                <i class="fas fa-cog w-6 mr-3"></i>
                Settings
            </a>
        </nav>
        
        <div class="mt-auto p-4 border-t border-yellow-400">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="flex items-center w-full py-3 px-6 hover:bg-yellow-400 transition duration-200 rounded">
                    <i class="fas fa-sign-out-alt w-6 mr-3"></i>
                    Log Out
                </button>
            </form>
        </div>
    </div>

    <!-- Main content -->
    <div class="flex-1 p-8">
        <!-- Header -->
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-gray-800">@yield('title', 'Dashboard')</h1>
            <div class="flex items-center space-x-4">
                <span class="text-gray-600">Welcome, {{ Auth::user()->name }}</span>
                <div class="w-10 h-10 bg-yellow-500 rounded-full flex items-center justify-center">
                    <span class="text-white font-bold">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</span>
                </div>
            </div>
        </div>

        <!-- Dashboard Content -->
        @yield('content')
    </div>

</body>
</html>
