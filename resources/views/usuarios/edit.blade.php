<x-head></x-head>
<x-sidebar></x-sidebar>
<div class="container" style="margin-top: 8%">
    <main>
        <div class="content">
            <form action="{{ route('usuarios.update', $usuario->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nombre">Nombre del Usuario:</label>
                    <input type="text" name="nombre" class="form-control" value="{{ $usuario->nombre }}" required>
                </div>
                <div class="form-group">
                    <label for="contrasena">Contraseña:</label>
                    <input type="text" name="contrasena" class="form-control" value="{{ Crypt::decryptString($usuario->recuperacion)  }}" required>
                </div>
                <div class="form-group">
                    <label for="rol">Rol:</label>
                    <select name="rol" class="form-control" required>
                        <option value="">Seleccionar estado</option>
                        <option value="Operario" @if($usuario->rol === 'Operario') selected @endif>Operario</option>
                        <option value="Administrador" @if($usuario->rol === 'Administrador') selected @endif>Administrador</option>
                        <!-- Agrega más opciones según sea necesario -->
                    </select>
                </div>
                <button type="submit" class="btn btn-primary mt-4">Guardar Usuario</button>
            </form>
        </div>
    </main>
</div>
<x-footer></x-footer>
