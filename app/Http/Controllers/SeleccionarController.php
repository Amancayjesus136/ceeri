<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cliente;

class SeleccionarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = Cliente::query();
        if (!empty($_GET['s'])) {
            $clientes = $clientes->where('id', 'LIKE', '%'.$_GET['s'].'%')
                ->orWhere('especialidad', 'LIKE', '%'.$_GET['s'].'%')
                ->orWhere('tipo_documento', 'LIKE', '%'.$_GET['s'].'%')
                ->orWhere('numero_documento', 'LIKE', '%'.$_GET['s'].'%')
                ->orWhere('nombres', 'LIKE', '%'.$_GET['s'].'%')
                ->orWhere('apellidos', 'LIKE', '%'.$_GET['s'].'%')
                ->orWhere('telefono', 'LIKE', '%'.$_GET['s'].'%')
                ->orWhere('especialidad', 'LIKE', '%'.$_GET['s'].'%')
                ->orWhere('fecha_hora', 'LIKE', '%'.$_GET['s'].'%');
        }
        $clientes = $clientes->get();
        return view('seleccionar.index', compact('clientes',));
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
    public function show($id)
    {
        $cliente = Cliente::find($id);

        if (!$cliente) {
            abort(404); 
        }
        return view('clientes.show', compact('cliente'));
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
