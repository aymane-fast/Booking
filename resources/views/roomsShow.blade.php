<!-- resources/views/rooms/show.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $room->room_name }} Availability</title>
</head>
<body>
    <h1>{{ $room->room_name }} Availability</h1>
    <table>
        <thead>
            <tr>
                <th>Session</th>
                <th>Status</th>
                <th>Booking</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sessions as $session)
                <tr>
                    <td>Session {{ $session->session_number }}</td>
                    <td>
                        @if ($session->reservation)
                            Booked by: {{ $session->reservation->name }} (Reason: {{ $session->reservation->reason }})
                        @else
                            Available
                        @endif
                    </td>
                    <td>
                        @if (!$session->reservation)
                            <a href="{{ route('reservations.create', $session) }}">Book Now</a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
