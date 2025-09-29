@extends('layouts.resident_panel')

@section('title', 'Dashboard')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-bold mb-6">Resident Dashboard</h2>
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <!-- Stats Cards -->
        <div class="bg-yellow-100 p-4 rounded-lg shadow">
            <div class="flex items-center">
                <i class="fas fa-calendar-check text-yellow-600 text-2xl mr-3"></i>
                <div>
                    <p class="text-gray-600">Total Reservations</p>
                    <p class="text-2xl font-bold">5</p>
                </div>
            </div>
        </div>
        
        <div class="bg-green-100 p-4 rounded-lg shadow">
            <div class="flex items-center">
                <i class="fas fa-check-circle text-green-600 text-2xl mr-3"></i>
                <div>
                    <p class="text-gray-600">Approved</p>
                    <p class="text-2xl font-bold">3</p>
                </div>
            </div>
        </div>
        
        <div class="bg-blue-100 p-4 rounded-lg shadow">
            <div class="flex items-center">
                <i class="fas fa-clock text-blue-600 text-2xl mr-3"></i>
                <div>
                    <p class="text-gray-600">Pending</p>
                    <p class="text-2xl font-bold">2</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="bg-gray-50 p-6 rounded-lg">
        <h3 class="text-xl font-bold mb-4">Quick Actions</h3>
        <div class="flex space-x-4">
            <a href="{{ route('resident.reservation.add') }}" 
               class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg transition duration-200">
                <i class="fas fa-plus mr-2"></i>Make Reservation
            </a>
            <a href="{{ route('resident.booking.history') }}" 
               class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg transition duration-200">
                <i class="fas fa-history mr-2"></i>View History
            </a>
        </div>
    </div>
</div>
@endsection