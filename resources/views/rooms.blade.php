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
    <x-guest-layout>
    
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-900 leading-tight flex items-center justify-center">
                {{ __('Disponibilité des Salles') }}
            </h2>
        </x-slot>
    
        @if (session('error'))
            <div class="bg-red-500 text-white px-4 py-2 rounded">
                {{ session('error') }}
            </div>
        @endif
    
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                @foreach ($rooms as $room)
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4 border border-gray-200">
                        <div class="p-6 text-gray-900 flex justify-between items-center">
                            <a href="{{ route('rooms.show', $room) }}" class="text-lg font-semibold">{{ __($room->room_name) }}</a>
                            <form action="{{ route('rooms.destroy', $room) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <x-primary-button class="ms-4">
                                    {{ __('Delete') }}
                                </x-primary-button>
                            </form>
                        </div>
                    </div>
                @endforeach
                {{ $rooms->links() }}
            </div>
        </div>
    </x-guest-layout>
    </x-app-layout>