<?php

// app/Http/Controllers/ReservationController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Session;
use App\Models\Reservation;
use App\Models\Room;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::all();
        return view('rooms', compact('rooms'));
    }

    public function show(Room $room)
    {
        $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
        $reservations = Reservation::where('room_id', $room->id)->get();
        $reservations;
        // $sessions = Session::where('room_id', $room->id)->get();
        return view('roomsShow', compact('room', 'days', 'reservations'));
    }
}



