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
        $infantil = new TerapiaInfantil;
        $infantil->tipo_documento = $request->tipo_documento;
        $infantil->numero_documento = $request->numero_documento;
        $infantil->nombres = $request->nombres;
        $infantil->apellidos = $request->apellidos;
        $infantil->telefono = $request->telefono;
        $infantil->especialidad = $request->especialidad;
        $infantil->genero = $request->genero;
        $infantil->fecha_hora = now(); 

        $infantil->save();
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
