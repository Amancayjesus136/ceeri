<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TerapiaOcupacional;


class ListadoTerapiaOcupacionalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ocupacionals = TerapiaOcupacional::all();
        return view('lsttocupacional.index', compact('ocupacionals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('lsttocupacional.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $ocupacional = new TerapiaOcupacional;
        $ocupacional->tipo_documento = $request->tipo_documento;
        $ocupacional->numero_documento = $request->numero_documento;
        $ocupacional->nombres = $request->nombres;
        $ocupacional->apellidos = $request->apellidos;
        $ocupacional->telefono = $request->telefono;
        $ocupacional->especialidad = $request->especialidad;
        $ocupacional->genero = $request->genero;
        $ocupacional->fecha_hora = now(); 
        $ocupacional->save();
        return redirect()->route('lsttocupacional.index');
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
        $ocupacional = TerapiaOcupacional::findOrFail($id);
        return view ('lsttocupacional.edit', compact('ocupacional'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $ocupacional = TerapiaOcupacional::FindOrFail($id);
        $ocupacional->tipo_documento = $request->tipo_documento;
        $ocupacional->numero_documento = $request->numero_documento;
        $ocupacional->nombres = $request->nombres;
        $ocupacional->apellidos = $request->apellidos;
        $ocupacional->telefono = $request->telefono;
        $ocupacional->especialidad = $request->especialidad;
        $ocupacional->genero = $request->genero;
        $ocupacional->fecha_hora = now(); 
        $ocupacional->save();
        return redirect()->route('lsttocupacional.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ocupacional = TerapiaOcupacional::findOrFail($id);
        $ocupacional-> delete();
        return redirect()->route('lsttocupacional.index');
    }
}
