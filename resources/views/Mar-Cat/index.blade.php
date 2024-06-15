<x-head></x-head>
<x-sidebar></x-sidebar>
<div class="container" style="margin-top: 8%">
    <main>
        <div class="row">
            <div class="col-md-12">
                <div class="content" style="height: 40vh;">
                    <div class="row">
                        <div class="col-md-2">
                            <H1>Categorias</H1>
                        </div>
                        <div class="col-md-10 text-right">
                            <div class="d-flex justify-content-end">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#categoriaModal">
                                    Añadir
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="categoriaModal" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Crear nueva
                                                    categoria</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('Mar-Cat.categoria.store') }}" method="POST">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="categoria">Nombre de la categoria:</label>
                                                        <input type="text" name="categoria" class="form-control"
                                                            required>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary mt-4">Guardar
                                                        Categoria</button>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Cerrar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-12">
                            <div class="overflow-auto" style="height: 28vh;">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>ID Categoria</th>
                                            <th>Categoria</th>
                                            <th>Fecha de Creación</th>
                                            <th>Fecha de Actualización</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categorias as $categoria)
                                            <tr>
                                                <td>{{ $categoria->idcategoria }}</td>
                                                <td>{{ $categoria->categoria }}</td>
                                                <td>{{ $categoria->created_at }}</td>
                                                <td>{{ $categoria->updated_at }}</td>
                                                <td>
                                                    <!-- Button trigger modal -->
                                                    <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                                        data-bs-target="#categoriaEditModal{{ $categoria->idcategoria }}">
                                                        Editar
                                                    </button>

                                                    <!-- Modal -->
                                                    <div class="modal fade"
                                                        id="categoriaEditModal{{ $categoria->idcategoria }}"
                                                        data-bs-backdrop="static" data-bs-keyboard="false"
                                                        tabindex="-1" aria-labelledby="staticBackdropLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h1 class="modal-title fs-5"
                                                                        id="staticBackdropLabel">
                                                                        Editar Categoria</h1>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form
                                                                        action="{{ route('Mar-Cat.categoria.update', $categoria->idcategoria) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <div class="form-group">
                                                                            <label for="categoria">Nombre de la
                                                                                categoria:</label>
                                                                            <input type="text" name="categoria"
                                                                                class="form-control"
                                                                                value="{{ $categoria->categoria }}"
                                                                                required>
                                                                        </div>
                                                                        <button type="submit"
                                                                            class="btn btn-primary mt-4">Guardar
                                                                            Categoria</button>
                                                                    </form>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Cerrar</button>
                                                                </div>
                                                            </div>
                                                        </div>
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
                </div>
            </div>
            <div class="col-md-12">
                <div class="content" style="height: 40vh;">
                    <div class="row">
                        <div class="col-md-2">
                            <H1>Marcas</H1>
                        </div>
                        <div class="col-md-10 text-right">
                            <div class="d-flex justify-content-end">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#marcaModal">
                                    Añadir
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="marcaModal" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Crear nueva
                                                    marca</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('Mar-Cat.marca.store') }}" method="POST">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="marca">Nombre de la marca:</label>
                                                        <input type="text" name="marca" class="form-control"
                                                            required>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary mt-4">Guardar
                                                        Marca</button>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Cerrar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-12">
                            <div class="overflow-auto" style="height: 28vh;">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>ID Marca</th>
                                            <th>Marca</th>
                                            <th>Fecha de Creación</th>
                                            <th>Fecha de Actualización</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($marcas as $marca)
                                            <tr>
                                                <td>{{ $marca->idmarca }}</td>
                                                <td>{{ $marca->marca }}</td>
                                                <td>{{ $marca->created_at }}</td>
                                                <td>{{ $marca->updated_at }}</td>
                                                <td>
                                                    <!-- Button trigger modal -->
                                                    <button type="button" class="btn btn-info"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#marcaEditModal{{ $marca->idmarca }}">
                                                        Editar
                                                    </button>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="marcaEditModal{{ $marca->idmarca }}"
                                                        data-bs-backdrop="static" data-bs-keyboard="false"
                                                        tabindex="-1" aria-labelledby="staticBackdropLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h1 class="modal-title fs-5"
                                                                        id="staticBackdropLabel">
                                                                        Editar Marca</h1>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form
                                                                        action="{{ route('Mar-Cat.marca.update', $marca->idmarca) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <div class="form-group">
                                                                            <label for="marca">Nombre de la
                                                                                categoria:</label>
                                                                            <input type="text" name="marca"
                                                                                class="form-control"
                                                                                value="{{ $marca->marca }}" required>
                                                                        </div>
                                                                        <button type="submit"
                                                                            class="btn btn-primary mt-4">Guardar
                                                                            Marca</button>
                                                                    </form>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Cerrar</button>
                                                                </div>
                                                            </div>
                                                        </div>
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
                </div>
            </div>
        </div>
    </main>
</div>

<x-footer></x-footer>
