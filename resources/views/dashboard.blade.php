<?php
// Suponiendo que ya tienes un modelo Cliente que representa la tabla cliente

use App\Models\Cliente;
use App\Models\User;

// Consulta para obtener el número de filas en la tabla cliente
$clienteFilas = Cliente::count();
$userFilas = User::count();
$totalFilas = Cliente::count();


// Consulta para obtener el número de filas en la tabla cliente con estado "cumplido" y pendiente
$clienteFilasCumplido = Cliente::where('estado', 'cumplido')->count();
$clienteFilasPendiente = Cliente::where('estado', 'pendiente')->count();

// Obtener el número de filas para cada especialidad
$clienteFilasPsicologia = Cliente::where('especialidad', 'Psicologia')->count();
$clienteFilasTerapiaFisica = Cliente::where('especialidad', 'Terapia fisica')->count();
$clienteFilasTerapiaInfantil = Cliente::where('especialidad', 'Terapia infantil')->count();
$clienteFilasTerapiaOcupacional = Cliente::where('especialidad', 'Terapia ocupacional')->count();
$clienteFilasTerapiaLenguaje = Cliente::where('especialidad', 'Terapia lenguaje')->count();

// Calcular el porcentaje para cada especialidad
$porcentajePsicologia = ($totalFilas != 0) ? ($clienteFilasPsicologia / $totalFilas) * 100 : 0;
$porcentajeTerapiaFisica = ($totalFilas != 0) ? ($clienteFilasTerapiaFisica / $totalFilas) * 100 : 0;
$porcentajeTerapiaInfantil = ($totalFilas != 0) ? ($clienteFilasTerapiaInfantil / $totalFilas) * 100 : 0;
$porcentajeTerapiaOcupacional = ($totalFilas != 0) ? ($clienteFilasTerapiaOcupacional / $totalFilas) * 100 : 0;
$porcentajeTerapiaLenguaje = ($totalFilas != 0) ? ($clienteFilasTerapiaLenguaje / $totalFilas) * 100 : 0;

?>

@extends('layouts.admin')
@extends('layouts.footer')

@section('content')

<div class="h-100">
    <div class="row mb-3 pb-1">
        <div class="col-12">
            <div class="d-flex align-items-lg-center flex-lg-row flex-column">
                <div class="flex-grow-1">
                    <h4 class="fs-16 mb-1">Bienvenido, {{ $user->name }}!</h4>
                    <p class="text-muted mb-0">Esto es lo que está sucediendo con su sistema hoy.</p>
                </div>
                <div class="mt-3 mt-lg-0">
                    <form action="javascript:void(0);">
                        <div class="row g-3 mb-0 align-items-center">
                            <div class="col-sm-auto">
                                <div class="input-group">
                                <input type="text" class="form-control border-0 dash-filter-picker shadow" data-provider="flatpickr" data-range-date="true" data-date-format="d M, Y h:i K" data-default-date="01 Jan 2022 to 31 Jan 2022" id="fechaInput">
                                    <div class="input-group-text bg-primary border-primary text-white">
                                        <i class="ri-calendar-2-line"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card card-animate">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1 overflow-hidden">
                            <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Número de citas totales</p>
                        </div>
                        <div class="flex-shrink-0">
                            <h5 class="text-success fs-14 mb-0">
                                <i class="ri-arrow-right-up-line fs-13 align-middle"></i>
                            </h5>
                        </div>
                    </div>
                    <div class="d-flex align-items-end justify-content-between mt-4">
                        <div>
                            <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value" data-target="<?php echo number_format($clienteFilas, 0, '.', ','); ?>">0</span></h4>
                        </div>
                        <div class="avatar-sm flex-shrink-0">
                            <span class="avatar-title bg-soft-info rounded fs-3">
                                <i class="fas fa-list-ol text-info"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card card-animate">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1 overflow-hidden">
                            <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Cuentas de Sistema</p>
                        </div>
                        <div class="flex-shrink-0">
                            <h5 class="text-danger fs-14 mb-0">
                                <i class="ri-arrow-right-down-line fs-13 align-middle"></i> 
                            </h5>
                        </div>
                    </div>
                    <div class="d-flex align-items-end justify-content-between mt-4">
                        <div>
                            <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value" data-target="<?php echo number_format($userFilas, 0, '.', ','); ?>"></span></h4>
                        </div>
                        <div class="avatar-sm flex-shrink-0">
                            <span class="avatar-title bg-soft-info rounded fs-3">
                                <i class="fas fa-users text-info"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card card-animate">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1 overflow-hidden">
                            <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Cantidad de Citas Cumplidas</p>
                        </div>
                        <div class="flex-shrink-0">
                            <h5 class="text-success fs-14 mb-0">
                                <i class="ri-arrow-right-up-line fs-13 align-middle"></i> 
                            </h5>
                        </div>
                    </div>
                    <div class="d-flex align-items-end justify-content-between mt-4">
                        <div>
                            <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value" data-target="<?php echo number_format($clienteFilasCumplido, 0, '.', ','); ?>"></span> </h4>
                        </div>
                        <div class="avatar-sm flex-shrink-0">
                            <span class="avatar-title bg-soft-success rounded fs-3">
                                <i class="fas fa-check-circle text-success"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card card-animate">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1 overflow-hidden">
                            <p class="text-uppercase fw-medium text-muted text-truncate mb-0"> Cantidad de Citas Pendientes</p>
                        </div>
                        <div class="flex-shrink-0">
                            <h5 class="text-muted fs-14 mb-0">
                            </h5>
                        </div>
                    </div>
                    <div class="d-flex align-items-end justify-content-between mt-4">
                        <div>
                            <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value" data-target="<?php echo number_format($clienteFilasPendiente, 0, '.', ','); ?>"></span> </h4>
                        </div>
                        <div class="avatar-sm flex-shrink-0">
                            <span class="avatar-title bg-soft-primary rounded fs-3">
                                <i class="far fa-clock text-primary"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 

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
</div>

<!-- <div class="row">
    <div class="col-6">
        <div class="card bg-primary text-black shadow">
            <div class="card-body">
                Citas con Psicologia
                <div class="text-black-50 small"><?php echo number_format($clienteFilasPsicologia, 0, '.', ','); ?></div>
            </div>
        </div>
    </div>
    
    <div class="col-6">
        <div class="card bg-success text-black shadow">
            <div class="card-body">
            Citas con Terapia fisica
                <div class="text-black-50 small"><?php echo number_format($clienteFilasTerapiaFisica, 0, '.', ','); ?></div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-4">
        <div class="card bg-info text-black shadow">
            <div class="card-body">
            Citas con Terapia infantil
                <div class="text-black-50 small"><?php echo number_format($clienteFilasTerapiaInfantil, 0, '.', ','); ?></div>
            </div>
        </div>
    </div>
    <div class="col-4">
        <div class="card bg-warning text-black shadow">
            <div class="card-body">
            Citas con Terapia ocupacional
                <div class="text-black-50 small"><?php echo number_format($clienteFilasTerapiaOcupacional, 0, '.', ','); ?></div>
            </div>
        </div>
    </div>
    <div class="col-4">
        <div class="card bg-danger text-black shadow">
            <div class="card-body">
            Citas con Terapia de lenguaje
                <div class="text-black-50 small"><?php echo number_format($clienteFilasTerapiaLenguaje, 0, '.', ','); ?></div>
            </div>
        </div>
    </div>
</div>
</div>   -->


@endsection



