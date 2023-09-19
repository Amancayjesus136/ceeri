<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserva;
use Illuminate\Support\Carbon;
use App\Models\HoraReservada;


class FormularioUsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('formulario.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */

     // ...

     public function store(Request $request)
{
    // Obtener la fecha y hora seleccionadas desde el formulario
    $fecha_hora = $request->input('fecha_hora');

    // Verificar si la fecha y hora ya están reservadas
    $horaReservadaExistente = HoraReservada::where('fecha_hora', $fecha_hora)->first();

    if ($horaReservadaExistente) {
        return redirect()->back()->with('error', 'La hora seleccionada ya está reservada.');
    }

    // Si la hora no está reservada, procede a guardar la reserva
    $reserva = new Reserva;
    $reserva->tipo_documento = $request->tipo_documento;
    $reserva->numero_documento = $request->numero_documento;
    $reserva->nombres = $request->nombres;
    $reserva->apellidos = $request->apellidos;
    $reserva->telefono = $request->telefono;
    $reserva->especialidad = $request->especialidad;
    $reserva->genero = $request->genero;
    $reserva->fecha_hora = Carbon::parse($fecha_hora);

    $reserva->save();

    // Marcar la hora como reservada en la tabla de horas reservadas
    $horaReservada = new HoraReservada;
    $horaReservada->fecha_hora = $fecha_hora;
    $horaReservada->save();

    return redirect()->route('formulario.index')->with('success', 'Reserva creada correctamente.');
}
// ...


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
