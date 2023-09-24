<?php
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EventosController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ListadoUsuarioController;

use App\Http\Controllers\PsicologiaController;
use App\Http\Controllers\TerapiaFisicaController;
use App\Http\Controllers\TerapiaLenguajeController;
use App\Http\Controllers\TerapiaOcupacionalController;
use App\Http\Controllers\TerapiaInfantilController;








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
    
    Route::resource('psicologia', PsicologiaController::class);
    Route::resource('terapiafisica', TerapiaFisicaController::class);
    Route::resource('terapialenguaje', TerapiaLenguajeController::class);
    Route::resource('terapiaocupacional', TerapiaOcupacionalController::class);
    Route::resource('terapiainfantil', TerapiaInfantilController::class);

    



    

    

    




    


    







    

    

    
    

































    





    
    // // Rutas para la administración de publicacion de eventos usando 'resource'
    // Route::resource('publicacion', PublicacionController::class);

    // // Rutas para la administración de tipo de eventos usando 'resource'
    // Route::resource('tipoevento', TipoEventoController::class);

    // // Rutas para la administración de contenido de eventos usando 'resource'
    // Route::resource('contenidoeventos', ContenidoEventoController::class);

    // Route::resource('publicaciones', 'PublicacionEventoController');


    


});

// Ruta para la autenticación
require __DIR__.'/auth.php';
