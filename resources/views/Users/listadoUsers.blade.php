@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Listado de usuarios</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                    <li class="breadcrumb-item active">Basic Tables</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<!-- ============================================================== -->
<!-- LISTADO DE USUARIOS -->
<!-- ============================================================== --> 

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Listado usuarios</h4>
                <div class="flex-shrink-0">
                    <div class="form-check form-switch form-switch-right form-switch-md">
                    <a href="{{ route('usuarios.registrar') }}" class="btn btn-sm btn-success">
                    <i class="fas fa-plus-circle"></i> Nuevo registro
                    </a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="live-preview">
                    <div class="table-responsive table-card">
                        <table class="table align-middle table-nowrap table-striped-columns mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col" style="width: 46px;">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="cardtableCheck">
                                            <label class="form-check-label" for="cardtableCheck"></label>
                                        </div>
                                    </th>
                                    <th scope="col">Número</th> <!-- Cambiado desde "ID" -->
                                    <th scope="col">DNI</th>
                                    <th scope="col">Nombres</th>
                                    <th scope="col">Apellido Paterno</th>
                                    <th scope="col">Apellido Materno</th>
                                    <th scope="col">Edad</th>
                                    <th scope="col" style="width: 150px;">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- FILAS DE LA TABLA -->
                                @php
                                $contador = 1; // Inicializar el contador
                                @endphp
                                @foreach($users as $user)
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="cardtableCheck{{$loop->index}}">
                                            <label class="form-check-label" for="cardtableCheck{{$loop->index}}"></label>
                                        </div>
                                    </td>
                                    <td>{{ $contador }}</td> <!-- Mostrar el contador -->
                                    <td>{{ $user->dni }}</td>
                                    <td>{{ $user->nombres }}</td>
                                    <td>{{ $user->apellido_paterno }}</td>
                                    <td>{{ $user->apellido_materno }}</td>
                                    <td>{{ $user->edad }}</td>
                                    <td>
                                        <a href="{{ route('usuarios.editar', $user->id) }}" class="btn btn-sm btn-primary">Editar</a>
                                        <form action="{{ route('usuarios.eliminar', $user->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                                @php
                                $contador++; // Incrementar el contador en cada iteración
                                @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
