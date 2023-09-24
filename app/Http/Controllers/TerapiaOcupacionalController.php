<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TerapiaOcupacional;

class TerapiaOcupacionalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('terapiaocupacional.index');
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
        $terapiaocupacional = new TerapiaOcupacional;
        $terapiaocupacional->tipo_documento = $request->tipo_documento;
        $terapiaocupacional->numero_documento = $request->numero_documento;
        $terapiaocupacional->nombres = $request->nombres;
        $terapiaocupacional->apellidos = $request->apellidos;
        $terapiaocupacional->telefono = $request->telefono;
        $terapiaocupacional->especialidad = $request->especialidad;
        $terapiaocupacional->genero = $request->genero;
        $terapiaocupacional->fecha_hora = now(); 

        $terapiaocupacional->save();
        return redirect()->route('terapiaocupacional.index');
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
