<!-- resources/views/rooms/index.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room Availability</title>
</head>
<body>
    <h1>Room Availability</h1>
    <ul>
        @foreach ($rooms as $room)
            <li>
                <a href="{{ route('rooms.show', $room) }}">{{ $room->room_name }}</a>
            </li>
        @endforeach
    </ul>
</body>
</html>
