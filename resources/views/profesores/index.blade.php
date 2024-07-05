<x-head></x-head>
<x-sidebar></x-sidebar>
<div class="container" style="margin-top: 8%">
    <main>
        <div class="content">
            <div class="row">
                <div class="col-md-2">
                    <H1>Profesores</H1>
                </div>
                <div class="col-md-10 text-right">
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('profesores.create') }}" class="btn btn-primary">Añadir</a>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Area</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($profesores as $profesor)
                                <tr>
                                    <td>{{ $profesor->idprofesor }}</td>
                                    <td>{{ $profesor->profesor }}</td>
                                    <td>{{ $profesor->area }}</td>
                                    <td>
                                        @if($profesor->estado == 0)
                                            <span style="color: green;">Habilitado</span>
                                        @elseif($profesor->estado == 1)
                                            <span style="color: red;">Deshabilitado</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="col-4">
                                            <a href="{{ route('profesores.edit', ['id' => $profesor->idprofesor]) }}"
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
            {{ $profesores->links('pagination::bootstrap-4') }}
        </div>
    </main>
</div>

<x-footer></x-footer>
