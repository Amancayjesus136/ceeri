@extends('layouts.admin')

@section('content')


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<div class="container">
    <div class="row justify-content-center mb-4">
        <div class="col-md-8 text-center">
            <h3 class="card-title">Listado de psicologías</h3>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-md-6">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#agregarModal">
                Crear Nuevo Tema
            </button>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tipo de Documento</th>
                    <th>Número de Documento</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Teléfono</th>
                    <th>Especialidad</th>
                    <th>Género</th>
                    <th>Fecha y Hora</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($psicologias as $psicologia)
                <tr>
                    <td>{{ $psicologia->id }}</td>
                    <td>{{ $psicologia->tipo_documento }}</td>
                    <td>{{ $psicologia->numero_documento }}</td>
                    <td>{{ $psicologia->nombres }}</td>
                    <td>{{ $psicologia->apellidos }}</td>
                    <td>{{ $psicologia->telefono }}</td>
                    <td>{{ $psicologia->especialidad }}</td>
                    <td>{{ $psicologia->genero }}</td>
                    <td>{{ $psicologia->fecha_hora }}</td>
                    <td>
                        <div class="d-flex">
                            <a href="{{ route('lstpsicologia.edit', $psicologia->id) }}" class="btn btn-primary mr-2">Editar</a>
                            <form method="POST" action="#" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('¿Estás seguro de que deseas archivar a esta persona?')">Archivar</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>




<!-- Modal para Crear Nuevo Tema -->
<div class="modal fade" id="agregarModal" tabindex="-1" aria-labelledby="agregarmodalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="agregarmodalLabel">Agregar Nueva Psicología</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('lstpsicologia.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="tipo_documento" class="form-label">Tipo de Documento</label>
                        <select class="form-select" id="tipo_documento" name="tipo_documento" required>
                            <option value="" disabled selected>Seleccionar tipo de documento...</option>
                            <option value="DNI">DNI</option>
                            <option value="Pasaporte">Pasaporte</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="numero_documento" class="form-label">Número de Documento</label>
                        <input type="text" class="form-control" id="numero_documento" name="numero_documento">
                    </div>
                    <div class="mb-3">
                        <label for="nombres" class="form-label">Nombres</label>
                        <input type="text" class="form-control" id="nombres" name="nombres">
                    </div>
                    <div class="mb-3">
                        <label for="apellidos" class="form-label">Apellidos</label>
                        <input type="text" class="form-control" id="apellidos" name="apellidos">
                    </div>
                    <div class="mb-3">
                        <label for="telefono" class="form-label">Teléfono</label>
                        <input type="text" class="form-control" id="telefono" name="telefono">
                    </div>
                    <div class="mb-3">
                        <label for="especialidad" class="form-label">Especialidad</label>
                        <input type="text" class="form-control" id="especialidad" name="especialidad" value="psicologia">
                    </div>
                    <div class="mb-3">
                        <label for="genero" class="form-label">Género</label>
                        <select class="form-select" id="genero" name="genero" required>
                            <option value="" disabled selected>Seleccionar género...</option>
                            <option value="Masculino">Masculino</option>
                            <option value="Femenino">Femenino</option>
                            <option value="Otro">Otro</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Registrar</button>
                </form>
            </div>
        </div>
    </div>
</div>



@endsection
