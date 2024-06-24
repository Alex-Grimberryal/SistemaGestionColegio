<?php

namespace App\Http\Controllers;

use App\Models\AuthUsuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Models\SesionesAbiertas;

class AuthLoginController extends Controller
{
    protected function attemptLogin(Request $request)
    {
        $credentials = $request->only('nombre', 'password');
        $usuario = AuthUsuario::where('nombre', $credentials['nombre'])->first();

        if ($usuario && Hash::check($credentials['password'], $usuario->contrasena)) {
            // Autenticación exitosa, almacenar el nombre del usuario en la tabla sesiones_abiertas
            SesionesAbiertas::create(['nombre_usuario' => $usuario->nombre]);
            // Autenticación exitosa, redirigir a la página deseada
            return redirect()->route('welcome'); // Modifica 'bienvenida' por 'welcome'
        }

        throw ValidationException::withMessages([
            'nombre' => __('auth.failed'),
        ]);
    }

    public function showLoginForm()
    {
        if (Auth::check()) {
            return redirect()->route('welcome'); // Cambia 'welcome' por la ruta que desees
        }

        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('nombre', 'password');

        $usuario = AuthUsuario::where('nombre', $credentials['nombre'])->first();

        if ($usuario && Hash::check($credentials['password'], $usuario->contrasena)) {
            // Autenticación exitosa, almacenar el nombre del usuario en la sesión
            $request->session()->put('nombre', $usuario->nombre);
            //Almacenamiento del usuario en una lista
            SesionesAbiertas::create(['nombre_usuario' => $usuario->nombre]);
            // Autenticación exitosa, redirigir a la página deseada
            return redirect()->route('cargando')->with('redirectToWelcome', true);
        }

        // Autenticación fallida, redirigir al formulario de inicio de sesión con un mensaje de error
        return redirect()->route('login')->withErrors([
            'nombre' => 'Credenciales inválidas',
        ]);
    }

    public function logout(Request $request)
    {
        // Eliminar el nombre del usuario actual de la tabla sesiones_abiertas
        $nombreUsuario = $request->session()->get('nombre');
        SesionesAbiertas::where('nombre_usuario', $nombreUsuario)->delete();


        Auth::logout();

        return redirect()->route('login');
    }
}
