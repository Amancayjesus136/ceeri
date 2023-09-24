<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TerapiaFisica;

class TerapiaFisicaController extends Controller

{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view ('terapiafisica.index');
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
        $terapiafisica = new TerapiaFisica;
        $terapiafisica->tipo_documento = $request->tipo_documento;
        $terapiafisica->numero_documento = $request->numero_documento;
        $terapiafisica->nombres = $request->nombres;
        $terapiafisica->apellidos = $request->apellidos;
        $terapiafisica->telefono = $request->telefono;
        $terapiafisica->especialidad = $request->especialidad;
        $terapiafisica->genero = $request->genero;
        $terapiafisica->fecha_hora = now(); 

        $terapiafisica->save();
        return redirect()->route('terapiafisica.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
