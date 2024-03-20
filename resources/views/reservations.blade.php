<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight flex items-center justify-center">
            {{ __('Réserver') }}
        </h2>
    </x-slot>
    <x-guest-layout>
    <div class="container mx-auto p-8">
        <form action="{{ route('reservations.store') }}" method="POST">
            @csrf

            <input type="hidden" name="user_id" value="{{ $user->id }}">
            <input type="hidden" name="date" value="{{ $date }}">
            <input type="hidden" name="session" value="{{ $session }}">
            <input type="hidden" name="room_id" value="{{ $room_id }}">

            <div class="mb-4">
                <label for="reason" class="block text-sm font-medium text-gray-700">Raison</label>
                <input type="text" id="reason" name="reason" class="mt-1 p-2 rounded-md border border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 block w-full" required>
            </div>

            <div class="flex items-center justify-center mt-4">
                <x-primary-button class="ms-3">
                    {{ __('reserver') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
</x-app-layout>

