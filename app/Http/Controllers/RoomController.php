<?php

// app/Http/Controllers/ReservationController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Session;
use App\Models\Reservation;
use App\Models\Room;
use DateTime;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::all();
        return view('rooms', compact('rooms'));
    }

    public function show(Room $room ,$date = null)
    {
        $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
        $sessions = Session::where('room_id', $room->id)->get();
        return view('roomsShow', compact('room', 'sessions', 'days'));
    }
}



