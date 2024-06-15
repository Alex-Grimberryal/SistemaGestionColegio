<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        @session('status')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ $value }}
            </div>
        @endsession

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre" required autofocus>
            </div>

            <div>
                <label for="contrasena">Contraseña:</label>
                <input type="password" name="contrasena" id="contrasena" required>
            </div>

            <div>
                <button type="submit">Iniciar sesión</button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
