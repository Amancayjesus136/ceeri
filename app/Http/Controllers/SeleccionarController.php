<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cliente;

class SeleccionarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = Cliente::get();
        $eventos = [];
        foreach ($clientes as $cliente) {
            array_push($eventos, [
                'id' => $cliente->id,
                'title' => $cliente->nombres.' '.$cliente->apellidos.' '.$cliente->especialidad,
                'start' => $cliente->fecha_hora,
                'end' => date('Y-m-d H.i:s', strtotime('+1 hour', strtotime($cliente->fecha_hora))),
            ]);
        }
        //return dd($eventos);
        return view('seleccionar.index', compact('clientes', 'eventos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $cliente = Cliente::find($id);

        if (!$cliente) {
            abort(404); 
        }
        return view('clientes.show', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
