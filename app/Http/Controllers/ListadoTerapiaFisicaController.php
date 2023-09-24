<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TerapiaFisica;


class ListadoTerapiaFisicaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fisicas = TerapiaFisica::all();
        return view('lsttfisica.index', compact('fisicas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('lsttfisica.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fisica = new TerapiaFisica;
    $fisica->tipo_documento = $request->tipo_documento;
    $fisica->numero_documento = $request->numero_documento;
    $fisica->nombres = $request->nombres;
    $fisica->apellidos = $request->apellidos;
    $fisica->telefono = $request->telefono;
    $fisica->especialidad = $request->especialidad;
    $fisica->genero = $request->genero;
    $fisica->fecha_hora = now(); 
    $fisica->save();
    return redirect()->route('lsttfisica.index');

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
        $fisica = TerapiaFisica::findOrFail($id);
        return view ('lsttfisica.edit', compact('fisica'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $fisica = TerapiaFisica::FindOrFail($id);
    $fisica->tipo_documento = $request->tipo_documento;
    $fisica->numero_documento = $request->numero_documento;
    $fisica->nombres = $request->nombres;
    $fisica->apellidos = $request->apellidos;
    $fisica->telefono = $request->telefono;
    $fisica->especialidad = $request->especialidad;
    $fisica->genero = $request->genero;
    $fisica->fecha_hora = now(); 
    $fisica->save();
    return redirect()->route('lsttfisica.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $fisica = TerapiaFisica::findOrFail($id);
        $fisica-> delete();
        return redirect()->route('lsttfisica.index');
    }
}
