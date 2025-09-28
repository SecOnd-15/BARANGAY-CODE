<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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
            <a href="{{ route('dashboard') }}" class="flex items-center py-3 px-6 hover:bg-yellow-400 transition duration-200">
                <i class="fas fa-tachometer-alt w-6 mr-3"></i>
                Dashboard
            </a>
            
            <a href="#" class="flex items-center py-3 px-6 hover:bg-yellow-400 transition duration-200">
                <i class="fas fa-calendar-check w-6 mr-3"></i>
                Reservation
            </a>
            
            <a href="#" class="flex items-center py-3 px-6 hover:bg-yellow-400 transition duration-200">
                <i class="fas fa-edit w-6 mr-3"></i>
                Modify Reservation
            </a>
            
            <a href="#" class="flex items-center py-3 px-6 hover:bg-yellow-400 transition duration-200">
                <i class="fas fa-times-circle w-6 mr-3"></i>
                Cancel Reservation
            </a>
            
            <a href="#" class="flex items-center py-3 px-6 hover:bg-yellow-400 transition duration-200">
                <i class="fas fa-users w-6 mr-3"></i>
                Users
            </a>
            
            <a href="#" class="flex items-center py-3 px-6 hover:bg-yellow-400 transition duration-200">
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
            <h1 class="text-3xl font-bold text-gray-800">Admin Dashboard</h1>
            <div class="flex items-center space-x-4">
                <span class="text-gray-600">Welcome, {{ Auth::user()->name }}</span>
                <div class="w-10 h-10 bg-yellow-500 rounded-full flex items-center justify-center">
                    <span class="text-white font-bold">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</span>
                </div>
            </div>
        </div>

        <!-- Dashboard Content -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
            <!-- Stats Cards -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <div class="flex items-center">
                    <div class="p-3 bg-blue-100 rounded-lg">
                        <i class="fas fa-calendar-check text-blue-600 text-xl"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm text-gray-600">Total Reservations</p>
                        <p class="text-2xl font-bold text-gray-900">156</p>
                    </div>
                </div>
            </div>
            
            <div class="bg-white p-6 rounded-lg shadow-md">
                <div class="flex items-center">
                    <div class="p-3 bg-green-100 rounded-lg">
                        <i class="fas fa-users text-green-600 text-xl"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm text-gray-600">Active Users</p>
                        <p class="text-2xl font-bold text-gray-900">89</p>
                    </div>
                </div>
            </div>
            
            <div class="bg-white p-6 rounded-lg shadow-md">
                <div class="flex items-center">
                    <div class="p-3 bg-purple-100 rounded-lg">
                        <i class="fas fa-clock text-purple-600 text-xl"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm text-gray-600">Pending Requests</p>
                        <p class="text-2xl font-bold text-gray-900">23</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Activity -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <h3 class="text-xl font-semibold text-gray-800 mb-4">Recent Activity</h3>
            <div class="space-y-3">
                <div class="flex items-center justify-between p-3 bg-gray-50 rounded">
                    <div class="flex items-center">
                        <i class="fas fa-calendar-plus text-green-500 mr-3"></i>
                        <span>New reservation created</span>
                    </div>
                    <span class="text-sm text-gray-500">2 minutes ago</span>
                </div>
                <div class="flex items-center justify-between p-3 bg-gray-50 rounded">
                    <div class="flex items-center">
                        <i class="fas fa-user-plus text-blue-500 mr-3"></i>
                        <span>New user registered</span>
                    </div>
                    <span class="text-sm text-gray-500">1 hour ago</span>
                </div>
                <div class="flex items-center justify-between p-3 bg-gray-50 rounded">
                    <div class="flex items-center">
                        <i class="fas fa-times-circle text-red-500 mr-3"></i>
                        <span>Reservation cancelled</span>
                    </div>
                    <span class="text-sm text-gray-500">3 hours ago</span>
                </div>
            </div>
        </div>
    </div>

</body>
</html>