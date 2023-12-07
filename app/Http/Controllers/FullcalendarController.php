<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FullcalendarController extends Controller
{
    public function index() {
        $all_clientes = Cliente::all(); 
        $clientes = [];

        foreach($all_clientes as  $cliente) {
            $clientes[] = [
                'title' => $cliente -> nombres,
                'apellidos' => $cliente -> apellidos,
                'numero_documento' => $cliente -> numero_documento,
                'especialidad' => $cliente -> especialidad,
                'start' => $cliente -> fecha_hora,

            ];
        }
        return view ('dashboard', compact('clientes'));
    }

    public function show(Cliente $cliente)
    {
        $cliente= Cliente::all();
        return response()->json($cliente);
    }
}
