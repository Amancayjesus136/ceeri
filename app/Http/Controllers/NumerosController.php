<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReservarNumero;

class NumerosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $numeros = ReservarNumero::all();
        return view('inicio.reservarnumero', compact('numeros'));
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
        ReservarNumero::create($request->all());
        return redirect()->back()->with('suscess', 'Numeros registrado correctamente');
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
    public function edit(string $id_numero)
    {
        $numero = ReservarNumero::findOrFail($id_numero);
        return redirect()->back()->with('suscess', 'Numeros actualizado correctamente');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_numero)
    {
        $numero = ReservarNumero::findOrFail($id_numero);
        $numero->update($request->all());
        return redirect()->back()->with('suscess', 'Numeros editados correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_numero)
    {
        $numero = ReservarNumero::findOrFail($id_numero);
        $numero->delete();
        return redirect()->back()->with('suscess', 'Numeros eliminados correctamente');
    }
}
