<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TerapiaInfantil;


class ListadoTerapiaInfantilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $infantils = TerapiaInfantil::all();
        return view('lsttinfantil.index', compact('infantils'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('lsttinfantil.create');
        
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
    return redirect()->route('lsttinfantil.index');
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
        $infantil = TerapiaInfantil::findOrFail($id);
        return view ('lsttinfantil.edit', compact('infantil'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $infantil = TerapiaInfantil::FindOrFail($id);
    $infantil->tipo_documento = $request->tipo_documento;
    $infantil->numero_documento = $request->numero_documento;
    $infantil->nombres = $request->nombres;
    $infantil->apellidos = $request->apellidos;
    $infantil->telefono = $request->telefono;
    $infantil->especialidad = $request->especialidad;
    $infantil->genero = $request->genero;
    $infantil->fecha_hora = now(); 
    $infantil->save();
    return redirect()->route('lsttinfantil.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $infantil = TerapiaInfantil::findOrFail($id);
        $infantil-> delete();
        return redirect()->route('lsttinfantil.index');
    }
}
