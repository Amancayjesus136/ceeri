<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReservarCita;
use App\Models\CeeriImagen;
use App\Models\ConocemeMas;

class MenuUsuarioController extends Controller
{
    /**
     * RETURN.
     */
    public function index()
    {
       
    }

    public function reservarcita()
    {
        $contenido = ReservarCita::first();
        return view('inicio.reservarcita', compact('contenido'));
    }

    public function conocememas()
    {
        $conoceno = ConocemeMas::first();
        return view('inicio.conocenosunpoco', compact('conoceno'));
    }

    public function imagenceeri()
    {
        $imagen = CeeriImagen::first();
        return view('inicio.imagenceeri', compact('imagen'));
    }











    /**
     * EDITS DE TODOS LAS CONFIGURACIONES
     */
    public function edit(string $id)
    {
        $contenido = ReservarCita::findOrFail($id);
        $conoceno = ConocemeMas::findOrFail($id_conocenos);
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
   
    public function editar_conocenos(Request $request, string $id_conocenos)
    {
        $conoceno = ConocemeMas::findOrFail($id_conocenos);
        $conoceno->update($request->all());
        return redirect()->back()->with('success', 'Conocenos actualizado exitosamente');
    }

}
