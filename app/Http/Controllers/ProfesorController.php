<?php

namespace App\Http\Controllers;

use App\Models\Profesor;
use Illuminate\Http\Request;

class ProfesorController extends Controller
{
    public function index()
    {
        $profesores = Profesor::paginate(10);
        return view('profesores.index', compact('profesores'));
    }

    public function create()
    {
        return view('profesores.create');
    }

    public function store(Request $request)
    {
        $profesor = new Profesor;
        $profesor->profesor = $request->input('profesor');
        $profesor->area = $request->input('area');
        $profesor->estado = $request->input('estado');
        $profesor->save();

        return redirect()->route('profesores.index')->with('success', 'Profesor creado exitosamente.');
    }

    public function edit($id)
    {
        $profesor = Profesor::find($id);
        return view('profesores.edit', compact('profesor'));
    }

    public function update(Request $request, $id)
    {
        $profesor = Profesor::find($id);
        $profesor->profesor = $request->input('profesor');
        $profesor->area = $request->input('area');
        $profesor->estado = $request->input('estado');
        $profesor->save();

        return redirect()->route('profesores.index')->with('success', 'Profesor actualizado exitosamente.');
    }
}
