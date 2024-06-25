<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use App\Models\Ambiente;
use App\Models\Categoria;
use App\Models\Marca;
use Illuminate\Http\Request;

class ArticuloController extends Controller
{
    public function index()
    {
        $articulos = Articulo::all();
        return view('articulos.index', compact('articulos'));
    }

    public function create()
    {
        $categorias = Categoria::all();
        $marcas = Marca::all();
        $ambientes = Ambiente::all();
        return view('articulos.create', compact('categorias', 'marcas', 'ambientes'));
    }

    public function store(Request $request)
    {
        $articulo = new Articulo([
            'ambientes_idambiente' => $request->input('ambientes_idambiente'),
            'categorias_idcategoria' => $request->input('categorias_idcategoria'),
            'marcas_idmarca' => $request->input('marcas_idmarca'),
            'nroserie' => $request->input('nroserie'),
            'articulo' => $request->input('articulo'),
            'fechaadq' => $request->input('fechaadq'),
            'estado' => $request->input('estado'),
            'Stock_en_uso' => $request->input('Stock_en_uso'),
            'Stock_almacenado' => $request->input('Stock_almacenado'),
            'stock_dañado' => $request->input('stock_dañado'),
        ]);

        $articulo->save();

        return redirect()->route('articulos.index')->with('success', 'El artículo se ha creado correctamente.');
    }

    public function show(Articulo $articulo)
    {
        return view('articulos.show', compact('articulo'));
    }

    public function edit(Articulo $articulo)
    {
        $categorias = Categoria::all();
        $marcas = Marca::all();
        $ambientes = Ambiente::all();
        return view('articulos.edit', compact('articulo','categorias', 'marcas', 'ambientes'));
    }

    public function update(Request $request, Articulo $articulo)
    {
        $articulo->update([
            'ambientes_idambiente' => $request->input('ambientes_idambiente'),
            'categorias_idcategoria' => $request->input('categorias_idcategoria'),
            'marcas_idmarca' => $request->input('marcas_idmarca'),
            'nroserie' => $request->input('nroserie'),
            'articulo' => $request->input('articulo'),
            'fechaadq' => $request->input('fechaadq'),
            'Stock_en_uso' => $request->input('Stock_en_uso'),
            'Stock_almacenado' => $request->input('Stock_almacenado'),
            'stock_dañado' => $request->input('stock_dañado'),
        ]);

        return redirect()->route('articulos.index')->with('success', 'El artículo se ha actualizado correctamente.');
    }

    public function destroy(Articulo $articulo)
    {
        $articulo->delete();

        return redirect()->route('articulos.index')->with('success', 'El artículo se ha eliminado correctamente.');
    }
}
