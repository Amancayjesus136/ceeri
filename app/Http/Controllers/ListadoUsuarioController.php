<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserva;


class ListadoUsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservas = Reserva::all();
        return view ('listado.index', compact ('reservas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('listado.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    $reserva = new Reserva;
    $reserva->tipo_documento = $request->tipo_documento;
    $reserva->numero_documento = $request->numero_documento;
    $reserva->nombres = $request->nombres;
    $reserva->apellidos = $request->apellidos;
    $reserva->telefono = $request->telefono;
    $reserva->especialidad = $request->especialidad;
    $reserva->genero = $request->genero;
    $reserva->fecha_hora = now(); 

    $reserva->save();
    return redirect()->route('listado.index');

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
        $reserva = Reserva::findOrFail($id);
        return view ('listado.edit', compact('reserva'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
    $reserva = Reserva::findOrFail($id);
    $reserva->tipo_documento = $request->tipo_documento;
    $reserva->numero_documento = $request->numero_documento;
    $reserva->nombres = $request->nombres;
    $reserva->apellidos = $request->apellidos;
    $reserva->telefono = $request->telefono;
    $reserva->especialidad = $request->especialidad;
    $reserva->genero = $request->genero;
    $reserva->fecha_hora = now(); 

    $reserva->save();
    return redirect()->route('listado.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $reserva = Reserva::findOrFail($id);
        $reserva-> delete();
        return redirect()->route('listado.index');
    }
}
