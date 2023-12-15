<?php
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EventosController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ListadoUsuarioController;

use App\Http\Controllers\ClientesController;
use App\Http\Controllers\CitashoyController;

use App\Http\Controllers\SeleccionarController;
use App\Http\Controllers\footerPagesController;
use App\Http\Controllers\ConsultarController;
use App\Http\Controllers\ReservaPrincipalController;
use App\Http\Controllers\ReservaInternaController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\MenuUsuarioController;
use App\Http\Controllers\NumerosController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PerfilesController;
use App\Http\Controllers\ReporteController;



use Illuminate\Support\Facades\Route;

// Ruta para la página de inicio

Route::get('/', [WelcomeController::class, 'index'])->name('home.welcome');


//Configuracion Menú

Route::get('/menu', [WelcomeController::class, 'index'])->name('home.welcome');

Route::get('/inicio', [MenuUsuarioController::class, 'reservarcita'])->name('inicio.reservarcita');   
Route::put('/inicio/editar_reservarcita/{id}', [MenuUsuarioController::class, 'editar_reservarcita'])->name('inicio.editar_reservarcita');

Route::resource('numeros', NumerosController::class, ['names' => ['index' => 'inicio.reservarnumero']]);

Route::get('/conocenos', [MenuUsuarioController::class, 'conocememas'])->name('inicio.conocememas');   
Route::put('/conocenos/editar_conocenos/{id}', [MenuUsuarioController::class, 'editar_conocenos'])->name('inicio.editar_conocenos');

Route::resource('imagen', ImagenCeeriController::class, ['names' => ['index' => 'inicio.imagenceeri']]);

Route::post('/consultadni', [WelcomeController::class, 'consultadni'])->name('consultadni');

//rutas para las politicas y privacidad , terminos y condiciones , seguridad

Route::get('/politicas-privacidad', [footerPagesController::class, 'politicas'])->name('politicas');   
Route::get('/terminos-condiciones', [footerPagesController::class, 'condiciones'])->name('condiciones');   
Route::get('/seguridad', [footerPagesController::class, 'seguridad'])->name('seguridad');   

Route::get('/descargar-pdf', function () {
    return response()->download('Politicasdeprivacidad', 'Politicasdeprivacidad');
});

//ruta para el formulario de registro de la pagina principal
Route::post('registroPrincipal', [ReservaPrincipalController::class, 'create'])->name('registroPrincipal');

// Rutas protegidas por el middleware de autenticación y verificación
Route::middleware(['auth', 'verified'])->group(function () {
    // Ruta para el dashboard

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


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

    //reserva interna de la citas
    Route::post('/', [ReservaInternaController::class, 'create'])->name('registroInterno');

    



    //rutas para listado de los formularios
    Route::resource('Clientes', ClientesController::class);
    
    Route::post('/actualizar-estado', 'PsicologiaController@actualizarEstado')->name('actualizar.estado');



    // rutas de perfil 
    Route::resource('perfil', PerfilController::class);

    Route::resource('perfiles', PerfilesController::class);
    Route::get('/editar', [PerfilesController::class, 'editar'])->name('editar.edit');

    Route::resource('reportes', ReporteController::class);
    Route::resource('Citas-hoy', CitashoyController::class);






});

// Ruta para la autenticación
require __DIR__.'/auth.php';
