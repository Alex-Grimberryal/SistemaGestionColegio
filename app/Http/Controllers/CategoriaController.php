<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();
        return view('Mar-Cat.index', compact('categorias'));
    }

    public function create()
    {
        return view('Mar-Cat.create');
    }

    public function store(Request $request)
    {
        Categoria::create($request->all());
        return redirect()->route('Mar-Cat.index');
    }

    public function show(Categoria $categoria)
    {
        return view('Mar-Cat.show', compact('categoria'));
    }

    public function edit(Categoria $categoria)
    {
        return view('Mar-Cat.edit', compact('categoria'));
    }

    public function update(Request $request, Categoria $categoria)
    {
        $categoria->update($request->all());
        return redirect()->route('Mar-Cat.index');
    }

    public function destroy(Categoria $categoria)
    {
        $categoria->delete();
        return redirect()->route('Mar-Cat.index');
    }
}
