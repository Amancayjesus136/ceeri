<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TerapiaLenguaje;


class ListadoTerapiaLenguajeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lenguajes = TerapiaLenguaje::all();
        return view('lsttlenguaje.index', compact('lenguajes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('lsttlenguaje.create');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $lenguaje = new TerapiaLenguaje;
        $lenguaje->tipo_documento = $request->tipo_documento;
        $lenguaje->numero_documento = $request->numero_documento;
        $lenguaje->nombres = $request->nombres;
        $lenguaje->apellidos = $request->apellidos;
        $lenguaje->telefono = $request->telefono;
        $lenguaje->especialidad = $request->especialidad;
        $lenguaje->genero = $request->genero;
        $lenguaje->fecha_hora = now(); 
        $lenguaje->save();
        return redirect()->route('lsttlenguaje.index');
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
        $lenguaje = TerapiaLenguaje::findOrFail($id);
        return view ('lsttlenguaje.edit', compact('lenguaje'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $lenguaje = TerapiaLenguaje::FindOrFail($id);
        $lenguaje->tipo_documento = $request->tipo_documento;
        $lenguaje->numero_documento = $request->numero_documento;
        $lenguaje->nombres = $request->nombres;
        $lenguaje->apellidos = $request->apellidos;
        $lenguaje->telefono = $request->telefono;
        $lenguaje->especialidad = $request->especialidad;
        $lenguaje->genero = $request->genero;
        $lenguaje->fecha_hora = now(); 
        $lenguaje->save();
        return redirect()->route('lsttlenguaje.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $lenguaje = Terapialenguaje::findOrFail($id);
        $lenguaje-> delete();
        return redirect()->route('lsttlenguaje.index');
    }
}
