<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Psicologia;
use App\Models\TerapiaFisica;
use App\Models\TerapiaInfantil;
use App\Models\TerapiaLenguaje;
use App\Models\TerapiaOcupacional;

class ConsultarController extends Controller
{
    /**
     * Muestra el formulario de consulta.
     */
    public function index()
    {
        return view('welcome');
    }
    
    /**
     * Realiza la consulta según el tipo de documento y número de documento.
     */
    public function consultar(Request $request)
    {
        $tipoDocumento = trim($request->input('tipo_documento'));
        $numeroDocumento = trim($request->input('numero_documento'));

        // Realizar la consulta en cada tabla
        $psicologiaResult = Psicologia::where('tipo_documento', $tipoDocumento)
            ->where('numero_documento', $numeroDocumento)
            ->first();

        $terapiaFisicaResult = TerapiaFisica::where('tipo_documento', $tipoDocumento)
            ->where('numero_documento', $numeroDocumento)
            ->first();

        $terapiaInfantilResult = TerapiaInfantil::where('tipo_documento', $tipoDocumento)
            ->where('numero_documento', $numeroDocumento)
            ->first();

        $terapiaLenguajeResult = TerapiaLenguaje::where('tipo_documento', $tipoDocumento)
            ->where('numero_documento', $numeroDocumento)
            ->first();

        $terapiaOcupacionalResult = TerapiaOcupacional::where('tipo_documento', $tipoDocumento)
            ->where('numero_documento', $numeroDocumento)
            ->first();

        return response()->json([
            'psicologiaResult' => $psicologiaResult,
            'terapiaFisicaResult' => $terapiaFisicaResult,
            'terapiaInfantilResult' => $terapiaInfantilResult,
            'terapiaLenguajeResult' => $terapiaLenguajeResult,
            'terapiaOcupacionalResult' => $terapiaOcupacionalResult,
        ]);
    }
}
