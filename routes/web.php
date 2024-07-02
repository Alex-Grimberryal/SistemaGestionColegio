<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AmbienteController;
use App\Http\Controllers\ArticuloController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\MarCatController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AuthLoginController;
use App\Http\Controllers\GenExcel;
use Illuminate\Support\Facades\DB;
use App\Models\Categoria;
use App\Models\Usuario;
use App\Models\Articulo;
use App\Models\SesionesAbiertas;


if (SesionesAbiertas::count() > 0) {

    Route::get('/', [AuthLoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthLoginController::class, 'login'])->name('login.post');
    Route::get('/logout', [AuthLoginController::class, 'logout'])->name('logout');

    Route::get('/welcome', function () {
        $articulos = Articulo::select(
            DB::raw('SUM(Stock_en_uso) as sumStockEnUso'),
            DB::raw('SUM(Stock_almacenado) as sumStockAlmacenado'),
            DB::raw('SUM(stock_dañado) as sumStockDanado')
        )->first();
        $usuarios = Usuario::select(
            DB::raw('SUM(CASE WHEN rol = "Administrador" THEN 1 ELSE 0 END) as admin'),
            DB::raw('SUM(CASE WHEN rol = "Operario" THEN 1 ELSE 0 END) as oper')
        )->first();
        return view('welcome.welcome', compact('articulos', 'usuarios'));
    })->name('welcome');

    Route::get('/inventario', function () {
        $articulosPorCategoria = Articulo::select(
            'categorias.categoria as categoria',
            DB::raw('SUM(Stock_en_uso) as sumStockEnUso'),
            DB::raw('SUM(Stock_almacenado) as sumStockAlmacenado'),
            DB::raw('SUM(stock_dañado) as sumStockDanado'),
            DB::raw('SUM(Stock_en_uso + Stock_almacenado + stock_dañado) as sumTotalArticulos')
        )
            ->join('categorias', 'articulos.categorias_idcategoria', '=', 'categorias.idcategoria')
            ->groupBy('categorias.categoria')
            ->get();

        foreach ($articulosPorCategoria as $articulos) {
            $categoria = $articulos->categoria;
            $sumStockEnUso = $articulos->sumStockEnUso;
            $sumStockAlmacenado = $articulos->sumStockAlmacenado;
            $sumStockDanado = $articulos->sumStockDanado;
        }
        $articulos = Articulo::select(
            DB::raw('SUM(Stock_en_uso) as sumStockEnUso'),
            DB::raw('SUM(Stock_almacenado) as sumStockAlmacenado'),
            DB::raw('SUM(stock_dañado) as sumStockDanado')
        )->first();
        return view('inventario.inventario', compact('articulosPorCategoria','articulos'));
    })->name('inventario');

    Route::get('/reportes', function () {
        $articulos = Articulo::with('ambiente', 'categoria', 'marca')->get();
        // Transformar los nombres de las columnas
        $articulosTransformados = $articulos->map(function ($articulo) {
            return [
                'ID' => $articulo->id,
                'AMBIENTE' => $articulo->ambiente->ambiente,
                'CATEGORIA' => $articulo->categoria->categoria,
                'MARCA' => $articulo->marca->marca,
                'NRO SERIE' => $articulo->nroserie,
                'NOMBRE' => $articulo->articulo,
                'FECHA DE ADQUICISION' => $articulo->fechaadq,
                'FECHA DE CREACION DEL REGISTRO' => $articulo->created_at,
                'FECHA DE ACTUALIZACION DEL REGISTRO' => $articulo->updated_at,
                'STOCK EN USO' => $articulo->Stock_en_uso,
                'STOCK EN ALMACEN' => $articulo->Stock_almacenado,
                'STOCK DESCOMPUESTO' => $articulo->stock_dañado,
            ];
        });

        $articulosEnUso = $articulos->map(function ($articulo) {
            return [
                'ID' => $articulo->id,
                'AMBIENTE' => $articulo->ambiente->ambiente,
                'CATEGORIA' => $articulo->categoria->categoria,
                'MARCA' => $articulo->marca->marca,
                'NRO SERIE' => $articulo->nroserie,
                'NOMBRE' => $articulo->articulo,
                'FECHA DE ADQUICISION' => $articulo->fechaadq,
                'FECHA DE CREACION DEL REGISTRO' => $articulo->created_at,
                'FECHA DE ACTUALIZACION DEL REGISTRO' => $articulo->updated_at,
                'STOCK EN USO' => $articulo->Stock_en_uso,
            ];
        });

        $articulosAlmacenados = $articulos->map(function ($articulo) {
            return [
                'ID' => $articulo->id,
                'AMBIENTE' => $articulo->ambiente->ambiente,
                'CATEGORIA' => $articulo->categoria->categoria,
                'MARCA' => $articulo->marca->marca,
                'NRO SERIE' => $articulo->nroserie,
                'NOMBRE' => $articulo->articulo,
                'FECHA DE ADQUICISION' => $articulo->fechaadq,
                'FECHA DE CREACION DEL REGISTRO' => $articulo->created_at,
                'FECHA DE ACTUALIZACION DEL REGISTRO' => $articulo->updated_at,
                'STOCK EN ALMACEN' => $articulo->Stock_almacenado,
            ];
        });

        $articulosDescompuestos = $articulos->map(function ($articulo) {
            return [
                'ID' => $articulo->id,
                'AMBIENTE' => $articulo->ambiente->ambiente,
                'CATEGORIA' => $articulo->categoria->categoria,
                'MARCA' => $articulo->marca->marca,
                'NRO SERIE' => $articulo->nroserie,
                'NOMBRE' => $articulo->articulo,
                'FECHA DE ADQUICISION' => $articulo->fechaadq,
                'FECHA DE CREACION DEL REGISTRO' => $articulo->created_at,
                'FECHA DE ACTUALIZACION DEL REGISTRO' => $articulo->updated_at,
                'STOCK DESCOMPUESTO' => $articulo->stock_dañado,
            ];
        });

        $articulosJson = $articulosTransformados->toJson();
        $articulosU = $articulosEnUso->toJson();
        $articulosA = $articulosAlmacenados->toJson();
        $articulosD = $articulosDescompuestos->toJson();
        return view('reportes.reportes', compact('articulosJson','articulosU','articulosA','articulosD'));
    })->name('reportes');

    Route::post('/reportes/exportar-excel', [GenExcel::class, 'exportarExcel']);

    Route::get('/ambientes', [AmbienteController::class, 'index'])->name('ambientes.index');
    Route::get('/ambientes/create', [AmbienteController::class, 'create'])->name('ambientes.create');
    Route::post('/ambientes', [AmbienteController::class, 'store'])->name('ambientes.store');
    Route::get('/ambientes/{ambiente}', [AmbienteController::class, 'show'])->name('ambientes.show');
    Route::get('/ambientes/{ambiente}/edit', [AmbienteController::class, 'edit'])->name('ambientes.edit');
    Route::put('/ambientes/{ambiente}', [AmbienteController::class, 'update'])->name('ambientes.update');
    Route::delete('/ambientes/{ambiente}', [AmbienteController::class, 'destroy'])->name('ambientes.destroy');

    Route::get('/Mar-Cat', [MarCatController::class, 'index'])->name('Mar-Cat.index');

    Route::prefix('Mar-Cat')->group(function () {
        // Rutas para categorías
        Route::get('/categoria', [CategoriaController::class, 'index'])->name('Mar-Cat.categoria.index');
        Route::get('/categoria/create', [CategoriaController::class, 'create'])->name('Mar-Cat.categoria.create');
        Route::post('/categoria', [CategoriaController::class, 'store'])->name('Mar-Cat.categoria.store');
        Route::get('/categoria/{categoria}', [CategoriaController::class, 'show'])->name('Mar-Cat.categoria.show');
        Route::get('/categoria/{categoria}/edit', [CategoriaController::class, 'edit'])->name('Mar-Cat.categoria.edit');
        Route::put('/categoria/{categoria}', [CategoriaController::class, 'update'])->name('Mar-Cat.categoria.update');
        Route::delete('/categoria/{categoria}', [CategoriaController::class, 'destroy'])->name('Mar-Cat.categoria.destroy');

        // Rutas para marcas
        Route::get('/marca', [MarcaController::class, 'index'])->name('Mar-Cat.marca.index');
        Route::get('/marca/create', [MarcaController::class, 'create'])->name('Mar-Cat.marca.create');
        Route::post('/marca', [MarcaController::class, 'store'])->name('Mar-Cat.marca.store');
        Route::get('/marca/{marca}', [MarcaController::class, 'show'])->name('Mar-Cat.marca.show');
        Route::get('/marca/{marca}/edit', [MarcaController::class, 'edit'])->name('Mar-Cat.marca.edit');
        Route::put('/marca/{marca}', [MarcaController::class, 'update'])->name('Mar-Cat.marca.update');
        Route::delete('/marca/{marca}', [MarcaController::class, 'destroy'])->name('Mar-Cat.marca.destroy');
    });

    Route::get('/articulos', [ArticuloController::class, 'index'])->name('articulos.index');
    Route::get('/articulos/create', [ArticuloController::class, 'create'])->name('articulos.create');
    Route::post('/articulos', [ArticuloController::class, 'store'])->name('articulos.store');
    Route::get('/articulos/{articulo}', [ArticuloController::class, 'show'])->name('articulos.show');
    Route::get('/articulos/{articulo}/edit', [ArticuloController::class, 'edit'])->name('articulos.edit');
    Route::put('/articulos/{articulo}', [ArticuloController::class, 'update'])->name('articulos.update');
    Route::delete('/articulos/{articulo}', [ArticuloController::class, 'destroy'])->name('articulos.destroy');

    Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');
    Route::get('/usuarios/create', [UsuarioController::class, 'create'])->name('usuarios.create');
    Route::post('/usuarios', [UsuarioController::class, 'store'])->name('usuarios.store');
    Route::get('/usuarios/{id}/edit', [UsuarioController::class, 'edit'])->name('usuarios.edit');
    Route::put('/usuarios/{id}', [UsuarioController::class, 'update'])->name('usuarios.update');



    Route::get('/cargando', function () {
        return view('welcome.cargando');
    })->name('cargando');
} else {
    // Redireccionar al formulario de inicio de sesión cuando no hay sesiones abiertas
    Route::any('/', function () {
        return redirect()->route('login');
    });

    Route::post('/login', [AuthLoginController::class, 'login'])->name('login.post');

    Route::get('/cargando', function () {
        return view('welcome.cargando');
    })->name('cargando');

    // Redireccionar al formulario de inicio de sesión cuando se accede a otras rutas sin iniciar sesión
    Route::any('/{any}', function () {
        return redirect()->route('login');
    });
}
