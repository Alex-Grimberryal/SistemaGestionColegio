<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Http\Request;

class MarcaController extends Controller
{
    public function index()
    {
        $marcas = Marca::all();
        return view('Mar-Cat.index', compact('marcas'));
    }

    public function create()
    {
        return view('Mar-Cat.create');
    }

    public function store(Request $request)
    {
        Marca::create($request->all());
        return redirect()->route('Mar-Cat.index');
    }

    public function show(Marca $Marca)
    {
        return view('Mar-Cat.show', compact('marca'));
    }

    public function edit(Marca $Marca)
    {
        return view('Mar-Cat.edit', compact('marca'));
    }

    public function update(Request $request, Marca $marca)
    {
        $marca->update($request->all());
        return redirect()->route('Mar-Cat.index');
    }

    public function destroy(Marca $marca)
    {
        $marca->delete();
        return redirect()->route('Mar-Cat.index');
    }
}
