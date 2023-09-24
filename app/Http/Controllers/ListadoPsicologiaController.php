<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Psicologia;


class ListadoPsicologiaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $psicologias = Psicologia::all();
        return view('lstpsicologia.index', compact('psicologias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('lstpsicologia.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $psicologia = new Psicologia;
    $psicologia->tipo_documento = $request->tipo_documento;
    $psicologia->numero_documento = $request->numero_documento;
    $psicologia->nombres = $request->nombres;
    $psicologia->apellidos = $request->apellidos;
    $psicologia->telefono = $request->telefono;
    $psicologia->especialidad = $request->especialidad;
    $psicologia->genero = $request->genero;
    $psicologia->fecha_hora = now(); 
    $psicologia->save();
    return redirect()->route('lstpsicologia.index');

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
        $psicologia = Psicologia::findOrFail($id);
        return view ('lstpsicologia.edit', compact('psicologia'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
    $psicologia = Psicologia::FindOrFail($id);
    $psicologia->tipo_documento = $request->tipo_documento;
    $psicologia->numero_documento = $request->numero_documento;
    $psicologia->nombres = $request->nombres;
    $psicologia->apellidos = $request->apellidos;
    $psicologia->telefono = $request->telefono;
    $psicologia->especialidad = $request->especialidad;
    $psicologia->genero = $request->genero;
    $psicologia->fecha_hora = now(); 
    $psicologia->save();
    return redirect()->route('lstpsicologia.index');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $psicologia = Psicologia::findOrFail($id);
        $psicologia-> delete();
        return redirect()->route('lstpsicologia.index');
    }
}
