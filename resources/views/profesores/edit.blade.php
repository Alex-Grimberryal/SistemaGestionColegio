<x-head></x-head>
<x-sidebar></x-sidebar>
<div class="container" style="margin-top: 8%">
    <main>
        <div class="content">
            <form action="{{ route('profesores.update', $profesor->idprofesor) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="profesor">Nombre del Profesor:</label>
                    <input type="text" name="profesor" class="form-control" value="{{ $profesor->profesor }}" required>
                </div>
                <div class="form-group">
                    <label for="area">Area:</label>
                    <select name="area" class="form-control" required>
                        <option value="">Seleccionar Area:</option>
                        <option value="Docente de Primaria"
                            {{ $profesor->area == 'Docente de Primaria' ? 'selected' : '' }}>Docente de Primaria
                        </option>
                        <option value="Arte y cultura" {{ $profesor->area == 'Arte y cultura' ? 'selected' : '' }}>Arte
                            y cultura</option>
                        <option value="Ciencia y tecnologia"
                            {{ $profesor->area == 'Ciencia y tecnologia' ? 'selected' : '' }}>Ciencia y tecnologia
                        </option>
                        <option value="Ciencias sociales"
                            {{ $profesor->area == 'Ciencias sociales' ? 'selected' : '' }}>Ciencias sociales</option>
                        <option value="Comunicacion" {{ $profesor->area == 'Comunicacion' ? 'selected' : '' }}>
                            Comunicacion</option>
                        <option value="Computacion" {{ $profesor->area == 'Computacion' ? 'selected' : '' }}>Computacion
                        </option>
                        <option value="Desarrollo personal ciudadano y civica"
                            {{ $profesor->area == 'Desarrollo personal ciudadano y civica' ? 'selected' : '' }}>
                            Desarrollo personal ciudadano y civica</option>
                        <option value="Educacion fisica" {{ $profesor->area == 'Educacion fisica' ? 'selected' : '' }}>
                            Educacion fisica</option>
                        <option value="Educacion para el trabajo"
                            {{ $profesor->area == 'Educacion para el trabajo' ? 'selected' : '' }}>Educacion para el
                            trabajo</option>
                        <option value="Ingles" {{ $profesor->area == 'Ingles' ? 'selected' : '' }}>Ingles</option>
                        <option value="Matematica" {{ $profesor->area == 'Matematica' ? 'selected' : '' }}>Matematica
                        </option>
                        <option value="Religion" {{ $profesor->area == 'Religion' ? 'selected' : '' }}>Religion
                        </option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="estado">Estado:</label>
                    <select name="estado" class="form-control" required>
                        <option value="">Seleccionar estado</option>
                        <option value="0" {{ $profesor->estado == '0' ? 'selected' : '' }}>Habilitado</option>
                        <option value="1" {{ $profesor->estado == '1' ? 'selected' : '' }}>Deshabilitado</option>
                        <!-- Agrega más opciones según sea necesario -->
                    </select>
                </div>
                <button type="submit" class="btn btn-primary mt-4">Guardar Profesor</button>
            </form>
        </div>
    </main>
</div>
<x-footer></x-footer>
