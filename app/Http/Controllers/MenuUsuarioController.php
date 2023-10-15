<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReservarCita;

class MenuUsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contenido = ReservarCita::first();
        return view('inicio.reservarcita', compact('contenido'));
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
        //
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
        $contenido = ReservarCita::findOrFail($id);
        return redirect()->back()->with('success', 'Reservar actualizado exitosamente');
    }

    public function editar_reservarcita(Request $request, string $id)
    {
        $contenido = ReservarCita::findOrFail($id);
        $contenido->update($request->all());
        return redirect()->back()->with('success', 'Reservar cita actualizado exitosamente');
    }

}
