<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight flex items-center justify-center">
            {{ __('Ajouter un Professeur') }}
        </h2>
    </x-slot>

    <x-guest-layout>
        <form method="POST" action="{{ route('register') }}">
            @csrf
    
            <!-- Prénom -->
            <div>
                <x-input-label for="name" :value="__('Prénom')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Nom -->
            <div class="mt-4">
                <x-input-label for="lname" :value="__('Nom de famille')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="lname" :value="old('lname')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
    
            <!-- PPR -->
            <div class="mt-4">
                <x-input-label for="ppr" :value="__('PPR')" />
                <x-text-input id="email" class="block mt-1 w-full" type="text" name="ppr" :value="old('ppr')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
            {{-- Département --}}
            <div class="mt-4">
                <x-input-label for="departement" :value="__('Département')" />
                <x-text-input id="email" class="block mt-1 w-full" type="text" name="departement" :value="old('departement')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
    
            <!-- Email -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Adresse email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
    
            <!-- Mot de passe -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Mot de passe')" />
    
                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
    
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
    
            <!-- Confirmer le mot de passe -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirmer le mot de passe')" />
    
                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />
    
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>
    
            <div class="flex items-center justify-center mt-4">
                
                <x-primary-button class="ms-4">
                    {{ __("Inscrire") }}
                </x-primary-button>
            </div>
        </form>
    </x-guest-layout>
    
</x-app-layout>
