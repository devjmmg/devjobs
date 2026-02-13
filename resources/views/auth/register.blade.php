<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" class="space-y-5">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nombre')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Correo electónico')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Role -->
        <div>
            <x-input-label for="role" :value="__('¿Qué tipo de cuenta deseas en DevJobs?')" />
            <select id="role" class="block mt-1 w-full border-gray-300 focus:border-lime-500 focus:ring-lime-500 rounded-md shadow-sm" name="role" :value="old('role')" required>
                <option value="" selected disabled>--- Seleccionar rol ---</option>
                <option value="1">Developer - Obtener empleo</option>
                <option value="2">Recruiter - Publicar empleos</option>
            </select>
            <x-input-error :messages="$errors->get('role')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Contraseña')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div>
            <x-input-label for="password_confirmation" :value="__('Confirmar contraseña')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <x-primary-button class="mt-4 w-full justify-center">
            {{ __('Crear cuenta') }}
        </x-primary-button>

        <div class="flex items-center justify-between mt-4">
             @if (Route::has('login'))
                <x-link :href="route('login')">
                    Iniciar sesión
                </x-link>
            @endif

            @if (Route::has('password.request'))
                <x-link :href="route('password.request')">
                    ¿Olvidaste tu contraseña?
                </x-link>
            @endif
        </div>

    </form>
</x-guest-layout>
