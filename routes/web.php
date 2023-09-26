<?php
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EventosController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ListadoUsuarioController;

use App\Http\Controllers\ListadoPsicologiaController;
use App\Http\Controllers\ListadoTerapiaFisicaController;
use App\Http\Controllers\ListadoTerapiaInfantilController;
use App\Http\Controllers\ListadoTerapiaLenguajeController;
use App\Http\Controllers\ListadoTerapiaOcupacionalController;














use Illuminate\Support\Facades\Route;

// Ruta para la página de inicio
Route::get('/', function () {
    return view('welcome');
});


// Rutas protegidas por el middleware de autenticación y verificación
Route::middleware(['auth', 'verified'])->group(function () {
    // Ruta para el dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Rutas para Modulo de alumno 'Certificados'
    Route::get('/listado-eventos', function () {
        return view('ModuloAlumno.listado');
    })->name('listado.eventos');
    
    
    // Rutas para el perfil de usuario
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        Route::resource('listado', ListadoUsuarioController::class);
    
      

        //rutas para listado de los formularios
    Route::resource('lstpsicologia', ListadoPsicologiaController::class);
    Route::get('/formulario', [ListadoPsicologiaController::class, 'formulario'])->name('lstpsicologia.formulario');

    Route::resource('lsttfisica', ListadoTerapiaFisicaController::class);
    Route::get('/formulariofisica', [ListadoTerapiaFisicaController::class, 'formulario'])->name('lsttfisica.formulario');

    Route::resource('lsttinfantil', ListadoTerapiaInfantilController::class);
    Route::get('/formularioinfantil', [ListadoTerapiaInfantilController::class, 'formulario'])->name('lsttinfantil.formulario');



    Route::resource('lsttlenguaje', ListadoTerapiaLenguajeController::class);
    Route::get('/formulariolenguaje', [ListadoTerapiaLenguajeController::class, 'formulario'])->name('lsttlenguaje.formulario');



    Route::resource('lsttocupacional', ListadoTerapiaOcupacionalController::class);
    Route::get('/formularioocupacional', [ListadoTerapiaLenguajeOcupacionalController::class, 'formulario'])->name('lsttocupacional.formulario');




});

// Ruta para la autenticación
require __DIR__.'/auth.php';
