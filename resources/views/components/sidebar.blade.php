<nav class="navbar navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('welcome') }}">
            <h1>Sistema de Gestion de Recursos</h1>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar"
            aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar"
            aria-labelledby="offcanvasDarkNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Sistema de Gestion de Recursos</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">

                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('welcome') }}">Inicio</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Reservaciones
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark">
                            <li><a class="dropdown-item" href="{{ route('reservaciones') }}">Ver reservaciones</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="{{ route('profesores.index') }}">Profesores</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Inventario
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark">
                            <li><a class="dropdown-item" href="{{ route('inventario') }}">Inventario general</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="{{ route('articulos.index') }}">Articulos</a></li>
                            <li><a class="dropdown-item" href="{{ route('ambientes.index') }}">Ambientes</a></li>
                            <li><a class="dropdown-item" href="{{ route('Mar-Cat.index') }}">Marcas y Categorias</a>
                            </li>
                            <li><a class="dropdown-item" href="{{ route('usuarios.index') }}">Usuarios</a></li>
                            <li><a class="dropdown-item" href="{{ route('reportes') }}">Reportes</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="nav-link" id="contactButton">Contacto</button>
                    </li>

                    <script>
                        document.getElementById("contactButton").addEventListener("click", function() {
                            // Cerrar el menú desplegable
                            var offcanvasElement = document.getElementById("offcanvasDarkNavbar");
                            var offcanvas = new bootstrap.Offcanvas(offcanvasElement);
                            offcanvas.hide();

                            // Abrir el modal
                            var modalElement = document.getElementById("contactModal");
                            var modal = new bootstrap.Modal(modalElement);
                            modal.show();
                        });
                    </script>


                </ul>
            </div>
            <div class="w-100 sticky-bottom mx-3 my-3">
                <a href="{{ route('logout') }}" class="btn btn-warning btn-lg" style="width: 93%;">Cerrar
                    Sesión</a>
            </div>
        </div>
    </div>
</nav>

<!-- Modal de contacto -->
<div class="modal fade" id="contactModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 999999;" data-bs-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Contacto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h3 class="modal-title">Desarrolladores</h3>
                <div class="d-flex">
                    <div class="justify-content-between">
                        <div class="row">
                            <div class="col-1">
                                𒊹
                            </div>
                            <div class="col-7">
                                Junior Alexis Serrato Barrios
                            </div>
                            <div class="col-4 text-end">
                                <a class="link-dark link-offset-2 link-underline link-underline-opacity-0" href="mailto:1342882@senati.pe">1342882@senati.pe</a>
                            </div>
                            <div class="col-1">
                                𒊹
                            </div>
                            <div class="col-7">
                                Brayan Guadalupe Farro Cachay
                            </div>
                            <div class="col-4 text-end">
                                <a class="link-dark link-offset-2 link-underline link-underline-opacity-0" href="mailto:1301335@senati.pe">1301335@senati.pe</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
