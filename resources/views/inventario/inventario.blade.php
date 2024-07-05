<x-head></x-head>
<x-sidebar></x-sidebar>
<div class="container-fluid col-10" style="margin-top: 10%;">
    <div class="row">
        <div class="col-9">
            <div class="chart-container embed-responsive embed-responsive-4by3">
                <canvas id="Chart"></canvas>
            </div>
        </div>
        <div class="col-3">
            <div class="card text-bg-success mb-3" style="max-width: 18rem;">
                <div class="card-header">Articulos en Uso</div>
                <div class="card-body">
                    <h6 class="card-title">Hay {{ $articulos->sumStockEnUso}} articulos actualmente en Uso</h6>

                </div>
                <div class="card-footer text-center">
                    𒊹
                </div>
            </div>
            <div class="card text-bg-warning mb-3" style="max-width: 18rem;">
                <div class="card-header">Articulos en Almacen</div>
                <div class="card-body">
                    <h6 class="card-title">Hay {{ $articulos->sumStockAlmacenado }} articulos almacenados</h6>
                </div>
                <div class="card-footer text-center">
                    𒊹
                </div>
            </div>
            <div class="card text-bg-danger mb-3" style="max-width: 18rem;">
                <div class="card-header">Articulos Dañados</div>
                <div class="card-body">
                    <h6 class="card-title">Hay {{ $articulos->sumStockDanado }} articulos dañados</h6>
                </div>
                <div class="card-footer text-center">
                    𒊹
                </div>
            </div>
        </div>
    </div>
</div>
<x-footer></x-footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.umd.min.js"></script>

<script>
    var categorias = {!! json_encode($articulosPorCategoria->pluck('categoria')) !!};
    var sumStockEnUso = {!! json_encode($articulosPorCategoria->pluck('sumStockEnUso')) !!};
    var sumStockAlmacenado = {!! json_encode($articulosPorCategoria->pluck('sumStockAlmacenado')) !!};
    var sumStockDanado = {!! json_encode($articulosPorCategoria->pluck('sumStockDanado')) !!};

    // Obtén el elemento del lienzo del gráfico
    var ctx = document.getElementById('Chart').getContext('2d');

    // Crea el gráfico de barras
    var chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: categorias,
            datasets: [
                {
                    label: 'Artículos en uso',
                    data: sumStockEnUso,
                    backgroundColor: 'rgb(88, 214, 141)'
                },
                {
                    label: 'Artículos en almacenamiento',
                    data: sumStockAlmacenado,
                    backgroundColor: 'rgb(244, 208, 63)'
                },
                {
                    label: 'Artículos dañados',
                    data: sumStockDanado,
                    backgroundColor: 'rgb(236, 112, 99)'
                }
            ]
        },
        options: {
            scales: {
                x: {
                    stacked: true
                },
                y: {
                    stacked: true
                }
            }
        }
    });
</script>
