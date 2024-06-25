<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GraficosController extends Controller
{

    public function mostrarGrafico()
    {
        $articulos = Articulo::select(
            DB::raw('SUM(Stock_en_uso) as sumStockEnUso'),
            DB::raw('SUM(Stock_almacenado) as sumStockAlmacenado'),
            DB::raw('SUM(stock_dañado) as sumStockDanado')
        )->first();

        $sumStockEnUso = $articulos->sumStockEnUso;
        $sumStockAlmacenado = $articulos->sumStockAlmacenado;
        $sumStockDanado = $articulos->sumStockDanado;

        // Preparar los datos para el gráfico
        $labels = ['En uso', 'En almacén', 'Dañado'];
        $data = [$sumStockEnUso, $sumStockAlmacenado, $sumStockDanado];
        $backgroundColor = ['rgb(255, 99, 132)', 'rgb(54, 162, 235)', 'rgb(255, 205, 86)'];

        return view('welcome.welcome')->with(compact('labels', 'data', 'backgroundColor'));
    }
}
