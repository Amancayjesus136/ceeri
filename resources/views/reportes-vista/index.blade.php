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
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Reportes de citas por especialidad</h4>
            <div class="page-title-right">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1"></h4>
                <form method="GET" class="listado-busqueda">
                    <input type="text" placeholder="Ingrese su búsqueda" name="s" class="form-control input-sm"
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
                                </tr>
                            </thead>
                            <tbody>
                                <!-- FILAS DE LA TABLA -->
                                @php $contador = 1; @endphp
                                @foreach($clientes as $cliente)
                                    <tr>
                                        <td>{{ $contador }}</td>
                                        <td>{{ $cliente->especialidad }}</td>
                                        <td>{{ $cliente->tipo_documento }}</td>
                                        <td>{{ $cliente->numero_documento }}</td>
                                        <td>{{ $cliente->nombres }}</td>
                                        <td>{{ $cliente->apellidos }}</td>
                                        <td>{{ $cliente->telefono }}</td>
                                        <td>{{ $cliente->fecha_hora }}</td>
                                        <td><span class="badge bg-success">{{ $cliente->estado }}</span>
                                    </td>
                                    </tr>
                                    @php 
                                        $contador++; 
                                    @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
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
    </div>
    
</div>
@endsection