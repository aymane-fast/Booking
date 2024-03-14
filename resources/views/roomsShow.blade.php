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
            @foreach ($days as $day)
                <tr>
                    <th colspan="4">{{ $day }}</th>
                </tr>
                @for ($i = 1; $i <= 5; $i++)
                    <tr>
                        <td>Session{{ $i }}</td>
                        <td>
                            @if (isset($reservations[$day][$i]))
                    Booked by: {{ $reservations[$day][$i]->name }} (Reason: {{ $reservations[$day][$i]->reason }})
                    <a href="{{ route('reservations.edit', ['id' => $reservations[$day][$i]->id, 'room_id' => $room->id]) }}">
                        Edit
                    </a>
                @else
                    Available
                    <a href="{{ route('reservations.create', ['day' => $day, 'session' => $i, 'room_id' => $room->id]) }}">
                        Book Now
                    </a>
                @endif
                        </td>
                    </tr>
                @endfor
            @endforeach
        </tbody>
    </table>

    

    
        </tbody>
    </table>
</body>
</html>
