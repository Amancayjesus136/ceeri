<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\profile;
use Illuminate\Support\Facades\Storage;

class PerfilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();

        return view('perfil.index', compact('user'));
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = auth()->user();

        return view('perfil.edit', compact('user'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::FindOrFail($id);
        $user->name = $request->name;
        $user->descripcion = $request->descripcion;
        $user->telefono = $request->telefono;
        if ($request->hasFile('foto')) {
            $imagen = $request->file('foto');
            if ($user->foto) {
                Storage::delete('public/assets/images/' . $user->foto);
            }
            // Guarda la imagen en la ruta específica
            $nombre_imagen = time() . '_' . $imagen->getClientOriginalName();
            $path = 'public/assets/images/' . $nombre_imagen;

            Storage::put($path, file_get_contents($imagen));
    
            // Actualiza el campo 'foto' en la base de datos con el nombre de la imagen
            $user->foto = $nombre_imagen;
        }
    
        $user->save();
        return redirect()->route('perfil.index')->with('successEdit', 'Su perfil se ha editado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
