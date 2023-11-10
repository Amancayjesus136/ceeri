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

class ReservaPrincipalController extends Controller
{

    public function create(Request $request)
    {
        $datos = $request->all();
        $numeros = ReservarNumero::all();
        $cita = ReservarCita::first();
        $conoceno = ConocemeMas::first();
        
        // Determina la especialidad seleccionada
        $especialidad = $request->input('especialidad');
        
        // En función de la especialidad, guarda los datos en la tabla correspondiente
        switch ($especialidad) {
            case 'Psicologia':
                Psicologia::create($datos);
                break;
            case 'Terapia fisica':
                TerapiaFisica::create($datos);
                break;
            case 'Terapia infantil':
                TerapiaInfantil::create($datos);
                break;
            case 'Terapia ocupacional':
                TerapiaOcupacional::create($datos);
                break;
            case 'Terapia lenguaje':
                TerapiaLenguaje::create($datos);
                break;
            default:
                // Manejar un caso no válido si es necesario
                break;
        }
        
        // Redirige o realiza alguna acción adicional después de guardar los datos
        return view('home.welcome', compact('numeros', 'cita', 'conoceno'));
    }
}

