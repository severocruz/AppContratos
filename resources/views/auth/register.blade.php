<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf
         <!-- Apellido paterno -->
         <div>
            <x-input-label for="a_paterno" :value="__('LastName1')" />
            <x-text-input id="a_paterno" class="block mt-1 w-full" type="text" name="a_paterno" :value="old('a_paterno')" required autofocus autocomplete="a_paterno" />
            <x-input-error :messages="$errors->get('a_paterno')" class="mt-2" />
        </div>

        <!-- Apellido materno -->
        <div>
            <x-input-label for="a_materno" :value="__('LastName2')" />
            <x-text-input id="a_materno" class="block mt-1 w-full" type="text" name="a_materno" :value="old('a_materno')" required autofocus autocomplete="a_materno" />
            <x-input-error :messages="$errors->get('a_materno')" class="mt-2" />
        </div>
        <!-- Nombres -->
        <div>
            <x-input-label for="nombres" :value="__('Names')" />
            <x-text-input id="nombres" class="block mt-1 w-full" type="text" name="nombres" :value="old('nombres')" required autofocus autocomplete="nombres" />
            <x-input-error :messages="$errors->get('nombres')" class="mt-2" />
        </div>
        <!-- Nombres -->
        <div>
            <x-input-label for="ci" :value="__('CI')" />
            <x-text-input id="ci" class="block mt-1 w-full" type="text" name="ci" :value="old('ci')" required autofocus autocomplete="ci" />
            <x-input-error :messages="$errors->get('ci')" class="mt-2" />
        </div>
        <!-- Nombres -->
        <div>
            <x-input-label for="id_dep" :value="__('Issued')" />
            <x-text-input id="id_dep" class="block mt-1 w-full" type="text" name="id_dep" :value="old('id_dep')" required autofocus autocomplete="id_dep" />
            <x-input-error :messages="$errors->get('id_dep')" class="mt-2" />
        </div>
        <!-- Address -->
        <div>
            <x-input-label for="direccion" :value="__('Address')" />
            <x-text-input id="direccion" class="block mt-1 w-full" type="text" name="direccion" :value="old('direccion')" required autofocus autocomplete="direccion" />
            <x-input-error :messages="$errors->get('direccion')" class="mt-2" />
        </div>
        <!-- Phone -->
        <div>
            <x-input-label for="telefono" :value="__('Phone')" />
            <x-text-input id="telefono" class="block mt-1 w-full" type="text" name="telefono" :value="old('telefono')" required autofocus autocomplete="telefono" />
            <x-input-error :messages="$errors->get('telefono')" class="mt-2" />
        </div>

        <x-text-input id="id_estus" class="block mt-1 w-full" type="hidden" name="id_estus" value="3" required autofocus autocomplete="id_estus" />
        
        <!-- Type user -->
        <div>
            <x-input-label for="id_tipous" :value="__('User type')" />
            <x-text-input id="id_tipous" class="block mt-1 w-full" type="text" name="id_tipous" :value="old('id_tipous')" required autofocus autocomplete="id_tipous" />
            <x-input-error :messages="$errors->get('id_tipous')" class="mt-2" />
        </div>
        
        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
        
        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
