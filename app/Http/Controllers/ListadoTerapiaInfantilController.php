<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TerapiaInfantil;


class ListadoTerapiaInfantilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $infantils = TerapiaInfantil::query();
        if (!empty($_GET['s'])) {
            $infantils = $infantils->where('id', 'LIKE', '%'.$_GET['s'].'%')
                                ->orWhere('tipo_documento', 'LIKE', '%'.$_GET['s'].'%')
                                ->orWhere('numero_documento', 'LIKE', '%'.$_GET['s'].'%')
                                ->orWhere('nombres', 'LIKE', '%'.$_GET['s'].'%')
                                ->orWhere('apellidos', 'LIKE', '%'.$_GET['s'].'%')
                                ->orWhere('telefono', 'LIKE', '%'.$_GET['s'].'%')
                                ->orWhere('especialidad', 'LIKE', '%'.$_GET['s'].'%')
                                ->orWhere('genero', 'LIKE', '%'.$_GET['s'].'%')
                                ->orWhere('fecha_hora', 'LIKE', '%'.$_GET['s'].'%');
            }
    
            $porPagina = 7; // Número de registros por página
            $infantils = $infantils->paginate($porPagina);        
            return view('lsttinfantil.index', compact('infantils'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('lsttinfantil.create');
        
    }

    public function formulario()
    {
        return view ('lsttinfantil.formulario');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $infantil = new TerapIainfantil;
        $infantil->tipo_documento = $request->tipo_documento;
        $infantil->numero_documento = $request->numero_documento;
        $infantil->nombres = $request->nombres;
        $infantil->apellidos = $request->apellidos;
        $infantil->telefono = $request->telefono;
        $infantil->especialidad = $request->especialidad;
        $infantil->genero = $request->genero;
        $infantil->fecha_hora = now(); 
        $infantil->estado = $request->estado; 

        if ($request->numero_documento == 'condicion') {
            $infantil->estado = 'Faltan Datos';
        } else {
            $infantil->estado = 'pendiente';
        }
            $infantil->save();
            return redirect()->back()->with('suscess', 'terapia infantil actualizado correctamente');
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
        $infantil = TerapiaInfantil::findOrFail($id);
        return view ('lsttinfantil.edit', compact('infantil'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $infantil = TerapiaInfantil::FindOrFail($id);
    $infantil->tipo_documento = $request->tipo_documento;
    $infantil->numero_documento = $request->numero_documento;
    $infantil->nombres = $request->nombres;
    $infantil->apellidos = $request->apellidos;
    $infantil->telefono = $request->telefono;
    $infantil->especialidad = $request->especialidad;
    $infantil->genero = $request->genero;
    $infantil->fecha_hora = now();
    $infantil->estado = $request->estado;
    $infantil->save();
    return redirect()->route('lsttinfantil.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $infantil = TerapiaInfantil::findOrFail($id);
        $infantil-> delete();
        return redirect()->route('lsttinfantil.index');
    }
}
