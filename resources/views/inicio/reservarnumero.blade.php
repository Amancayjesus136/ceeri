@extends('layouts.admin')
@extends('layouts.footer')

@section('content')
<!-- Titulo -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">VISTA > <span style="color: #BEDA13;">Pasos a Reservar</span></h4>
            <div class="page-title-right">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1"></h4>
                </div>
                <a href="#" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#agregarModal">
                    <i class="fas fa-plus-circle"></i> Nuevo Registro
                </a>
            </div>
        </div>
    </div>
</div>
<!-- Titulo -->

<!-- listado -->
<div class="card">
            <div class="card-body">
                <div class="live-preview">
                    <div class="table-responsive table-card">
                        <table class="table align-middle table-nowrap table-striped-columns mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col">Número</th>
                                    <th scope="col">Titulo</th>
                                    <th scope="col">Descripcion</th>
                                    <th scope="col" style="width: 150px;">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- FILAS DE LA TABLA -->
                                @foreach($numeros as $numero)
                                    <tr>
                                        <td>{{ $numero->numero }}</td>
                                        <td>{{ $numero->titulo_numero }}</td>
                                        <td>{{ $numero->descripcion_numero }}</td>
                                        <td>
                                            <a href="#" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editarModal{{ $numero->id_numero }}">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>

                                            <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#eliminarModal{{ $numero->id_numero }}">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </td>   
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- listado -->

<!-- Modal para Crear Nuevo Tema -->
<div class="modal fade" id="agregarModal" tabindex="-1" aria-labelledby="crearModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="crearModalLabel">Crear nuevo registro</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('numeros.store') }}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-lg-3">
                                <label for="nameInput" class="form-label">Número</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" id="nameInput" name="numero" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-3">
                                <label for="nameInput" class="form-label">Título</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" id="nameInput" name="titulo_numero" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-3">
                                <label for="websiteUrl" class="form-label">Descripción</label>
                            </div>
                            <div class="col-lg-9">
                                <textarea class="form-control" id="descripcion" name="descripcion_numero" rows="4" required></textarea>
                            </div>
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<!-- Modal para Crear Nuevo Tema -->

<!-- Modal para Editar -->
@foreach ($numeros as $numero)
    <div class="modal fade" id="editarModal{{ $numero->id_numero }}" tabindex="-1" aria-labelledby="editarModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editarModalLabel">Editar Registro</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('numeros.update', $numero->id_numero) }}">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <div class="col-lg-3">
                                <label for="nameInput" class="form-label">Número</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" id="nameInput" name="numero" value="{{ $numero->numero }}" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-3">
                                <label for="nameInput" class="form-label">Título</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" id="nameInput" name="titulo_numero" value="{{ $numero->titulo_numero }}" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-3">
                                <label for="websiteUrl" class="form-label">Descripción</label>
                            </div>
                            <div class="col-lg-9">
                                <textarea class="form-control" id="descripcion" name="descripcion_numero" rows="4" required>{{ $numero->descripcion_numero }}</textarea>
                            </div>
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>           
                </div>
            </div>
        </div>
    </div>
@endforeach

@foreach ($numeros as $numero)
     <!-- MODAL DE ELIMINAR -->
        <div class="modal fade" id="eliminarModal{{ $numero->id_numero }}" tabindex="-1" aria-labelledby="eliminarModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editarModalLabel">Eliminar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('numeros.destroy', $numero->id_numero) }}">
                        @csrf
                        @method('DELETE')
                        <label for="aviso" class="form-label">Esta seguro de eliminar esto de forma permanente?</label><br>
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
