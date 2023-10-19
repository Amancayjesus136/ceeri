<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CeeriImagen;


class ImagenCeeriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $imagen = CeeriImagen::all();
        return view ('inicio.imagenceeri', compact ('imagen'));
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
        CeeriImagen::create($request->all());
        return redirect()->back()->with('suscess', 'Imagen registrado correctamente');
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
