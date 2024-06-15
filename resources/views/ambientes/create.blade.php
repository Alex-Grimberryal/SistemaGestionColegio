<x-head></x-head>
<x-sidebar></x-sidebar>
<div class="container" style="margin-top: 8%">
    <main>
        <div class="content">
            <form action="{{ route('ambientes.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="ambiente">Nombre del Ambiente:</label>
                    <input type="text" name="ambiente" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="pabellon">Pabellón:</label>
                    <select name="pabellon" class="form-control" required>
                        <option value="">Seleccionar pabellón</option>
                        <option value="Pabellón A">Pabellón A</option>
                        <option value="Pabellón B">Pabellón B</option>
                        <option value="Pabellón C">Pabellón C</option>
                        <option value="Pabellón D">Pabellón D</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="piso">Piso:</label>
                    <select name="piso" class="form-control" required>
                        <option value="">Seleccionar piso</option>
                        <option value="Piso 1">Piso 1</option>
                        <option value="Piso 2">Piso 2</option>
                        <option value="Piso 3">Piso 3</option>
                        <!-- Agrega más opciones según sea necesario -->
                    </select>
                </div>
                <div class="form-group">
                    <label for="estado">Estado:</label>
                    <select name="estado" class="form-control" required>
                        <option value="">Seleccionar estado</option>
                        <option value="0">Habilitado</option>
                        <option value="1">Deshabilitado</option>
                        <!-- Agrega más opciones según sea necesario -->
                    </select>
                </div>
                <button type="submit" class="btn btn-primary mt-4">Guardar Ambiente</button>
            </form>
        </div>
    </main>
</div>
<x-footer></x-footer>
