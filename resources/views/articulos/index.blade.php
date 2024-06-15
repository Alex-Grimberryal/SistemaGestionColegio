<x-head></x-head>
<x-sidebar></x-sidebar>
<div class="container" style="margin-top: 8%">
    <main>
        <div class="content">
            <div class="row">
                <div class="col-md-2">
                    <H1>Articulo</H1>
                </div>
                <div class="col-md-10 text-right">
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('articulos.create') }}" class="btn btn-outline-primary">Añadir</a>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID Articulo</th>
                                <th>Nro de Serie</th>
                                <th>Articulo</th>
                                <th>Categoria</th>
                                <th>Marca</th>
                                <th>Ubicacion</th>
                                <th>Fecha de Adquisicion</th>
                                <th>Fecha de Creación</th>
                                <th>Fecha de Actualización</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($articulos as $articulo)
                                <tr>
                                    <td>{{ $articulo->id }}</td>
                                    <td>{{ $articulo->nroserie }}</td>
                                    <td>{{ $articulo->articulo }}</td>
                                    <td>{{ $articulo->categoria->categoria }}</td>
                                    <td>{{ $articulo->marca->marca }}</td>
                                    <td>{{ $articulo->ambiente->ambiente }}</td>
                                    <td>{{ $articulo->fechaadq }}</td>
                                    <td>{{ $articulo->created_at }}</td>
                                    <td>{{ $articulo->updated_at }}</td>
                                    <td>
                                        @if($articulo->estado == 0)
                                            <span style="color: green;">En Uso</span>
                                        @elseif($articulo->estado == 1)
                                            <span style="color: red;">Descompuesto</span>
                                        @elseif($articulo->estado == 2)
                                            <span style="color: yellow;">En Almacén</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="col-4">
                                            <a href="{{ route('articulos.edit', ['articulo' => $articulo->id]) }}"
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
