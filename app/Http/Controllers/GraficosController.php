<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GraficosController extends Controller
{
    public function mostrarGrafico()
    {
        $datos = DB::table('articulos')->select('etiqueta', 'valor')->get();

        return view('grafico', compact('datos'));
    }
}
