<?php
// Suponiendo que ya tienes un modelo Cliente que representa la tabla cliente

use App\Models\Cliente;
use App\Models\User;

// Consulta para obtener el número de filas en la tabla cliente
$numFilas = Cliente::count();
$numFilas = User::count();
$totalFilas = Cliente::count();


// Consulta para obtener el número de filas en la tabla cliente con estado "cumplido" y pendiente
$numFilasCumplido = Cliente::where('estado', 'cumplido')->count();
$numFilasPendiente = Cliente::where('estado', 'pendiente')->count();

// Obtener el número de filas para cada especialidad
$numFilasPsicologia = Cliente::where('especialidad', 'Psicologia')->count();
$numFilasTerapiaFisica = Cliente::where('especialidad', 'Terapia fisica')->count();
$numFilasTerapiaInfantil = Cliente::where('especialidad', 'Terapia infantil')->count();
$numFilasTerapiaOcupacional = Cliente::where('especialidad', 'Terapia ocupacional')->count();
$numFilasTerapiaLenguaje = Cliente::where('especialidad', 'Terapia de lenguaje')->count();

// Calcular el porcentaje para cada especialidad
$porcentajePsicologia = ($totalFilas != 0) ? ($numFilasPsicologia / $totalFilas) * 100 : 0;
$porcentajeTerapiaFisica = ($totalFilas != 0) ? ($numFilasTerapiaFisica / $totalFilas) * 100 : 0;
$porcentajeTerapiaInfantil = ($totalFilas != 0) ? ($numFilasTerapiaInfantil / $totalFilas) * 100 : 0;
$porcentajeTerapiaOcupacional = ($totalFilas != 0) ? ($numFilasTerapiaOcupacional / $totalFilas) * 100 : 0;
$porcentajeTerapiaLenguaje = ($totalFilas != 0) ? ($numFilasTerapiaLenguaje / $totalFilas) * 100 : 0;

?>

@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Inicio</h4>

            <div class="page-title-right">
                
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

<!-- COLUMNAS -->
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <p class="text-muted mb-4">
                    {{ __("Bienvenido a CEERI!") }}
                </p>
            </div><!-- end card-body -->
        </div><!-- end card -->
    </div><!-- end col -->
</div><!-- end row -->

                <div class="row">              
                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body" style="border: 2px; border-style: solid; border-radius: 5px;">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Numero de citas totales</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo number_format($numFilas, 0, '.', ','); ?></div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-book fa-2x text-gray-300"></i>
 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body" style="border: 2px; border-style: solid; border-radius: 5px;">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">cuentas en el sistema</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo number_format($numFilas, 0, '.', ','); ?></div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-address-book fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body" style="border: 2px; border-style: solid; border-radius: 5px;">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Cantidad de citas cumplidas</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo number_format($numFilasCumplido, 0, '.', ','); ?></div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-check-square fa-2x text-gray-300"></i>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                 
                    <!-- Pending Requests Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-warning shadow h-100 py-2">
                            <div class="card-body" style="border: 2px; border-style: solid; border-radius: 5px;">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Cantidad de citas pendientes</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo number_format($numFilasPendiente, 0, '.', ','); ?></div>
                                    </div>
                                    <div class="col-auto">
                                    <i class="fas fa-question-circle fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Content Row -->
                    <div class="row">

                        <!-- Content Column -->
                        <div class="col-lg-6 mb-4">

                            <!-- Project Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Porcentaje de especialidades en las citas registradas</h6>
                                </div>
                                <div class="card-body">
                                    <h4 class="small font-weight-bold">Psicología <span class="float-right"><?php echo number_format($porcentajePsicologia, 2) . '%'; ?></span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: <?php echo $porcentajePsicologia; ?>%" aria-valuenow="<?php echo $porcentajePsicologia; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    
                                    <h4 class="small font-weight-bold">Terapia Física <span class="float-right"><?php echo number_format($porcentajeTerapiaFisica, 2) . '%'; ?></span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo $porcentajeTerapiaFisica; ?>%" aria-valuenow="<?php echo $porcentajeTerapiaFisica; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>

                                    <h4 class="small font-weight-bold">Terapia Infantil <span class="float-right"><?php echo number_format($porcentajeTerapiaInfantil, 2) . '%'; ?></span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar" role="progressbar" style="width: <?php echo $porcentajeTerapiaInfantil; ?>%" aria-valuenow="<?php echo $porcentajeTerapiaInfantil; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>

                                    <h4 class="small font-weight-bold">Terapia Ocupacional <span class="float-right"><?php echo number_format($porcentajeTerapiaOcupacional, 2) . '%'; ?></span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: <?php echo $porcentajeTerapiaOcupacional; ?>%" aria-valuenow="<?php echo $porcentajeTerapiaOcupacional; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>

                                    <h4 class="small font-weight-bold">Terapia de Lenguaje <span class="float-right"><?php echo number_format($porcentajeTerapiaLenguaje, 2) . '%'; ?></span></h4>
                                    <div class="progress">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $porcentajeTerapiaLenguaje; ?>%" aria-valuenow="<?php echo $porcentajeTerapiaLenguaje; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>

                            <!-- Color System -->
                            <div class="row">
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-primary text-black shadow">
                                        <div class="card-body">
                                            Citas con Psicologia
                                            <div class="text-black-50 small"><?php echo number_format($numFilasPsicologia, 0, '.', ','); ?></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-success text-black shadow">
                                        <div class="card-body">
                                        Citas con Terapia fisica
                                            <div class="text-black-50 small"><?php echo number_format($numFilasTerapiaFisica, 0, '.', ','); ?></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-info text-black shadow">
                                        <div class="card-body">
                                        Citas con Terapia infantil
                                            <div class="text-black-50 small"><?php echo number_format($numFilasTerapiaInfantil, 0, '.', ','); ?></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-warning text-black shadow">
                                        <div class="card-body">
                                        Citas con Terapia ocupacional
                                            <div class="text-black-50 small"><?php echo number_format($numFilasTerapiaOcupacional, 0, '.', ','); ?></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-danger text-black shadow">
                                        <div class="card-body">
                                        Citas con Terapia de lenguaje
                                            <div class="text-black-50 small"><?php echo number_format($numFilasTerapiaLenguaje, 0, '.', ','); ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>          
                    </div>
                </div>  
@endsection


