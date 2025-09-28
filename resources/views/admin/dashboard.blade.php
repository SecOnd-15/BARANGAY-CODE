@extends('layouts.admin_panel')

@section('title', 'Admin Dashboard')

@section('content')


<!-- Stats Cards -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
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
@endsection