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
                        <h5 class="card-title">Hay {{ $articulos->sumStockEnUso + $articulos->sumStockAlmacenado + $articulos->sumStockDanado }} articulos en inventario</h5>
                        <p class="card-text">Ver mas</p>
                    </div>
                </div>
                <div class="card text-bg-warning mb-3" style="max-width: 18rem;">
                    <div class="card-header">Articulos sin usar</div>
                    <div class="card-body">
                        <h5 class="card-title">Hay {{ $articulos->sumStockAlmacenado }} articulos almacenados</h5>
                        <p class="card-text">Ver mas</p>
                    </div>
                </div>
                <div class="card text-bg-secondary mb-3" style="max-width: 18rem;">
                    <div class="card-header">Usuarios</div>
                    <div class="card-body">
                        <h5 class="card-title">Hay {{ $usuarios->admin + $usuarios->oper  }} usuarios activos</h5>
                        <p class="card-text">Ver mas</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-9 d-flex">
            <div class="chart-container embed-responsive embed-responsive-4by3">
                <canvas id="pieChart"></canvas>
            </div>
            <div class="chart-container embed-responsive embed-responsive-4by3">
                <canvas id="pieChartU"></canvas>
            </div>
        </div>
        <style>
            .chart-container {
                position: relative;
                width: 50%;
                height: 100%;
            }

            .chart-container canvas {
                position: absolute;
                top: 0;
                left: 0;
                width: 100% !important;
                height: 100% !important;
            }
        </style>
    </div>
</div>
<x-footer></x-footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.umd.min.js"></script>
<script>
    var labels = ["En uso","En almacen","Dañados"];
    var data = [
        {{ $articulos->sumStockEnUso ?? 0 }},
        {{ $articulos->sumStockAlmacenado ?? 0 }},
        {{ $articulos->sumStockDanado ?? 0 }}
    ];
    var backgroundColor =  ['rgb(88, 214, 141)', 'rgb(244, 208, 63)', 'rgb(236, 112, 99)'];

    var ctx = document.getElementById('pieChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: labels,
            datasets: [{
                data: data,
                backgroundColor: backgroundColor
            }]
        }
    });
</script>
<script>
    var labels = ["Administradores","Operarios"];
    var data = [
        {{ $usuarios->admin ?? 0 }},
        {{ $usuarios->oper ?? 0 }},
    ];
    var backgroundColor =  ['rgb(93, 173, 226)', 'rgb(153, 163, 164)'];

    var ctx = document.getElementById('pieChartU').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: labels,
            datasets: [{
                data: data,
                backgroundColor: backgroundColor
            }]
        }
    });
</script>
