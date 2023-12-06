<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Models\Psicologia;
use App\Models\ReservarCita;
use App\Models\ReservarNumero;
use App\Models\ConocemeMas;
use App\Models\TerapiaFisica;
use App\Models\TerapiaInfantil;
use App\Models\TerapiaOcupacional;
use App\Models\TerapiaLenguaje;
use App\Models\Cliente;


class ReservaPrincipalController extends Controller
{

    public function create(Request $request)
    {
        $cliente = new Cliente;
            $cliente->tipo_documento = $request->tipo_documento;
            $cliente->especialidad = $request->especialidad;
            $cliente->numero_documento = $request->numero_documento;
            $cliente->nombres = $request->nombres;
            $cliente->apellidos = $request->apellidos;
            $cliente->telefono = $request->telefono;
            $cliente->genero = $request->genero;
            $cliente->fecha_hora = $request->fecha_hora; 
            $cliente->estado = 'pendiente'; 
            
            $cliente->save();
            return redirect()->back()->with('success', 'Registro almacenado correctamente');
        
        // Redirige o realiza alguna acción adicional después de guardar los datos

    }
}

