<x-head></x-head>

<x-sidebar></x-sidebar>
<div class="container" style="margin-top: 8%">
    <main>
        <div class="content">
            <form action="{{ route('articulos.update', $articulo->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="articulo">Nombre del Articulo:</label>
                    <input type="text" name="articulo" class="form-control" value="{{ $articulo->articulo }}" required>
                </div>
                <div class="form-group">
                    <label for="nroserie">Numero de serie:</label>
                    <input type="text" name="nroserie" class="form-control" value="{{ $articulo->nroserie }}" required>
                </div>
                <div class="form-group">
                    <label for="categorias_idcategoria">Categoria:</label>
                    <select name="categorias_idcategoria" class="form-control" required>
                        <option value="">Seleccionar Categoria</option>
                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->idcategoria }}" {{ $categoria->idcategoria == $articulo->categorias_idcategoria ? 'selected' : '' }}>{{ $categoria->categoria }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="marcas_idmarca">Marca</label>
                    <select name="marcas_idmarca" class="form-control" required>
                        <option value="">Seleccionar Marca</option>
                        @foreach ($marcas as $marca)
                            <option value="{{ $marca->idmarca }}" {{ $marca->idmarca == $articulo->marcas_idmarca ? 'selected' : '' }}>{{ $marca->marca }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="ambientes_idambiente">Ubicacion</label>
                    <select name="ambientes_idambiente" class="form-control" required>
                        <option value="">Seleccionar Ubicacion</option>
                        @foreach ($ambientes as $ambiente)
                        <option value="{{ $ambiente->idambiente }}" {{ $ambiente->idambiente == $articulo->ambientes_idambiente ? 'selected' : '' }}>{{ $ambiente->ambiente }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="fechaadq">Fecha de adquisición:</label>
                    <input type="date" class="form-control" id="fechaadq" name="fechaadq"  value="{{ $articulo->fechaadq }}" required/>
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

                    // Establecer el valor por defecto en el campo de fecha si no hay un valor actual
                    document.getElementById('fechaadq').value = document.getElementById('fechaadq').value || formattedDate;
                </script>
                <div class="form-group">
                    <label>Stock:</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text text-success" for="Stock_en_uso">En uso</span>
                        <input type="number" name="Stock_en_uso" aria-label="Stock en uso" class="form-control" value="{{ $articulo->Stock_en_uso }}" required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text text-warning" for="Stock_almacenado">En Almacen</span>
                        <input type="number" name="Stock_almacenado" aria-label="Stock en almacén" class="form-control" value="{{ $articulo->Stock_almacenado }}" required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text text-danger" for="stock_dañado">Dañado</span>
                        <input type="number" name="stock_dañado" aria-label="Stock dañado" class="form-control" value="{{ $articulo->stock_dañado }}" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-4">Guardar Articulo</button>
            </form>
        </div>
    </main>
</div>
<x-footer></x-footer>
