<x-head></x-head>
<x-sidebar></x-sidebar>
<div class="container" style="margin-top: 8%">
    <main>
        <div class="content">
            <form action="{{ route('ambientes.update', $ambiente->idambiente) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="ambiente">Nombre del Ambiente:</label>
                    <input type="text" name="ambiente" class="form-control" value="{{ $ambiente->ambiente }}" required>
                </div>
                <div class="form-group">
                    <label for="pabellon">Pabellón:</label>
                    <select name="pabellon" class="form-control" required>
                        <option value="">Seleccionar pabellón</option>
                        <option value="Pabellón A" {{ $ambiente->pabellon == 'Pabellón A' ? 'selected' : '' }}>Pabellón
                            A</option>
                        <option value="Pabellón B" {{ $ambiente->pabellon == 'Pabellón B' ? 'selected' : '' }}>Pabellón
                            B</option>
                        <option value="Pabellón C" {{ $ambiente->pabellon == 'Pabellón C' ? 'selected' : '' }}>Pabellón
                            C</option>
                        <option value="Pabellón D" {{ $ambiente->pabellon == 'Pabellón D' ? 'selected' : '' }}>Pabellón
                            D</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="piso">Piso:</label>
                    <select name="piso" class="form-control" required>
                        <option value="">Seleccionar piso</option>
                        <option value="Piso 1" {{ $ambiente->piso == 'Piso 1' ? 'selected' : '' }}>Piso 1</option>
                        <option value="Piso 2" {{ $ambiente->piso == 'Piso 2' ? 'selected' : '' }}>Piso 2</option>
                        <option value="Piso 3" {{ $ambiente->piso == 'Piso 3' ? 'selected' : '' }}>Piso 3</option>
                        <!-- Agrega más opciones según sea necesario -->
                    </select>
                </div>

                <div class="form-group">
                    <label for="estado">Estado:</label>
                    <select name="estado" class="form-control" required>
                        <option value="">Seleccionar estado</option>
                        <option value="0" {{ $ambiente->estado == '0' ? 'selected' : '' }}>Habilitado</option>
                        <option value="1" {{ $ambiente->estado == '1' ? 'selected' : '' }}>Deshabilitado</option>
                        <!-- Agrega más opciones según sea necesario -->
                    </select>
                </div>
                <button type="submit" class="btn btn-primary mt-4">Guardar Ambiente</button>
            </form>
        </div>
    </main>
</div>
<x-footer></x-footer>
