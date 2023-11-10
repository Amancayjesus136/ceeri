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
            ->first();

        $terapiaFisica = DB::table('terapia_fisica')
            ->select('tipo_documento', 'numero_documento', 'nombres', 'apellidos', 'fecha_hora')
            ->where('numero_documento', $numeroDocumento)
            ->first();

        $terapiaInfantil = DB::table('terapia_infantil')
            ->select('tipo_documento', 'numero_documento', 'nombres', 'apellidos', 'fecha_hora')
            ->where('numero_documento', $numeroDocumento)
            ->first();

        $terapiaLenguaje = DB::table('terapia_lenguaje')
            ->select('tipo_documento', 'numero_documento', 'nombres', 'apellidos', 'fecha_hora')
            ->where('numero_documento', $numeroDocumento)
            ->first();

        $terapiaOcupacional = DB::table('terapia_ocupacional')
            ->select('tipo_documento', 'numero_documento', 'nombres', 'apellidos', 'fecha_hora')
            ->where('numero_documento', $numeroDocumento)
            ->first();

        if ($psicologia) {
            $resultados['psicologia'] = $psicologia;
        }
        if ($terapiaFisica) {
            $resultados['terapia_fisica'] = $terapiaFisica;
        }
        if ($terapiaInfantil) {
            $resultados['terapia_infantil'] = $terapiaInfantil;
        }
        if ($terapiaLenguaje) {
            $resultados['terapia_lenguaje'] = $terapiaLenguaje;
        }
        if ($terapiaOcupacional) {
            $resultados['terapia_ocupacional'] = $terapiaOcupacional;
        }

        if (empty($resultados)) {
            // No se encontraron resultados
            return redirect()->back()->with('error', 'No se encontraron resultados para el número de documento proporcionado.');
        }

        // Si hay resultados, almacenar el mensaje en la sesión y redirigir a la vista
        session()->flash('success', 'Consulta realizada exitosamente');
        session()->flash('resultados', $resultados);

        return redirect()->back()->with('success', 'Consulta realizada exitosamente')->with('resultados', $resultados);
    }

}
