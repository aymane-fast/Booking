<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Session;
use App\Models\Reservation;
use App\Models\Room;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function create($day, $session, $room_id)
    {
        $user = Auth::user(); // Get the currently authenticated user

        return view('reservations', compact('user','day', 'session', 'room_id'));
    }

    public function store(Request $request)
    {

        Reservation::create([
            'session' => $request['session'],
            'user_id' => Auth::id(),
            'day' => $request['day'],
            'session' => $request['session'],
            'room_id' => $request['room_id'],
            'reason' => $request['reason']
        ]);

        return redirect()->route('rooms.index')->with('success', 'Reservation created successfully.');
    }
}