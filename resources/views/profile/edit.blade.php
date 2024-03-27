<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight flex items-center justify-center">
            {{ __('Profile') }}
        </h2>
    </x-slot>
<x-guest-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @if (Auth::user()->role  == 'admin')  
                <div class="p-4 sm:p-8 bg-white shadow-sm sm:rounded-lg mb-4 border border-gray-200">
                    <div class="max-w-xl">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>
            @endif

            <div class="p-4 sm:p-8 bg-white shadow-sm sm:rounded-lg mb-4 border border-gray-200">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            {{-- <div class="p-4 sm:p-8 bg-white shadow-sm sm:rounded-lg mb-4 border border-gray-200">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div> --}}
        </div>
    </div>
</x-guest-layout>
</x-app-layout>
