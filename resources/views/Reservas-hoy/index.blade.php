@extends('layouts.admin')

@section('content')
<style>
    @media print{
        @page {size: landscape}
        .pagination {
            display: none !important;
        }
        .solo-imprimir {
            display: block !important;
        }
    }
    .listado-busqueda {
  width: 240px;
  float: right;
}
.listado-busqueda input {
  width: calc(100% - 70px);
  display: inline-block;
}
.solo-imprimir {
    display: none;
}

.pagination {
        width: 100px;
        display: block;
        height: 90px;
        padding-top: 40px;
    }
</style>

<!-- cabecera -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-end">
            <h4 class="mb-sm-0" style="margin-right: 590px;">Las citas de hoy!</h4>
            <form method="GET" class="listado-busqueda">
                <div class="form-group d-flex">
                    <select name="specialty" class="form-control input-sm">
                        <option value="" <?php if (empty($_GET['specialty'])) echo 'selected'; ?>>especialidades</option>
                        <option value="Psicologia" <?php if (!empty($_GET['specialty']) && $_GET['specialty'] == 'Psicologia') echo 'selected'; ?>>Psicología</option>
                        <option value="Terapia fisica" <?php if (!empty($_GET['specialty']) && $_GET['specialty'] == 'Terapia fisica') echo 'selected'; ?>>Terapia Física</option>
                        <option value="Terapia ocupacional" <?php if (!empty($_GET['specialty']) && $_GET['specialty'] == 'Terapia ocupacional') echo 'selected'; ?>>Terapia Ocupacional</option>
                        <option value="Terapia infantil" <?php if (!empty($_GET['specialty']) && $_GET['specialty'] == 'Terapia infantil') echo 'selected'; ?>>Terapia Infantil</option>
                        <option value="Terapia lenguaje" <?php if (!empty($_GET['specialty']) && $_GET['specialty'] == 'Terapia lenguaje') echo 'selected'; ?>>Terapia de Lenguaje</option>
                    </select>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                </div>
            </form>
                      
            <div class="card-header align-items-center d-flex border-bottom-dashed" style="margin-left: 20px;">
                <div class="flex-shrink-0">
                    <form method="GET" class="listado-busqueda">
                        <input type="text" placeholder="busca por otro dato" name="s" class="form-control input-sm"
                                    value="<?php if (!empty($_GET['s'])) echo $_GET['s']; ?>" />
                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
</div>

<!-- cabecera -->



<!-- listado -->
            <div class="hstack gap-2 justify-content-end d-print-none mt-4">
                <a href="javascript:window.print()" class="btn btn-primary"><i class="ri-printer-line align-bottom me-1"></i> Imprimir</a>
            </div>
            <!-- esto es para imprimir -->
        
            <div class="card">
            <div class="card-body">
                <h1 class="solo-imprimir">REPORTE</h1>
                <div class="live-preview">
                    <div class="table-responsive table-card">
                        <table class="table align-middle table-nowrap table-striped-columns mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Especialidad</th>
                                    <th scope="col">Tipo</th>
                                    <th scope="col">N° Documento</th>
                                    <th scope="col">Nombres</th>
                                    <th scope="col">Apellidos</th>
                                    <th scope="col">Telefono</th>
                                    <th scope="col">Fecha y hora</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col" class="acciones" style="width: 150px;">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- FILAS DE LA TABLA -->
                                @php $contador = 1; @endphp
                                @foreach($clientes as $cliente)
                                    @php
                                        // Convertir la cadena de fecha_hora a un objeto DateTime
                                        $fechaHoraCita = \Carbon\Carbon::parse($cliente->fecha_hora);
                            
                                        // Obtén la fecha actual en el formato adecuado
                                        $fechaActual = now()->format('Y-m-d');
                            
                                        // Verifica si la fecha de la cita es igual a la fecha actual
                                        $esCitaDeHoy = $fechaHoraCita->format('Y-m-d') == $fechaActual;
                                    @endphp
                            
                                    @if ($esCitaDeHoy)
                                        <tr>
                                            <td>{{ $contador }}</td>
                                            <td>{{ $cliente->especialidad }}</td>
                                            <td>{{ $cliente->tipo_documento }}</td>
                                            <td>{{ $cliente->numero_documento }}</td>
                                            <td>{{ $cliente->nombres }}</td>
                                            <td>{{ $cliente->apellidos }}</td>
                                            <td>{{ $cliente->telefono }}</td>
                                            <td>{{ $fechaHoraCita }}</td>
                                            <td><span class="badge bg-success">{{ $cliente->estado }}</span></td>
                                        
                                            <td class="acciones">
                                                <a href="#" class="btn btn-primary btn-sm"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#editarModal{{ $cliente->id }}">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>

                                                <a href="#" class="btn btn-sm btn-danger"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#eliminarModal{{ $cliente->id }}">
                                                    <i class="fas fa-trash-alt"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @php 
                                            $contador++; 
                                        @endphp
                                    @endif
                                @endforeach
                            </tbody>                                                       
                        </table>
                    </div>
                </div>
            </div>
            
        <div style="margin-top: 10px; margin-bottom: 20px," class="d-flex justify-content-between ">
                <p style="margin-left: 50px" class="text-start">Mostrando {{ $clientes->firstItem() }} a {{ $clientes->lastItem() }} de {{ $clientes->total() }} resultados</p>

                <div style="margin-right: 150px" class="pagination-container">
                    <ul class="pagination d-flex">
                        @if ($clientes->onFirstPage())
                            <li class="page-item disabled"><span class="page-link">Anterior</span></li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{ $clientes->previousPageUrl() }}">Anterior</a></li>
                        @endif

                        @for ($i = 1; $i <= $clientes->lastPage(); $i++)
                            <li class="page-item {{ $i == $clientes->currentPage() ? 'active' : '' }}">
                                <a class="page-link" href="{{ $clientes->url($i) }}">{{ $i }}</a>
                            </li>
                        @endfor

                        @if ($clientes->hasMorePages())
                            <li class="page-item"><a class="page-link" href="{{ $clientes->nextPageUrl() }}">Siguiente</a></li>
                        @else
                            <li class="page-item disabled"><span class="page-link">Siguiente</span></li>
                        @endif
                    </ul>
                </div>
        </div>
<!-- listado -->
 <!-- Modal para Editar -->
@foreach($clientes as $cliente)
<div class="modal fade" id="editarModal{{ $cliente->id }}" tabindex="-1" aria-labelledby="editarModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editarModalLabel">Editar Registro</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('Clientes.update', $cliente->id) }}">
                    @csrf
                    @method('PUT')
                        <div class="mb-3">
                            <label for="estado" class="form-label">Actualizar estado</label>
                            <select id="estado" class="form-select" name="estado" required>
                                <option value="" disabled {{ $cliente->estado == '' ? 'selected' : '' }}>Seleccionar</option>
                                <option value="pendiente" {{ $cliente->estado == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                                <option value="cumplido" {{ $cliente->estado == 'cumplido' ? 'selected' : '' }}>Cumplido</option>
                                <option value="cancelado" {{ $cliente->estado == 'cancelado' ? 'selected' : '' }}>Cancelado</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="especialidad" class="form-label">Especialidad</label>
                            <select class="form-select" id="especialidad" name="especialidad" required>
                                <option value="" disabled {{ $cliente->especialidad == '' ? 'selected' : '' }}>Seleccionar especialidad...</option>
                                <option value="Psicologia" {{ $cliente->especialidad == 'Psicologia' ? 'selected' : '' }}>Psicologia</option>
                                <option value="Terapia fisica" {{ $cliente->especialidad == 'Terapia fisica' ? 'selected' : '' }}>Terapia fisica</option>
                            </select>
                        </div>       
                        <div class="mb-3">
                            <label for="tipo_documento" class="form-label">Tipo de Documento</label>
                            <select class="form-select" id="tipo_documento" name="tipo_documento" required>
                                <option value="" disabled {{ $cliente->tipo_documento == '' ? 'selected' : '' }}>Seleccionar tipo de documento...</option>
                                <option value="DNI" {{ $cliente->tipo_documento == 'DNI' ? 'selected' : '' }}>DNI</option>
                                <option value="Pasaporte" {{ $cliente->tipo_documento == 'Pasaporte' ? 'selected' : '' }}>Pasaporte</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="numero_documento" class="form-label">Número de Documento</label>
                            <input type="text" class="form-control" id="numero_documento" name="numero_documento" value="{{ $cliente->numero_documento }}" oninput="limitarCaracteres(this, 45)">
                        </div>
                        <div class="mb-3">
                            <label for="nombres" class="form-label">Nombres</label>
                            <input type="text" class="form-control" id="nombres" name="nombres" value="{{ $cliente->nombres }}" oninput="limitarCaracteres(this, 45)">
                        </div>
                        <div class="mb-3">
                            <label for="apellidos" class="form-label">Apellidos</label>
                            <input type="text" class="form-control" id="apellidos" name="apellidos" value="{{ $cliente->apellidos }}" oninput="limitarCaracteres(this, 45)">
                        </div>
                        <div class="mb-3">
                            <label for="telefono" class="form-label">Teléfono</label>
                            <input type="text" class="form-control" id="telefono" name="telefono" value="{{ $cliente->telefono }}" oninput="limitarCaracteres(this, 15)">
                        </div>
                                                
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </form>                
            </div>
        </div>
    </div>
</div>
<!-- MODAL DE ELIMINAR -->
    <!-- Button trigger modal -->


<div class="modal fade" id="eliminarModal{{ $cliente->id }}" tabindex="-1" aria-labelledby="eliminarModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editarModalLabel">Eliminar Registro</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('Clientes.destroy', $cliente->id) }}">
                    @csrf
                    @method('DELETE')
                    <label for="aviso" class="form-label">Esta seguro de eliminar este registro de forma permanente?</label>
                    <button type="button" class="btn btn-primary btn-sm" data-bs-dismiss="modal">Cancelar</button>    
                    <button type="submit" class="btn btn-sm btn-danger">eliminar</button>
                </form>                
            </div>
        </div>
    </div>
</div>   
<!-- MODAL DE ELIMINAR -->
@endforeach    
    

@endsection