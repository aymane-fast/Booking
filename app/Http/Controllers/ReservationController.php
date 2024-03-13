<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// app/Http/Controllers/ReservationController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Session;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;

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
        $userId = Auth::id();
        Reservation::create([

            'session_id' => $data['session_id'],
            'user_id' => $userId
        ]);

        return redirect()->route('rooms.index')->with('success', 'Reservation created successfully.');
    }
}
