<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight flex items-center justify-center">
            {{ __('Disponibilité des Salles') }}
        </h2>
    </x-slot>
    <x-guest-layout>
    
    
        @if (session('error'))
            <div class="bg-red-500 text-white px-4 py-2 rounded">
                {{ session('error') }}
            </div>
        @endif
    
        <div class="py-12">
            <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
                @foreach ($rooms as $room)
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4 border border-gray-200 ">
                        <div class="p-6 text-gray-900 flex justify-between items-center debug-grid">
                            <a href="{{ route('rooms.show', $room) }}" class="text-lg font-semibold">{{ __($room->room_name) }}</a>
                            @if ( Auth::user()->role == 'admin')
                            <form action="{{ route('rooms.destroy', $room) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <x-primary-button class="ms-4">
                                    {{ __('Supprimer') }}
                                </x-primary-button>
                            </form>
                            @endif
                        </div>
                    </div>
                @endforeach
                {{ $rooms->links() }}
            </div>
        </div>
    </x-guest-layout>
</x-app-layout>

