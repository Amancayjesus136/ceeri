<?php

namespace App\Http\Controllers;
use App\Models\ReservarCita;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $contenido = ReservarCita::first();
        return view('home.welcome', compact('contenido'));
    }
}
