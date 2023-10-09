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
        $lenguajes = TerapiaLenguaje::query();
        if (!empty($_GET['s'])) {
            $lenguajes = $lenguajes->where('id', 'LIKE', '%'.$_GET['s'].'%')
                                ->orWhere('tipo_documento', 'LIKE', '%'.$_GET['s'].'%')
                                ->orWhere('numero_documento', 'LIKE', '%'.$_GET['s'].'%')
                                ->orWhere('nombres', 'LIKE', '%'.$_GET['s'].'%')
                                ->orWhere('apellidos', 'LIKE', '%'.$_GET['s'].'%')
                                ->orWhere('telefono', 'LIKE', '%'.$_GET['s'].'%')
                                ->orWhere('especialidad', 'LIKE', '%'.$_GET['s'].'%')
                                ->orWhere('genero', 'LIKE', '%'.$_GET['s'].'%')
                                ->orWhere('fecha_hora', 'LIKE', '%'.$_GET['s'].'%');
            }
    
            $lenguajes = $lenguajes->get();
        return view('lsttlenguaje.index', compact('lenguajes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('lsttlenguaje.create');
        
    }

    public function formulario()
    {
        return view ('lsttlenguaje.formulario');

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
        $lenguaje->estado = $request->estado ; 

        if ($request->numero_documento == 'condicion') {
            $lenguaje->estado = 'Faltan Datos';
        } else {
            $lenguaje->estado = 'pendiente';
        }
        $lenguaje->save();
            return response()->json(['success' => true]);
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
