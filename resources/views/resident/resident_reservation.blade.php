@extends('layouts.resident_panel')

@section('title', 'My Reservations')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">My Reservations</h2>
        <a href="#" class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 transition duration-200 font-semibold">
            + Make New Reservation
        </a>
    </div>

    @php
        // Dummy reservations
        $reservations = [
            (object)[
                'id' => 1,
                'date' => '2025-10-05',
                'time' => '10:00',
                'purpose' => 'Study Reservation',
                'status' => 'Pending'
            ],
            (object)[
                'id' => 2,
                'date' => '2025-10-06',
                'time' => '14:00',
                'purpose' => 'Computer Reservation',
                'status' => 'Approved'
            ],
            (object)[
                'id' => 3,
                'date' => '2025-10-07',
                'time' => '18:30',
                'purpose' => 'Meeting Room',
                'status' => 'Rejected'
            ],
        ];

        // Function to convert military time to 12-hour format
        function formatTime($militaryTime) {
            return date('g:i A', strtotime($militaryTime));
        }
    @endphp

    @if(count($reservations) > 0)
    <table class="min-w-full border rounded-lg">
        <thead class="bg-yellow-100">
            <tr>
                <th class="py-3 px-4 border text-left">Date</th>
                <th class="py-3 px-4 border text-left">Time</th>
                <th class="py-3 px-4 border text-left">Purpose</th>
                <th class="py-3 px-4 border text-left">Status</th>
                <th class="py-3 px-4 border text-left">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reservations as $res)
            <tr class="border hover:bg-gray-50">
                <td class="py-3 px-4 border">{{ date('M j, Y', strtotime($res->date)) }}</td>
                <td class="py-3 px-4 border">{{ formatTime($res->time) }}</td>
                <td class="py-3 px-4 border">{{ $res->purpose }}</td>
                <td class="py-3 px-4 border">
                    @if($res->status == 'Pending')
                        <span class="bg-yellow-200 text-yellow-800 py-1 px-3 rounded-full text-sm font-semibold">{{ $res->status }}</span>
                    @elseif($res->status == 'Approved')
                        <span class="bg-green-200 text-green-800 py-1 px-3 rounded-full text-sm font-semibold">{{ $res->status }}</span>
                    @elseif($res->status == 'Rejected')
                        <span class="bg-red-200 text-red-800 py-1 px-3 rounded-full text-sm font-semibold">{{ $res->status }}</span>
                    @else
                        <span class="bg-gray-200 text-gray-800 py-1 px-3 rounded-full text-sm font-semibold">{{ $res->status }}</span>
                    @endif
                </td>
                <td class="py-3 px-4 border">
                    <div class="flex space-x-2">
                        @if($res->status == 'Rejected' || $res->status == 'Approved')
                            <span class="text-gray-400 text-sm py-1 px-3">No actions available</span>
                        @else
                            <a href="#" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 transition duration-200 text-sm">Edit</a>
                            <a href="#" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 transition duration-200 text-sm">Cancel</a>
                        @endif
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <div class="text-center py-8 bg-gray-50 rounded-lg">
        <p class="text-gray-500 text-lg mb-4">You don't have any reservations yet.</p>
        <a href="#" class="bg-green-500 text-white px-6 py-2 rounded-lg hover:bg-green-600 transition duration-200 font-semibold inline-block">
            Make Your First Reservation
        </a>
    </div>
    @endif
</div>
@endsection
