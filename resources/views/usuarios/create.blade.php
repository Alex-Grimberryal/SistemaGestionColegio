<x-head></x-head>
<x-sidebar></x-sidebar>
<div class="container" style="margin-top: 8%">
    <main>
        <div class="content">
            <form action="{{ route('usuarios.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nombre">Nombre del Usuario:</label>
                    <input type="text" name="nombre" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="contrasena">Contraseña:</label>
                    <input type="text" name="contrasena" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="rol">Rol:</label>
                    <select name="rol" class="form-control" required>
                        <option value="">Seleccionar estado</option>
                        <option value="Operario">Operario</option>
                        <option value="Administrador">Administrador</option>
                        <!-- Agrega más opciones según sea necesario -->
                    </select>
                </div>
                <button type="submit" class="btn btn-primary mt-4">Guardar Usuario</button>
            </form>
        </div>
    </main>
</div>
<x-footer></x-footer>
