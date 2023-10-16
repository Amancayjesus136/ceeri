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
use App\Http\Controllers\SeleccionarController;
use App\Http\Controllers\ConsultarController;
use App\Http\Controllers\ReservaPrincipalController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\MenuUsuarioController;

use Illuminate\Support\Facades\Route;

// Ruta para la página de inicio
Route::get('/', [WelcomeController::class, 'index']);


//Configuracion Menú

Route::get('/menu', [WelcomeController::class, 'index'])->name('home.welcome');

Route::get('/inicio', [MenuUsuarioController::class, 'index'])->name('inicio.reservarcita');   
Route::put('/inicio/editar_reservarcita/{id}', [MenuUsuarioController::class, 'editar_reservarcita'])->name('inicio.editar_reservarcita');

Route::get('/numero', [MenuUsuarioController::class, 'create'])->name('inicio.reservarnumero');   
Route::put('/numero/editar_numero/{id}', [MenuUsuarioController::class, 'editar_numero'])->name('numero.editar_numero');







//ruta para el formulario de registro de la pagina principal
Route::post('/', [ReservaPrincipalController::class, 'create'])->name('registroPrincipal');
Route::post('/consultar', [ConsultarController::class, 'consultar'])->name('consultar');


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

    // RUTAS DE FORMULARIO PRINCIPAL
    Route::resource('seleccionar', SeleccionarController::class);


    //rutas para listado de los formularios
    Route::resource('lstpsicologia', ListadoPsicologiaController::class);
    Route::get('/formulario', [ListadoPsicologiaController::class, 'formulario'])->name('lstpsicologia.formulario');
    Route::post('/actualizar-estado', 'PsicologiaController@actualizarEstado')->name('actualizar.estado');

    Route::resource('lsttfisica', ListadoTerapiaFisicaController::class);
    Route::get('/formulariofisica', [ListadoTerapiaFisicaController::class, 'formulario'])->name('lsttfisica.formulario');

    Route::resource('lsttinfantil', ListadoTerapiaInfantilController::class);
    Route::get('/formularioinfantil', [ListadoTerapiaInfantilController::class, 'formulario'])->name('lsttinfantil.formulario');

    Route::resource('lsttlenguaje', ListadoTerapiaLenguajeController::class);
    Route::get('/formulariolenguaje', [ListadoTerapiaLenguajeController::class, 'formulario'])->name('lsttlenguaje.formulario');

    Route::resource('lsttocupacional', ListadoTerapiaOcupacionalController::class);
    Route::get('/formularioocupacional', [ListadoTerapiaOcupacionalController::class, 'formulario'])->name('lsttocupacional.formulario');
    


   




    



});

// Ruta para la autenticación
require __DIR__.'/auth.php';
