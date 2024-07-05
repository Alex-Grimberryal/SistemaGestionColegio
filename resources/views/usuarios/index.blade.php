<x-head></x-head>
<x-sidebar></x-sidebar>
<div class="container" style="margin-top: 8%">
    <main>
        @if ( session('rol')  === 'Administrador')
            <div class="content">
                <div class="row">
                    <div class="col-md-2">
                        <H1>Usuarios</H1>
                    </div>
                    <div class="col-md-10 text-right">
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('usuarios.create') }}" class="btn btn-primary">Añadir</a>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID Usuario</th>
                                    <th>Nombre</th>
                                    <th>Contraseña</th>
                                    <th>Rol</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($usuarios as $usuario)
                                    <tr>
                                        <td>{{ $usuario->id }}</td>
                                        <td>{{ $usuario->nombre }}</td>
                                        <td>
                                            <div  class="d-flex justify-content-between align-items-end">
                                                <span>
                                                    @if ($usuario->activo)
                                                        <span id="password{{ $usuario->id }}" style="display: none;">************</span>
                                                        <span id="plainPassword{{ $usuario->id }}">{{ Crypt::decryptString($usuario->recuperacion) }}</span>
                                                    @else
                                                        <span id="password{{ $usuario->id }}">************</span>
                                                        <span id="plainPassword{{ $usuario->id }}" style="display: none;">{{ Crypt::decryptString($usuario->recuperacion) }}</span>
                                                    @endif
                                                </span>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="togglePassword{{ $usuario->id }}">

                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            @if($usuario->rol == "Operario")
                                                <span style="color: green;">Operario</span>
                                            @elseif($usuario->rol == "Administrador")
                                                <span style="color: darkblue;">Administrador</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="col-4">
                                                <a href="{{ route('usuarios.edit', ['id' => $usuario->id]) }}"
                                                    class="btn btn-sm btn-info">Editar</a>
                                            </div>
                                        </td>
                                    </tr>

                                    <script>
                                        // JavaScript para controlar el evento de cambio del checkbox y actualizar la visibilidad de la contraseña en tiempo real
                                        var togglePassword{{ $usuario->id }} = document.getElementById('togglePassword{{ $usuario->id }}');
                                        var password{{ $usuario->id }} = document.getElementById('password{{ $usuario->id }}');
                                        var plainPassword{{ $usuario->id }} = document.getElementById('plainPassword{{ $usuario->id }}');

                                        togglePassword{{ $usuario->id }}.addEventListener('change', function() {
                                            if (togglePassword{{ $usuario->id }}.checked) {
                                                password{{ $usuario->id }}.style.display = 'none';
                                                plainPassword{{ $usuario->id }}.style.display = 'inline';
                                            } else {
                                                password{{ $usuario->id }}.style.display = 'inline';
                                                plainPassword{{ $usuario->id }}.style.display = 'none';
                                            }
                                        });
                                    </script>
                                @endforeach
                                <!-- Puedes agregar más filas aquí con los datos correspondientes -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @else
        <div class="content">
            <div class="row">
                <div class="col-md-12">
                    <h3>No estás autorizado para abrir este módulo.</h3>
                </div>
            </div>
        </div>
        @endif
    </main>
</div>

<x-footer></x-footer>
