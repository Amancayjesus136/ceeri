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
        $fisicas = TerapiaFisica::query();
        if (!empty($_GET['s'])) {
            $fisicas = $fisicas->where('id', 'LIKE', '%'.$_GET['s'].'%')
                                ->orWhere('tipo_documento', 'LIKE', '%'.$_GET['s'].'%')
                                ->orWhere('numero_documento', 'LIKE', '%'.$_GET['s'].'%')
                                ->orWhere('nombres', 'LIKE', '%'.$_GET['s'].'%')
                                ->orWhere('apellidos', 'LIKE', '%'.$_GET['s'].'%')
                                ->orWhere('telefono', 'LIKE', '%'.$_GET['s'].'%')
                                ->orWhere('especialidad', 'LIKE', '%'.$_GET['s'].'%')
                                ->orWhere('genero', 'LIKE', '%'.$_GET['s'].'%')
                                ->orWhere('fecha_hora', 'LIKE', '%'.$_GET['s'].'%');
            }
            $fisicas = $fisicas->get();
        return view('lsttfisica.index', compact('fisicas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('lsttfisica.create');
    }

    public function formulario()
    {
        return view ('lsttfisica.formulario');

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
        $fisica->estado = $request->estado; 

        if ($request->numero_documento == 'condicion') {
            $fisica->estado = 'Faltan Datos';
        } else {
            $fisica->estado = 'pendiente';
        }
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
