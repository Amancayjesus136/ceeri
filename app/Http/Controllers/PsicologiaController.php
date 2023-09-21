<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Psicologia;


class PsicologiaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view ('psicologia.index');
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
        $psicologia =  new Psicologia;
    $psicologia->tipo_documento = $request->tipo_documento;
    $psicologia->numero_documento = $request->numero_documento;
    $psicologia->nombres = $request->nombres;
    $psicologia->apellidos = $request->apellidos;
    $psicologia->telefono = $request->telefono;
    $psicologia->especialidad = $request->especialidad;
    $psicologia->genero = $request->genero;
    $psicologia->fecha_hora = now(); 

    $psicologia->save();
    return redirect()->route('psicologia.index');
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
