<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;


class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = Cliente::query();
    
        if (!empty($_GET['s'])) {
            $searchTerm = $_GET['s'];
            $clientes->where(function($query) use ($searchTerm) {
                $query->where('id', 'LIKE', "%$searchTerm%")
                    ->orWhere('especialidad', 'LIKE', "%$searchTerm%")
                    ->orWhere('tipo_documento', 'LIKE', "%$searchTerm%")
                    ->orWhere('numero_documento', 'LIKE', "%$searchTerm%")
                    ->orWhere('nombres', 'LIKE', "%$searchTerm%")
                    ->orWhere('apellidos', 'LIKE', "%$searchTerm%")
                    ->orWhere('telefono', 'LIKE', "%$searchTerm%")
                    ->orWhere('fecha_hora', 'LIKE', "%$searchTerm%");
            });
        }
    
        if (!empty($_GET['specialty'])) {
            $clientes->where('especialidad', $_GET['specialty']);
        }
    
        $porPagina = 50;
        $clientes = $clientes->paginate($porPagina);
    
        return view('Clientes.index', compact('clientes'));
    }
    
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view ('Clientes.create');

    }
    public function formulario()
    {
        return view ('Clientes.formulario');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            $cliente = new Cliente;
            $cliente->tipo_documento = $request->tipo_documento;
            $cliente->especialidad = $request->especialidad;
            $cliente->numero_documento = $request->numero_documento;
            $cliente->nombres = $request->nombres;
            $cliente->apellidos = $request->apellidos;
            $cliente->telefono = $request->telefono;
            $cliente->fecha_hora = $request->fecha_hora; 
            $cliente->genero = $request->genero; 
            $cliente->estado = 'pendiente'; 
            
            $cliente->save();
            return redirect()->back()->with('success', 'Registro almacenado correctamente');
        }

    public function actualizarEstado(Request $request) {
        $cliente = Cliente::FindOrFail($id);
        $cliente->estado = $request->estado;

        $cliente->save();
    return redirect()->route('Clientes.index');
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
        $cliente = Cliente::findOrFail($id);
        return view ('Clientes.edit', compact('psicologia'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
    $cliente = Cliente::FindOrFail($id);
    $cliente->tipo_documento = $request->tipo_documento;
    $cliente->numero_documento = $request->numero_documento;
    $cliente->nombres = $request->nombres;
    $cliente->apellidos = $request->apellidos;
    $cliente->telefono = $request->telefono;
    $cliente->especialidad = $request->especialidad;
    $cliente->genero = $request->genero;
    $cliente->fecha_hora = $request->fecha_hora; 
    $cliente->estado = $request->estado;

    $cliente->save();
    return redirect()->back()->with('successEdit', 'Registro editado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente-> delete();
        return redirect()->route('Clientes.index');
    }
}
