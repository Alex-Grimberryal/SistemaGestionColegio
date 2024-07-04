<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Crypt;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::all();

        return view('usuarios.index', compact('usuarios'));
    }

    public function create()
    {
        return view('usuarios.create');
    }

    public function store(Request $request)
    {
        // Validar los datos del formulario antes de guardarlos en la base de datos
        $request->validate([
            'nombre' => 'required|string',
            'contrasena' => 'required|string',
            'rol' => 'required|string',
        ]);

        // Crear un nuevo objeto Usuario con los datos del formulario
        $usuario = new Usuario();
        $usuario->nombre = $request->nombre;
        $usuario->contrasena = Hash::make($request->contrasena); // Encriptar la contraseña utilizando Hash::make()
        $usuario->rol = $request->rol;
        $usuario->recuperacion = Crypt::encryptString($request->contrasena); //Encriptar la contraseña utilizando encryptString()
        $usuario->save();

        return redirect()->route('usuarios.index')->with('success', 'Usuario creado exitosamente');
    }

    public function edit($id)
    {
        $usuario = Usuario::findOrFail($id);

        return view('usuarios.edit', compact('usuario'));
    }

    public function update(Request $request, $id)
    {
        // Validar los datos del formulario antes de actualizarlos en la base de datos
        $request->validate([
            'nombre' => 'required|string',
            'contrasena' => 'required|string',
            'rol' => 'required|string',
        ]);

        // Buscar el usuario a editar por su ID
        $usuario = Usuario::findOrFail($id);
        $usuario->nombre = $request->nombre;
        $usuario->contrasena = Hash::make($request->contrasena); // Encriptar la contraseña utilizando Hash::make()
        $usuario->rol = $request->rol;
        $usuario->recuperacion = Crypt::encryptString($request->contrasena); // Encriptar la contraseña utilizando encryptString()
        $usuario->save();

        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado exitosamente');
    }
}
