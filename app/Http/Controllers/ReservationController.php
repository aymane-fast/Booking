<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Session;
use App\Models\Reservation;
use App\Models\Room;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function create($date, $session, $room_id )
    {
        $user = Auth::user(); // Get the currently authenticated user

        return view('reservations', compact('user','date', 'session', 'room_id'));
    }

    public function store(Request $request)
    {

        Reservation::create([
            'session' => $request['session'],
            'user_id' => Auth::id(),
            'date' => $request['date'],
            'session' => $request['session'],
            'room_id' => $request['room_id'],
            'reason' => $request['reason']
        ]);

        return redirect()->route('rooms.index')->with('success', 'Reservation created successfully.');
    }
    public function edit($id)
    {
        $reservation = Reservation::findOrFail($id);
        $user = Auth::user(); // Get the currently authenticated user
        return view('reservationEdit', compact('user','reservation'));
    }

    public function update(Request $request, $id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->update($request->all());
        return redirect()->route('rooms.index')->with('success', 'Reservation deleted successfully.');
        }
    
    public function destroy($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->delete();
        return redirect()->route('rooms.index')->with('success', 'Reservation deleted successfully.');
    }
}