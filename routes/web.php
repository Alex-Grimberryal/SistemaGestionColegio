<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AmbienteController;
use App\Http\Controllers\ArticuloController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\MarCatController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AuthLoginController;
use App\Models\SesionesAbiertas;


if (SesionesAbiertas::count() > 0) {

    Route::get('/', [AuthLoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthLoginController::class, 'login'])->name('login.post');
    Route::get('/logout', [AuthLoginController::class, 'logout'])->name('logout');

    Route::get('/welcome', function () {
        return view('welcome.welcome');
    })->name('welcome');

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
