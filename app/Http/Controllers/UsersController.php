<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DatosUsuario;
use App\Models\UserData;
use App\Models\User;

use DB;

class UsersController extends Controller
{
    public function sing()
    {
        return view("users.sing-in");
    }

    public function registrarUsers()
    {
        return view('Users.registrarUsers');
    }
    public function Star()
    {
        $users = user::get();
        return view('listadoUsers', compact('listadoUser'));
    }

    public function listadoUsers()
    {
        $users = DatosUsuario::all(); // Obtener todos los usuarios desde la base de datos

        return view('Users.listadoUsers', compact('users'));
    }

    public function store(Request $request)
    {
        DatosUsuario::create([
            'dni' => $request->input('dni'),
            'codigo_trabajador' => $request->input('codigo_trabajador'),
            'nombres' => $request->input('nombres'),
            'apellido_paterno' => $request->input('apellido_paterno'),
            'apellido_materno' => $request->input('apellido_materno'),
            'sexo' => $request->input('sexo'),
            'fecha_nacimiento' => $request->input('fecha_nacimiento'),
            'edad' => $request->input('edad'),
            'estado_civil' => $request->input('estado_civil'),
            'nacionalidad' => $request->input('nacionalidad'),
            'otra_nacionalidad' => $request->input('otra_nacionalidad'),
            'procedencia' => $request->input('procedencia'),
            'condicion_laboral' => $request->input('condicion_laboral'),
            'region_laboral' => $request->input('region_laboral'),
            'cargo' => $request->input('cargo'),
            'unidad' => $request->input('unidad'),
            'oficina' => $request->input('oficina'),
            'correo_corporativo' => $request->input('correo_corporativo'),
            'correo_personal' => $request->input('correo_personal'),
            'profesiones' => $request->input('profesiones'),
            'fecha_ingreso' => $request->input('fecha_ingreso'),
            'fecha_cese' => $request->input('fecha_cese')
        ]);

        return redirect()->route('usuarios.listado');
    }

    public function edit($id)
    {
        $user = DatosUsuario::findOrFail($id);
        return view('Users.editarUser', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = DatosUsuario::findOrFail($id);
        
// ============================================================== -->
// ACTUALIZA LOS DATOS DEL USUARIO -->
// ============================================================== --> 
        $user->update($request->all());

// ============================================================== -->
// REDIRIGE A LA PAGINA DE LISTADO O A DONDE DESEES-->
// ============================================================== --> 
        return redirect()->route('usuarios.listado');
    }

    public function destroy($id)
    {
        $user = DatosUsuario::findOrFail($id);
        
// ============================================================== -->
// ELIMINAR EL USUARIO -->
// ============================================================== --> 
        $user->delete();
        return redirect()->route('usuarios.listado');
    }
}
