@extends('layouts.admin_panel')

@section('title', 'Cancel Reservation')

@section('content')
<div class="bg-white shadow-md rounded p-6">
    <h2 class="text-2xl font-bold mb-6">Cancel Reservation </h2>

    <form method="POST" action="#">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">Reservation ID:</label>
            <input type="text" name="reservation_id" value="12345" class="border rounded px-4 py-2 w-full">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">Name:</label>
            <input type="text" name="name" value="John Doe" class="border rounded px-4 py-2 w-full">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">Date:</label>
            <input type="date" name="date" value="{{ date('Y-m-d') }}" class="border rounded px-4 py-2 w-full">
        </div>

        <div class="flex space-x-4">
            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-400 transition">
                Cancel Reservation
            </button>
            <a href="{{ route('reservation.dashboard') }}" class="bg-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-200 transition">
                Back
            </a>
        </div>
    </form>
</div>
@endsection
