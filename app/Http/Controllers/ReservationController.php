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
    public function create($date, $session, $room_id)
    {
        $user = Auth::user(); // Get the currently authenticated user

        return view('reservations', compact('user', 'date', 'session', 'room_id'));
    }

    public function store(Request $request)
    {

        //     // Get the current week's start and end dates
        // $weekStart = Carbon::now()->startOfWeek();
        // $weekEnd = Carbon::now()->endOfWeek();

        // // Count the user's reservations for the current week
        // $reservationCount = Reservation::where('user_id', Auth::id())
        //     ->whereBetween('date', [$weekStart, $weekEnd])
        //     ->count();

        // // Check if the user has already made 4 reservations this week
        // if ($reservationCount >= 4) {
        //     return redirect()->route('rooms.index')->with('error', 'You have reached the maximum number of reservations for this week.');
        // }
        $reservation = Reservation::create([
            'session' => $request['session'],
            'user_id' => Auth::id(),
            'date' => $request['date'],
            'session' => $request['session'],
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
        return redirect()->route('rooms.index')->with('success', 'Reservation deleted successfully.');
    }

    public function destroy($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->delete();
        return redirect()->route('rooms.index')->with('success', 'Reservation deleted successfully.');
    }
}
