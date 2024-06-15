<x-head></x-head>

<x-sidebar></x-sidebar>
<div class="container" style="margin-top: 8%">
    <main>
        <div class="content">
            <form action="{{ route('articulos.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="articulo">Nombre del Articulo:</label>
                    <input type="text" name="articulo" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="nroserie">Numero de serie:</label>
                    <input type="text" name="nroserie" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="categorias_idcategoria">Categoria:</label>
                    <select name="categorias_idcategoria" class="form-control" required>
                        <option value="">Seleccionar Categoria</option>
                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->idcategoria }}">{{ $categoria->categoria }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="marcas_idmarca">Marca</label>
                    <select name="marcas_idmarca" class="form-control" required>
                        <option value="">Seleccionar Marca</option>
                        @foreach ($marcas as $marca)
                            <option value="{{ $marca->idmarca }}">{{ $marca->marca }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="ambientes_idambiente">Ubicacion</label>
                    <select name="ambientes_idambiente" class="form-control" required>
                        <option value="">Seleccionar Ubicacion</option>
                        @foreach ($ambientes as $ambiente)
                            <option value="{{ $ambiente->idambiente }}">{{ $ambiente->ambiente }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="fechaadq">Fecha de adquisición:</label>
                    <input type="date" class="form-control" id="fechaadq" name="fechaadq" />
                </div>

                <script>
                    // Obtener la fecha actual
                    var currentDate = new Date();

                    // Obtener los componentes de la fecha
                    var year = currentDate.getFullYear();
                    var month = (currentDate.getMonth() + 1).toString().padStart(2, '0');
                    var day = currentDate.getDate().toString().padStart(2, '0');

                    // Crear la cadena de fecha en formato YYYY-MM-DD
                    var formattedDate = year + '-' + month + '-' + day;

                    // Establecer el valor por defecto en el campo de fecha
                    document.getElementById('fechaadq').value = formattedDate;
                </script>

                <div class="form-group">
                    <label for="estado">Estado:</label>
                    <select name="estado" class="form-control" required>
                        <option value="">Seleccionar estado</option>
                        <option value="0">En Uso</option>
                        <option value="1">Descompuesto</option>
                        <option value="2">En Almacen</option>
                        <!-- Agrega más opciones según sea necesario -->
                    </select>
                </div>
                <button type="submit" class="btn btn-primary mt-4">Guardar Ambiente</button>
            </form>
        </div>
    </main>
</div>
<x-footer></x-footer>
