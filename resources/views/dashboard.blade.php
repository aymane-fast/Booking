<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight flex items-center justify-center" >
            {{ __('Accueil') }}
        </h2>
    </x-slot>
<x-guest-layout>
    @if (Auth::user()->role === 'admin')
    
    @foreach ( $reservations as $reservation)
    <div class="pt-6 pb-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-blue-200 dark:bg-blue-800 overflow-hidden shadow-sm sm:rounded-lg border border-gray-200">
                <div class="p-6 text-blue-900 dark:text-blue-100">
                    <a href="{{ route('register') }}">
                        {{ $reservation->date }} - Session {{ $reservation->session }}: {{ $reservation->room->room_name }} {{ $reservation->user->name }}
                    </a>
                </div>
            </div>
        </div>
    </div>
@endforeach  
    @endif

    @isset(Auth::user()->reservations)
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="text-lg font-semibold mb-4">Vos réservations</h2>
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
</x-guest-layout>
</x-app-layout>
