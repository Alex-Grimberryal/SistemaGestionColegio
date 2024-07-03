<x-head></x-head>
<x-sidebar></x-sidebar>
<div class="container" style="margin-top: 8%">
    <main>
        <div class="content">
            <form action="{{ route('profesores.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="profesor">Nombre del Profesor:</label>
                    <input type="text" name="profesor" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="area">Area:</label>
                    <select name="area" class="form-control" required>
                        <option value="">Seleccionar Area:</option>
                        <option value="Docente de Primaria">Docente de Primaria</option>
                        <option value="Arte y cultura">Arte y cultura</option>
                        <option value="Ciencia y tecnologia">Ciencia y tecnologia</option>
                        <option value="Ciencias sociales">Ciencias sociales</option>
                        <option value="Comunicacion">Comunicacion</option>
                        <option value="Computacion">Computacion</option>
                        <option value="Desarrollo personal ciudadano y civica">Desarrollo personal ciudadano y civica</option>
                        <option value="Educacion fisica">Educacion fisica</option>
                        <option value="Educacion para el trabajo">Educacion para el trabajo</option>
                        <option value="Ingles">Ingles</option>
                        <option value="Matematica">Matematica</option>
                        <option value="Religion">Religion</option>
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
                <button type="submit" class="btn btn-primary mt-4">Guardar Profesor</button>
            </form>
        </div>
    </main>
</div>
<x-footer></x-footer>
