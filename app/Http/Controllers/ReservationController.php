<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Session;
use App\Models\Reservation;
use App\Models\Room;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function create($day, $session_id, $room_id)
    {
        $user = Auth::user(); // Get the currently authenticated user

        return view('reservations', compact('user','day', 'session_id', 'room_id'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'session_id' => 'required|exists:sessions,id',
            'name' => 'required|string',
            'reason' => 'required|string',
            'day' => 'required|date',
            'session' => 'required|integer',
            'room_id' => 'required|exists:rooms,id',
        ]);

        Reservation::create([
            'session_id' => $data['session_id'],
            'user_id' => Auth::id(),
            'day' => $data['day'],
            'session' => $data['session'],
            'room_id' => $data['room_id'],
        ]);

        return redirect()->route('rooms.index')->with('success', 'Reservation created successfully.');
    }
}