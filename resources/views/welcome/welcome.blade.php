<x-head></x-head>
<x-sidebar></x-sidebar>
<div class="container-fluid col-10" style="margin-top: 7%;">
    <div class="row">
        <div class="col-5">
            <div class="container-fluid">
                <div class="top-section text-center">
                    <div class="align-items-center col-12">
                        <h1>Bienvenido {{ session('nombre') }}</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-success">
            <hr>
        </div>
        <div class="col-3">
            <div class="bottom-section">
                <div class="card text-bg-success mb-3" style="max-width: 18rem;">
                    <div class="card-header">Articulos registrados</div>
                    <div class="card-body">
                        <h5 class="card-title">Hay *** articulos en inventario</h5>
                        <p class="card-text">Ver mas</p>
                    </div>
                </div>
                <div class="card text-bg-warning mb-3" style="max-width: 18rem;">
                    <div class="card-header">Articulos sin usar</div>
                    <div class="card-body">
                        <h5 class="card-title">Hay *** articulos en almacen</h5>
                        <p class="card-text">Ver mas</p>
                    </div>
                </div>
                <div class="card text-bg-secondary mb-3" style="max-width: 18rem;">
                    <div class="card-header">Usuarios</div>
                    <div class="card-body">
                        <h5 class="card-title">Hay ** usuarios activos</h5>
                        <p class="card-text">Ver mas</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-9">

        </div>
    </div>
</div>
<x-footer></x-footer>
