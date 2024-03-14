<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// app/Http/Controllers/ReservationController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Session;
use App\Models\Reservation;

class ReservationController extends Controller
{
    public function create(Session $session)
    {
        return view('reservations', compact('session'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'session_id' => 'required|exists:sessions,id',
            'name' => 'required|string',
            'reason' => 'required|string',
        ]);

        $userId = auth()->id();
        Reservation::create([
            'user_id' => $userId,
            'session_id' => $data['session_id'],
            'reason' => $data['reason'],
            'name' => $data['name'],

        ]);

        return redirect()->route('rooms.index')->with('success', 'Reservation created successfully.');
    }
}
