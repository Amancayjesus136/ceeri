<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReservarCita;
use App\Models\ReservarNumero;

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

    public function create()
    {
        $numero = ReservarNumero::first();
        return view('inicio.reservarnumero', compact('numero'));
    }






    /**
     * EDITS DE TODOS LAS CONFIGURACIONES
     */
    public function edit(string $id)
    {
        $contenido = ReservarCita::findOrFail($id);
        $numero = ReservarNumero::findOrFail($id_numero);
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

    public function editar_numero(Request $request, string $id)
    {
        $numero = ReservarNumero::findOrFail($id);
        $numero->update($request->all());
        return redirect()->back()->with('success', 'Reservar cita actualizado exitosamente');
    }

}
