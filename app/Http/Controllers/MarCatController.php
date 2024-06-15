<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use App\Models\Categoria;
use Illuminate\Http\Request;

class MarCatController extends Controller
{
    public function index()
    {
        $marcas = Marca::all();
        $categorias = Categoria::all();

        return view('Mar-Cat.index', compact('marcas', 'categorias'));
    }


}
