@extends('layouts.admin_panel')

@section('title', 'Modify Reservation')

@section('content')
<div class="bg-white shadow-md rounded p-6">
    <h2 class="text-2xl font-bold mb-6">Modify Reservation (Dummy Data)</h2>

    <form method="POST" action="#">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Name</label>
            <input type="text" name="name" value="John Doe" class="border rounded px-4 py-2 w-full">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Email</label>
            <input type="email" name="email" value="johndoe@example.com" class="border rounded px-4 py-2 w-full">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Date</label>
            <input type="date" name="date" value="{{ date('Y-m-d') }}" class="border rounded px-4 py-2 w-full">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Time</label>
            <input type="time" name="time" value="12:00" class="border rounded px-4 py-2 w-full">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Guests</label>
            <input type="number" name="guests" value="4" min="1" class="border rounded px-4 py-2 w-full">
        </div>

        <div class="flex space-x-4">
            <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded">Update</button>
            <a href="{{ route('reservation.dashboard') }}" class="bg-gray-300 px-4 py-2 rounded">Cancel</a>
        </div>
    </form>
</div>
@endsection
