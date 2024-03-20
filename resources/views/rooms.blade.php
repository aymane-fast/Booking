<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room Availability</title>
    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<x-app-layout>

    <body class="bg-gray-800 text-gray-100 font-sans">
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Room Availability') }}
            </h2>
        </x-slot>
        <div class="max-w-7xl mx-auto p-8">
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

</x-app-layout>








<!-- resources/views/rooms/index.blade.php -->
{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room Availability</title>
    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans">
    <div class="container mx-auto p-8">
        <h1 class="text-3xl font-bold mb-4">Room Availability</h1>
        <ul class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($rooms as $room)
                <li class="bg-white rounded shadow p-4">
                    <a href="{{ route('rooms.show', $room) }}" class="text-blue-500 hover:underline">{{ $room->room_name }}</a>
                </li>
            @endforeach
        </ul>
    </div>
</body>
</html>

 --}}
