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

        if ($date) {
            $date = new DateTime($date);
        } else {
            $date = new DateTime();
        }
    
        $startOfWeek = (clone $date)->modify('Monday this week');
        $endOfWeek = (clone $date)->modify('Sunday this week');
    
        $days = [];
        for ($i = clone $startOfWeek; $i <= $endOfWeek; $i->modify('+1 day')) {
            $days[] = $i->format('Y-m-d');
        }
    
        $prevWeek = (clone $startOfWeek)->modify('-1 week')->format('Y-m-d');
        $nextWeek = (clone $startOfWeek)->modify('+1 week')->format('Y-m-d');


        $sessions = Session::where('room_id', $room->id)->get();


        $reservations = [];
        foreach ($days as $day) {
            for ($i = 1; $i <= 5; $i++) {
                $reservations[$day][$i] = Reservation::where('room_id', $room->id)
                    ->where('date', $day)
                    ->where('session', $i)
                    ->first();

            }
        }
        $sess =['','9h00-10h15','10h30-11h45','12h00-13h15','13h30-14h45','15h00-16h15'];
        return view('roomsShow', compact('room', 'sessions', 'days', 'reservations', 'prevWeek', 'nextWeek' ,'sess'));
    }
}



