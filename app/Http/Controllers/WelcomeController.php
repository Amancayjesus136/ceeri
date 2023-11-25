<?php

namespace App\Http\Controllers;
use App\Models\ReservarCita;
use App\Models\ReservarNumero;
use App\Models\ConocemeMas;
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

        $psicologia = DB::table('psicologia')
            ->select('tipo_documento', 'numero_documento', 'nombres', 'apellidos', 'fecha_hora')
            ->where('numero_documento', $numeroDocumento)
            ->get();

        $terapiaFisica = DB::table('terapia_fisica')
            ->select('tipo_documento', 'numero_documento', 'nombres', 'apellidos', 'fecha_hora')
            ->where('numero_documento', $numeroDocumento)
            ->get();

        $terapiaInfantil = DB::table('terapia_infantil')
            ->select('tipo_documento', 'numero_documento', 'nombres', 'apellidos', 'fecha_hora')
            ->where('numero_documento', $numeroDocumento)
            ->get();

        $terapiaLenguaje = DB::table('terapia_lenguaje')
            ->select('tipo_documento', 'numero_documento', 'nombres', 'apellidos', 'fecha_hora')
            ->where('numero_documento', $numeroDocumento)
            ->get();

        $terapiaOcupacional = DB::table('terapia_ocupacional')
            ->select('tipo_documento', 'numero_documento', 'nombres', 'apellidos', 'fecha_hora')
            ->where('numero_documento', $numeroDocumento)
            ->get();

        if (!$psicologia->isEmpty()) {
            $resultados['psicologia'] = $psicologia;
        }
        if (!$terapiaFisica->isEmpty()) {
            $resultados['terapia_fisica'] = $terapiaFisica;
        }
        if (!$terapiaInfantil->isEmpty()) {
            $resultados['terapia_infantil'] = $terapiaInfantil;
        }
        if (!$terapiaLenguaje->isEmpty()) {
            $resultados['terapia_lenguaje'] = $terapiaLenguaje;
        }
        if (!$terapiaOcupacional->isEmpty()) {
            $resultados['terapia_ocupacional'] = $terapiaOcupacional;
        }

        return response()->json($resultados);
    }


}