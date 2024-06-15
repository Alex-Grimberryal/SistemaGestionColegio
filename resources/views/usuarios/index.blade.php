<x-head></x-head>
<x-sidebar></x-sidebar>
<div class="container" style="margin-top: 8%">
    <main>
        <div class="content">
            <div class="row">
                <div class="col-md-2">
                    <H1>Usuarios</H1>
                </div>
                <div class="col-md-10 text-right">
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('usuarios.create') }}" class="btn btn-outline-primary">Añadir</a>
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
                                    <td>{{ $usuario->contrasena }}</td>
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
                            @endforeach
                            <!-- Puedes agregar más filas aquí con los datos correspondientes -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</div>

<x-footer></x-footer>
