<?php

namespace App\Http\Controllers;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = [
            ['name' => 'Juan Dela Cruz', 'date' => '2025-09-28', 'time' => '10:00 AM', 'status' => 'Pending'],
            ['name' => 'Maria Santos', 'date' => '2025-09-28', 'time' => '11:00 AM', 'status' => 'Completed'],
        ];

        return view('admin.reservation', compact('reservations'));
    }
}
