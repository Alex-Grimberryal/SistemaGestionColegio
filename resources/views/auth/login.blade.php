<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>
        @session('status')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ $value }}
            </div>
        @endsession

        <form method="POST" action="{{ route('login.post') }}">
            @csrf
            <div class="container">
                <div class="row">
                    <div class="col-4">
                        <label for="nombre">Nombre:</label>
                    </div>
                    <div class="col-8">
                        <div class="d-flex justify-content-end">
                            <input class="form-control" type="text" name="nombre" id="nombre" required autofocus>
                        </div>
                    </div>
                </div>

                <div class="row pt-3">
                    <div class="col-4">
                        <label for="contrasena">Contraseña:</label>
                    </div>
                    <div class="col-8">
                        <div class="d-flex justify-content-end">
                            <input class="form-control" type="password" name="password" id="contrasena" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 text-center pt-3">
                        <button class="btn btn-info w-100" type="submit">Iniciar sesión</button>
                    </div>
                </div>
            </div>

        </form>
    </x-authentication-card>
</x-guest-layout>
