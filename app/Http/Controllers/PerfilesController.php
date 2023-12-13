<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\profile;
use Illuminate\Support\Facades\Storage;

class PerfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        return view('vista_perfil.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function editar()
    {
        $user = auth()->user();
        return view('vista_perfil.edit', compact('user'));
    }

    /**
     * Store a newly created resource idOn storage.
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
        $user = User::findOrFail($id);
        return view('vista_perfil.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::FindOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->descripcion = $request->descripcion;
        $user->telefono = $request->telefono;
        $user->cumpleanos = $request->cumpleanos;
        $user->facebook = $request->facebook;
        $user->instagram = $request->instagram;
        $user->wsp = $request->wsp;
        $user->twitter = $request->twitter;
        if ($request->hasFile('foto')) {
            $imagen = $request->file('foto');
            if ($user->foto) {
                Storage::delete('public/assets/images/' . $user->foto);
            }
            $nombre_imagen = time() . '_' . $imagen->getClientOriginalName();
            $path = 'public/assets/images/' . $nombre_imagen;
            Storage::put($path, file_get_contents($imagen));
            $user->foto = $nombre_imagen;
        }
    
        $user->save();
        return redirect()->route('perfiles.index')->with('successEdit', 'Su perfil se ha editado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
