<!-- resources/views/rooms/show.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $room->room_name }} Availability</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
    
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
    
        th {
            background-color: #4CAF50;
            color: white;
        }
    
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    
        a {
            display: inline-block;
            padding: 5px 10px;
            background-color: #007BFF;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
    
        a:hover {
            background-color: #0056b3;
        }
    </style>
    
</head>
<body>
    <h1>{{ $room->room_name }} Availability</h1>


    <table>
        <tbody>
            <tr>
                <th></th>
                @for ($i = 1; $i <= 5; $i++)
                    <th>{{isset($sess[$i]) ? $sess[$i] : '' }}</th>
                @endfor
            </tr>
            @foreach ($days as $day)
                <tr>
                    <th>{{ \Carbon\Carbon::parse($day)->format('l') }}  {{ $day }}</th>
                    @for ($i = 1; $i <= 5; $i++)
                        <td>
                            @if (isset($reservations[$day][$i]))
                                Booked by: {{ $reservations[$day][$i]->user->name }} (Reason: {{ $reservations[$day][$i]->reason }})
                                {{-- <a href="{{ route('reservations.edit', ['id' => $reservations[$day][$i]->id, 'room_id' => $room->id]) }}"> --}}
                                    Edit
                                </a>
                            @else
                                Available
                                <a href="{{ route('reservations.create', ['date' => $day, 'session' => $i, 'room_id' => $room->id]) }}">
                                    Book Now
                                </a>
                            @endif
                        </td>
                    @endfor
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="nav-links">
        <a href="{{ url('/rooms/'.$room->id.'/' . $prevWeek) }}">Previous Week</a>
        <a href="{{ url('/rooms') }}">Rooms page</a>
        <a href="{{ url('/rooms/'.$room->id.'/' . $nextWeek) }}">Next Week</a>
    </div>
</body>
</html>
