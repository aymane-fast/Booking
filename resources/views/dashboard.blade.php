<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight flex items-center justify-center" >
            {{ __('Accueille') }}
        </h2>
    </x-slot>

    
    @if (Auth::user()->role === 'admin')
        
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                   <a href="{{ route('register') }}">
                       add user
                    </a>
                </div>
            </div>
        </div>
    </div>
    @endif
        
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                   <a href="{{ route('rooms.index') }}">
                       check rooms availability
                    </a>
                </div>
            </div>
        </div>
    </div>
    @if (Auth::user()->role == 'admin')
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <a href="{{ route('register') }}">
                            add user
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endif
</x-app-layout>
@isset(Auth::user()->reservations)
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <h2 class="text-lg font-semibold mb-4">Your Reservations</h2>
                {{-- Debugging: Dump reservations --}}
                <ul>
                    @foreach (Auth::user()->reservations as $reservation)
                    <li>{{ $reservation->date }} - Session {{ $reservation->session }}: {{ $reservation->room->room_name }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@endisset

