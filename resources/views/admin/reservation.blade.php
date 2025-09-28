@extends('layouts.admin_panel')

@section('title', 'Reservations')

@section('content')
<h2 class="text-2xl font-bold mb-4">Reservations</h2>
<table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
    <thead>
        <tr class="bg-gray-100 text-left">
            <th class="py-2 px-4">Name</th>
            <th class="py-2 px-4">Date</th>
            <th class="py-2 px-4">Time</th>
            <th class="py-2 px-4">Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($reservations as $res)
        <tr class="border-b hover:bg-gray-50">
            <td class="py-2 px-4">{{ $res['name'] }}</td>
            <td class="py-2 px-4">{{ $res['date'] }}</td>
            <td class="py-2 px-4">{{ $res['time'] }}</td>
            <td class="py-2 px-4">
                <span class="px-2 py-1 rounded text-white 
                    {{ $res['status'] == 'Pending' ? 'bg-yellow-500' : 'bg-green-500' }}">
                    {{ $res['status'] }}
                </span>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
