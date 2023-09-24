<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TerapiaInfantil;

class TerapiaInfantilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view ('terapiainfantil.index');
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
        $terapiainfantil = new TerapiaInfantil;
        $terapiainfantil->tipo_documento = $request->tipo_documento;
        $terapiainfantil->numero_documento = $request->numero_documento;
        $terapiainfantil->nombres = $request->nombres;
        $terapiainfantil->apellidos = $request->apellidos;
        $terapiainfantil->telefono = $request->telefono;
        $terapiainfantil->especialidad = $request->especialidad;
        $terapiainfantil->genero = $request->genero;
        $terapiainfantil->fecha_hora = now(); 

        $terapiainfantil->save();
        return redirect()->route('terapiainfantil.index');

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
