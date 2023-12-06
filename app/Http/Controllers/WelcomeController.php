<?php

namespace App\Http\Controllers;
use App\Models\ReservarCita;
use App\Models\ReservarNumero;
use App\Models\ConocemeMas;
use App\Models\Cliente;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $numeros = ReservarNumero::all();
        $cita = ReservarCita::first();
        $conoceno = ConocemeMas::first();
        return view('home.welcome', compact('numeros', 'cita', 'conoceno'));
    }

    public function consultadni(Request $request)
    {
        $numeroDocumento = $request->input('numeroDocumento');

        $resultados = [];

        $cliente = DB::table('cliente')
            ->select('tipo_documento', 'numero_documento', 'nombres', 'apellidos', 'fecha_hora', 'especialidad')
            ->where('numero_documento', $numeroDocumento)
            ->get();

        if (!$cliente->isEmpty()) {
            $resultados['cliente'] = $cliente;
        }

        return response()->json($resultados);
    }


}