<?php

namespace App\Http\Controllers;
use App\Models\ReservarCita;
use App\Models\ReservarNumero;
use App\Models\ConocemeMas;


use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $cita = ReservarCita::first();
        $conoceno = ConocemeMas::first();
        return view('home.welcome', compact('numeros', 'cita', 'conoceno'));
    }
}

