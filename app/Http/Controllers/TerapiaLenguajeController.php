<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TerapiaLenguaje;

class TerapiaLenguajeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view ('terapialenguaje.index');
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
        $terapialenguaje = new Terapialenguaje;
        $terapialenguaje->tipo_documento = $request->tipo_documento;
        $terapialenguaje->numero_documento = $request->numero_documento;
        $terapialenguaje->nombres = $request->nombres;
        $terapialenguaje->apellidos = $request->apellidos;
        $terapialenguaje->telefono = $request->telefono;
        $terapialenguaje->especialidad = $request->especialidad;
        $terapialenguaje->genero = $request->genero;
        $terapialenguaje->fecha_hora = now(); 

        $terapialenguaje->save();
        return redirect()->route('terapialenguaje.index');
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
