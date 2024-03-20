<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight flex items-center justify-center">
            {{ __('Ajouter une Salle') }}
        </h2>
    </x-slot>
    <x-guest-layout>


    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('rooms.store') }}">
        @csrf

        <!-- Nom de la salle -->
        <div>
            <x-input-label for="room_name" :value="__('Nom de la Salle')" />
            <x-text-input id="room_name" class="block mt-1 w-full" type="text" name="room_name" :value="old('room_name')" required autofocus />
            <x-input-error :messages="$errors->get('room_name')" class="mt-2" />
        </div>

        <!-- Capacité -->
        <div class="mt-4">
            <x-input-label for="capacity" :value="__('Capacité')" />
            <x-text-input id="capacity" class="block mt-1 w-full" type="number" name="capacity" :value="old('capacity')" required />
            <x-input-error :messages="$errors->get('capacity')" class="mt-2" />
        </div>

        <div class="flex items-center justify-center mt-4">
            <x-primary-button class="ms-3">
                {{ __('Ajouter') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
</x-app-layout>
