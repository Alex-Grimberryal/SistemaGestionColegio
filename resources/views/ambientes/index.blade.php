<x-head></x-head>
<x-sidebar></x-sidebar>
<div class="container" style="margin-top: 8%">
    <main>
        <div class="content">
            <div class="row">
                <div class="col-md-2">
                    <H1>Ambiente</H1>
                </div>
                <div class="col-md-10 text-right">
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('ambientes.create') }}" class="btn btn-outline-primary">Añadir</a>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID Ambiente</th>
                                <th>Ambiente</th>
                                <th>Pabellón</th>
                                <th>Piso</th>
                                <th>Fecha de Creación</th>
                                <th>Fecha de Actualización</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ambientes as $ambiente)
                                <tr>
                                    <td>{{ $ambiente->idambiente }}</td>
                                    <td>{{ $ambiente->ambiente }}</td>
                                    <td>{{ $ambiente->pabellon }}</td>
                                    <td>{{ $ambiente->piso }}</td>
                                    <td>{{ $ambiente->created_at }}</td>
                                    <td>{{ $ambiente->updated_at }}</td>
                                    <td>
                                        @if($ambiente->estado == 0)
                                            <span style="color: green;">Habilitado</span>
                                        @elseif($ambiente->estado == 1)
                                            <span style="color: red;">Deshabilitado</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="col-4">
                                            <a href="{{ route('ambientes.edit', ['ambiente' => $ambiente->idambiente]) }}"
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
