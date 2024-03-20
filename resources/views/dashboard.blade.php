<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight flex items-center justify-center" >
            {{ __('Accueil') }}
        </h2>
    </x-slot>

    @if (Auth::user()->role === 'admin')
    
    @foreach ( $reservations as $reservation)
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="{{ route('register') }}">
                        {{ $reservation->date }} - Session {{ $reservation->session }}: {{ $reservation->room->room_name }} {{ $reservation->user->name }}
                    </a>
                </div>
            </div>
            </div>
        </div>
    @endforeach    


    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="{{ route('register') }}">
                        Ajouter un utilisateur
                    </a>
                </div>
            </div>
        </div>
    </div> --}}
    @endif
{{--         
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="{{ route('rooms.index') }}">
                        Vérifier la disponibilité des chambres
                    </a>
                </div>
            </div>
        </div>
    </div> --}}
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
</x-app-layout>
