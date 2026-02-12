<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('¿Olvidaste tu contraseña? No hay problema. Simplemente indícanos tu correo electrónico y te enviaremos un enlace para restablecer tu contraseña y podrás elegir una nueva.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Correo electrónico')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <x-primary-button class="mt-4 w-full justify-center">
            {{ __('Restablecer contraseña') }}
        </x-primary-button>

        <div class="flex items-center justify-between mt-4">
             @if (Route::has('login'))
                <x-link :href="route('login')">
                    Iniciar sesión
                </x-link>
            @endif

            @if (Route::has('register'))
                <x-link :href="route('register')">
                    Crear cuenta
                </x-link>
            @endif
        </div>

    </form>
</x-guest-layout>
