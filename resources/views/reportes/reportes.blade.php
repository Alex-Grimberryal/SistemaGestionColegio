<x-head></x-head>
<x-sidebar></x-sidebar>
<div class="container-fluid col-10" style="margin-top: 6%;">
    <div class="row">
        <div class="container">
            <h1 class="pb-2 border-bottom">Reportes</h1>
            <div class="card mb-3 text-bg-info border-none mt-3">
                <div class="row g-0">
                    <div class="col-md-4 align-items-center justify-content-center px-5 py-4 w-25">
                        <svg xmlns="http://www.w3.org/2000/svg" width="160" height="160" fill="currentColor"
                            class="bi bi-filetype-xlsx" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M14 4.5V11h-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5zM7.86 14.841a1.13 1.13 0 0 0 .401.823q.195.162.479.252.284.091.665.091.507 0 .858-.158.355-.158.54-.44a1.17 1.17 0 0 0 .187-.656q0-.336-.135-.56a1 1 0 0 0-.375-.357 2 2 0 0 0-.565-.21l-.621-.144a1 1 0 0 1-.405-.176.37.37 0 0 1-.143-.299q0-.234.184-.384.188-.152.513-.152.214 0 .37.068a.6.6 0 0 1 .245.181.56.56 0 0 1 .12.258h.75a1.1 1.1 0 0 0-.199-.566 1.2 1.2 0 0 0-.5-.41 1.8 1.8 0 0 0-.78-.152q-.44 0-.777.15-.336.149-.527.421-.19.273-.19.639 0 .302.123.524t.351.367q.229.143.54.213l.618.144q.31.073.462.193a.39.39 0 0 1 .153.326.5.5 0 0 1-.085.29.56.56 0 0 1-.255.193q-.168.07-.413.07-.176 0-.32-.04a.8.8 0 0 1-.249-.115.58.58 0 0 1-.255-.384zm-3.726-2.909h.893l-1.274 2.007 1.254 1.992h-.908l-.85-1.415h-.035l-.853 1.415H1.5l1.24-2.016-1.228-1.983h.931l.832 1.438h.036zm1.923 3.325h1.697v.674H5.266v-3.999h.791zm7.636-3.325h.893l-1.274 2.007 1.254 1.992h-.908l-.85-1.415h-.035l-.853 1.415h-.861l1.24-2.016-1.228-1.983h.931l.832 1.438h.036z" />
                        </svg>
                    </div>
                    <div class="col-md-8 w-75 h-100 ">
                        <div class="card-body">
                            <h5 class="card-title py-3">Generar Respaldo de todos los articulos</h5>
                            <p class="card-text pt-4 pb-2">Genera un archivo Excel con todos los articulos registrados
                                en el sistema.</p>
                        </div>
                        <div class="card-footer">
                            <a id="generar-reporte-btn" class="btn btn-primary w-50 px-5">Generar Reporte</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container px-4 py-2" id="featured-3">
            <h2 class="pb-2 border-bottom">
                <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;">Opciones</font>
                </font>
            </h2>
            <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
                <div class="feature col">
                    <div
                        class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-success rounded px-5 py-3 w-100 bg-gradient fs-2 mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor"
                            class="bi bi-filetype-xlsx" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M14 4.5V11h-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5zM7.86 14.841a1.13 1.13 0 0 0 .401.823q.195.162.479.252.284.091.665.091.507 0 .858-.158.355-.158.54-.44a1.17 1.17 0 0 0 .187-.656q0-.336-.135-.56a1 1 0 0 0-.375-.357 2 2 0 0 0-.565-.21l-.621-.144a1 1 0 0 1-.405-.176.37.37 0 0 1-.143-.299q0-.234.184-.384.188-.152.513-.152.214 0 .37.068a.6.6 0 0 1 .245.181.56.56 0 0 1 .12.258h.75a1.1 1.1 0 0 0-.199-.566 1.2 1.2 0 0 0-.5-.41 1.8 1.8 0 0 0-.78-.152q-.44 0-.777.15-.336.149-.527.421-.19.273-.19.639 0 .302.123.524t.351.367q.229.143.54.213l.618.144q.31.073.462.193a.39.39 0 0 1 .153.326.5.5 0 0 1-.085.29.56.56 0 0 1-.255.193q-.168.07-.413.07-.176 0-.32-.04a.8.8 0 0 1-.249-.115.58.58 0 0 1-.255-.384zm-3.726-2.909h.893l-1.274 2.007 1.254 1.992h-.908l-.85-1.415h-.035l-.853 1.415H1.5l1.24-2.016-1.228-1.983h.931l.832 1.438h.036zm1.923 3.325h1.697v.674H5.266v-3.999h.791zm7.636-3.325h.893l-1.274 2.007 1.254 1.992h-.908l-.85-1.415h-.035l-.853 1.415h-.861l1.24-2.016-1.228-1.983h.931l.832 1.438h.036z" />
                        </svg>
                    </div>
                    <h3 class="fs-2 text-body-emphasis">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Articulos en Uso</font>
                        </font>
                    </h3>
                    <p>
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Solo los articulos en uso y operacion.</font>
                        </font>
                    </p>
                    <a id="generar-reporte1-btn" class="btn btn-success w-100 px-5">Generar Reporte</a>
                </div>
                <div class="feature col">
                    <div
                        class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-warning rounded px-5 py-3 w-100 bg-gradient fs-2 mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor"
                            class="bi bi-filetype-xlsx" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M14 4.5V11h-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5zM7.86 14.841a1.13 1.13 0 0 0 .401.823q.195.162.479.252.284.091.665.091.507 0 .858-.158.355-.158.54-.44a1.17 1.17 0 0 0 .187-.656q0-.336-.135-.56a1 1 0 0 0-.375-.357 2 2 0 0 0-.565-.21l-.621-.144a1 1 0 0 1-.405-.176.37.37 0 0 1-.143-.299q0-.234.184-.384.188-.152.513-.152.214 0 .37.068a.6.6 0 0 1 .245.181.56.56 0 0 1 .12.258h.75a1.1 1.1 0 0 0-.199-.566 1.2 1.2 0 0 0-.5-.41 1.8 1.8 0 0 0-.78-.152q-.44 0-.777.15-.336.149-.527.421-.19.273-.19.639 0 .302.123.524t.351.367q.229.143.54.213l.618.144q.31.073.462.193a.39.39 0 0 1 .153.326.5.5 0 0 1-.085.29.56.56 0 0 1-.255.193q-.168.07-.413.07-.176 0-.32-.04a.8.8 0 0 1-.249-.115.58.58 0 0 1-.255-.384zm-3.726-2.909h.893l-1.274 2.007 1.254 1.992h-.908l-.85-1.415h-.035l-.853 1.415H1.5l1.24-2.016-1.228-1.983h.931l.832 1.438h.036zm1.923 3.325h1.697v.674H5.266v-3.999h.791zm7.636-3.325h.893l-1.274 2.007 1.254 1.992h-.908l-.85-1.415h-.035l-.853 1.415h-.861l1.24-2.016-1.228-1.983h.931l.832 1.438h.036z" />
                        </svg>
                    </div>
                    <h3 class="fs-2 text-body-emphasis">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Articulos en Almacen</font>
                        </font>
                    </h3>
                    <p>
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Solo los articulos almacenados pero funcionales.
                            </font>
                        </font>
                    </p>
                    <a id="generar-reporte2-btn" class="btn btn-warning w-100 px-5">Generar Reporte</a>
                </div>
                <div class="feature col">
                    <div
                        class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-danger rounded px-5 py-3 w-100 bg-gradient fs-2 mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor"
                            class="bi bi-filetype-xlsx" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M14 4.5V11h-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5zM7.86 14.841a1.13 1.13 0 0 0 .401.823q.195.162.479.252.284.091.665.091.507 0 .858-.158.355-.158.54-.44a1.17 1.17 0 0 0 .187-.656q0-.336-.135-.56a1 1 0 0 0-.375-.357 2 2 0 0 0-.565-.21l-.621-.144a1 1 0 0 1-.405-.176.37.37 0 0 1-.143-.299q0-.234.184-.384.188-.152.513-.152.214 0 .37.068a.6.6 0 0 1 .245.181.56.56 0 0 1 .12.258h.75a1.1 1.1 0 0 0-.199-.566 1.2 1.2 0 0 0-.5-.41 1.8 1.8 0 0 0-.78-.152q-.44 0-.777.15-.336.149-.527.421-.19.273-.19.639 0 .302.123.524t.351.367q.229.143.54.213l.618.144q.31.073.462.193a.39.39 0 0 1 .153.326.5.5 0 0 1-.085.29.56.56 0 0 1-.255.193q-.168.07-.413.07-.176 0-.32-.04a.8.8 0 0 1-.249-.115.58.58 0 0 1-.255-.384zm-3.726-2.909h.893l-1.274 2.007 1.254 1.992h-.908l-.85-1.415h-.035l-.853 1.415H1.5l1.24-2.016-1.228-1.983h.931l.832 1.438h.036zm1.923 3.325h1.697v.674H5.266v-3.999h.791zm7.636-3.325h.893l-1.274 2.007 1.254 1.992h-.908l-.85-1.415h-.035l-.853 1.415h-.861l1.24-2.016-1.228-1.983h.931l.832 1.438h.036z" />
                        </svg>
                    </div>
                    <h3 class="fs-2 text-body-emphasis">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Articulos Dañados</font>
                        </font>
                    </h3>
                    <p>
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Todos los articulos dañados o descompuestos.</font>
                        </font>
                    </p>
                    <a id="generar-reporte3-btn" class="btn btn-danger w-100 px-5">Generar Reporte</a>
                </div>
            </div>
        </div>
    </div>
</div>
<x-footer></x-footer>


<script>
    var articulosJson = {!! $articulosJson !!};
    var articulosU = {!! $articulosU !!}
    var articulosA = {!! $articulosA !!}
    var articulosD = {!! $articulosD !!}
    var currentDate = new Date();

    var year = currentDate.getFullYear();
    var month = ('0' + (currentDate.getMonth() + 1)).slice(-2);
    var day = ('0' + currentDate.getDate()).slice(-2);
    var hours = ('0' + currentDate.getHours()).slice(-2);
    var minutes = ('0' + currentDate.getMinutes()).slice(-2);
    var seconds = ('0' + currentDate.getSeconds()).slice(-2);

    var formattedDate = year +'-'+ month +'-'+ day + '_' + hours +':'+ minutes +':'+ seconds;


document.getElementById('generar-reporte-btn').addEventListener('click', function () {
    // Crear una nueva hoja de cálculo de SheetJS
    var workbook = XLSX.utils.book_new();

    // Convertir los datos JSON a una hoja de cálculo de SheetJS
    var worksheet = XLSX.utils.json_to_sheet(articulosJson);

    // Agregar la hoja de cálculo al libro
    XLSX.utils.book_append_sheet(workbook, worksheet, 'Articulos');

    // Guardar el libro como archivo Excel
    XLSX.writeFile(workbook, 'reporte_' + formattedDate + '.xlsx');
});

document.getElementById('generar-reporte1-btn').addEventListener('click', function () {
    // Crear una nueva hoja de cálculo de SheetJS
    var workbook = XLSX.utils.book_new();

    // Convertir los datos JSON a una hoja de cálculo de SheetJS
    var worksheet = XLSX.utils.json_to_sheet(articulosU);

    // Agregar la hoja de cálculo al libro
    XLSX.utils.book_append_sheet(workbook, worksheet, 'Articulos-En-Uso');

    // Guardar el libro como archivo Excel
    XLSX.writeFile(workbook, 'reporte_' + formattedDate + '.xlsx');
});

document.getElementById('generar-reporte2-btn').addEventListener('click', function () {
    // Crear una nueva hoja de cálculo de SheetJS
    var workbook = XLSX.utils.book_new();

    // Convertir los datos JSON a una hoja de cálculo de SheetJS
    var worksheet = XLSX.utils.json_to_sheet(articulosA);

    // Agregar la hoja de cálculo al libro
    XLSX.utils.book_append_sheet(workbook, worksheet, 'Articulos-En-Almacen');

    // Guardar el libro como archivo Excel
    XLSX.writeFile(workbook, 'reporte_' + formattedDate + '.xlsx');
});
document.getElementById('generar-reporte3-btn').addEventListener('click', function () {
    // Crear una nueva hoja de cálculo de SheetJS
    var workbook = XLSX.utils.book_new();

    // Convertir los datos JSON a una hoja de cálculo de SheetJS
    var worksheet = XLSX.utils.json_to_sheet(articulosD);

    // Agregar la hoja de cálculo al libro
    XLSX.utils.book_append_sheet(workbook, worksheet, 'Articulos-Descompuestos');

    // Guardar el libro como archivo Excel
    XLSX.writeFile(workbook, 'reporte_' + formattedDate + '.xlsx');
});
</script>
