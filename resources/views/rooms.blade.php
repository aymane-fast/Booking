<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight flex items-center justify-center">
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
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-4">
                    <div class="p-6 text-gray-900 dark:text-gray-100 flex justify-between items-center">
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
        </div>
    </div>
</x-app-layout>