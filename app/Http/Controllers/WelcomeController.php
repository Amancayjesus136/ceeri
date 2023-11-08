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
        // Obtener los datos del formulario
        $tipoDocumento = $request->input('tipoDocumento');
        $numeroDocumento = $request->input('numeroDocumento');

        // Realizar consultas en las tablas individuales y seleccionar solo los campos tipo_documento y numero_documento
        $psicologia = DB::table('psicologia')->select('tipo_documento', 'numero_documento')
                    ->where('tipo_documento', $tipoDocumento)
                    ->where('numero_documento', $numeroDocumento)
                    ->first();

        $terapiaFisica = DB::table('terapia_fisica')->select('tipo_documento', 'numero_documento')
                        ->where('tipo_documento', $tipoDocumento)
                        ->where('numero_documento', $numeroDocumento)
                        ->first();

        $terapiaInfantil = DB::table('terapia_infantil')->select('tipo_documento', 'numero_documento')
                        ->where('tipo_documento', $tipoDocumento)
                        ->where('numero_documento', $numeroDocumento)
                        ->first();

        $terapiaLenguaje = DB::table('terapia_lenguaje')->select('tipo_documento', 'numero_documento')
                        ->where('tipo_documento', $tipoDocumento)
                        ->where('numero_documento', $numeroDocumento)
                        ->first();

        $terapiaOcupacional = DB::table('terapia_ocupacional')->select('tipo_documento', 'numero_documento')
                            ->where('tipo_documento', $tipoDocumento)
                            ->where('numero_documento', $numeroDocumento)
                            ->first();

        // Verificar en qué tabla existe el registro y devolver solo los datos de esa tabla
        if ($psicologia) {
            $resultados = ['psicologia' => $psicologia];
        } elseif ($terapiaFisica) {
            $resultados = ['terapia_fisica' => $terapiaFisica];
        } elseif ($terapiaInfantil) {
            $resultados = ['terapia_infantil' => $terapiaInfantil];
        } elseif ($terapiaLenguaje) {
            $resultados = ['terapia_lenguaje' => $terapiaLenguaje];
        } elseif ($terapiaOcupacional) {
            $resultados = ['terapia_ocupacional' => $terapiaOcupacional];
        } else {
            $resultados = []; // Si no se encuentra en ninguna tabla, devolver un arreglo vacío
        }

        // Devolver los resultados en formato JSON
        return response()->json($resultados);
    }

}
