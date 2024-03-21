<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Session;
use App\Models\Reservation;
use App\Models\Room;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function create($date,  $session_number,$session_name, $room_id)
    {
        $user = Auth::user(); // Get the currently authenticated user

        return view('reservations', compact('user', 'date',  'session_number', 'session_name' , 'room_id'));
    }

    public function store(Request $request)
    {
        $reservation = Reservation::create([
            'user_id' => Auth::id(),
            'date' => $request['date'],
            'session_number' => $request['session_number'],
            'session_name' => $request['session_name'],
            'room_id' => $request['room_id'],
            'reason' => $request['reason']
        ]);

        return redirect()->route('reservations.receipt', $reservation);
    }
    public function receipt(Reservation $reservation)
    {

        return view('reservationReceipt', compact('reservation'));
    }
    public function edit($id)
    {
        $reservation = Reservation::findOrFail($id);
        $user = Auth::user(); // Get the currently authenticated user
        return view('reservationEdit', compact('user', 'reservation'));
    }

    public function update(Request $request, $id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->update($request->all());
        return redirect()->route('rooms.show', $reservation->room_id)->with('success', 'Reservation deleted successfully.');
    }

    public function destroy($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->delete();
        return redirect()->back()->with('success', 'Reservation deleted successfully.');
    }
}
