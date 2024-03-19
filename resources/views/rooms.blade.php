<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room Availability</title>
    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-800 text-gray-100 font-sans">
    <div class="max-w-7xl mx-auto p-8">
        <h1 class="text-xl font-semibold mb-4">Room Availability</h1>
        <ul>
            @foreach ($rooms as $room)
                <li class="bg-gray-700 rounded shadow-sm p-6 text-gray-100 mb-4">
                    <a href="{{ route('rooms.show', $room) }}">{{ $room->room_name }}</a>
                </li>
            @endforeach
        </ul>
    </div>
</body>
</html>
