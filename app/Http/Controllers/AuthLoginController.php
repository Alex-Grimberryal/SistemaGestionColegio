<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('nombre', 'contrasena');

        if (Auth::guard('usuario')->attempt($credentials)) {
            // Autenticación exitosa, redirigir a la página deseada
            return redirect()->intended('/dashboard');
        }

        // Autenticación fallida, redirigir al formulario de inicio de sesión con un mensaje de error
        return redirect()->route('login')->withErrors([
            'nombre' => 'Credenciales inválidas',
        ]);
    }
}
