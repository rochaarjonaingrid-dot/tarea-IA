<?php

namespace App\Http\Controllers;

class SaludoController extends Controller
{
    public function saludo()
    {
        return view('saludo', ['mensaje' => '¡Hola desde el controlador!']);
    }
}
