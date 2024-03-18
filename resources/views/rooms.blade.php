<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Room Availability') }}
        </h2>
    </x-slot>

    @if (session('error'))
        <div class="bg-red-500 text-white px-4 py-2 rounded">
            {{ session('error') }}
        </div>
    @endif

    <div class="py-12">
    @foreach ($rooms as $room)
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="{{ route('rooms.show', $room) }}">{{ __($room->room_name) }}</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</x-app-layout>








<!-- resources/views/rooms/index.blade.php -->
{{-- <!DOCTYPE html>
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

 --}}
