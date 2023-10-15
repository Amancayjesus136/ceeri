<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReservarCita;

class MenuUsuarioController extends Controller
{
    /**
     * RETURN.
     */
    public function index()
    {
        $contenido = ReservarCita::first();
        return view('inicio.reservarcita', compact('contenido'));
    }






    /**
     * EDITS DE TODOS LAS CONFIGURACIONES
     */
    public function edit(string $id)
    {
        $contenido = ReservarCita::findOrFail($id);
        return redirect()->back()->with('success', 'Reservar actualizado exitosamente');
    }














    /**
     * UPDATE DE TODOS LAS CONFIGURACIONES
     */

    public function editar_reservarcita(Request $request, string $id)
    {
        $contenido = ReservarCita::findOrFail($id);
        $contenido->update($request->all());
        return redirect()->back()->with('success', 'Reservar cita actualizado exitosamente');
    }

}
