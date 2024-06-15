<?php

namespace App\Http\Controllers;

use App\Models\Ambiente;
use Illuminate\Http\Request;

class AmbienteController extends Controller
{
    public function index()
    {
        $ambientes = Ambiente::all();
        return view('ambientes.index', compact('ambientes'));
    }

    public function create()
    {
        return view('ambientes.create');
    }

    public function store(Request $request)
    {
        Ambiente::create($request->all());
        return redirect()->route('ambientes.index');
    }

    public function show(Ambiente $ambiente)
    {
        return view('ambientes.show', compact('ambiente'));
    }

    public function edit(Ambiente $ambiente)
    {
        return view('ambientes.edit', compact('ambiente'));
    }

    public function update(Request $request, Ambiente $ambiente)
    {
        $ambiente->update($request->all());
        return redirect()->route('ambientes.index');
    }

    public function destroy(Ambiente $ambiente)
    {
        $ambiente->delete();
        return redirect()->route('ambientes.index');
    }
}
