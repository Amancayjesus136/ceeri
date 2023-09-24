@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center mb-4">
        <div class="col-md-8 text-center">
            <h3 class="card-title">Listado de Terapia Fisica y Rehabilitacion</h3>
        </div>
    </div>
    <div class="row justify-content-between align-items-center mb-4">
        <div class="col-md-6">
            <a href="{{ route('lsttfisica.create') }}" class="btn btn-primary btn-block">Agregar</a>
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
                @foreach ($fisicas as $fisica)
                    <tr>
                        <td>{{ $fisica->id }}</td>
                        <td>{{ $fisica->tipo_documento }}</td>
                        <td>{{ $fisica->numero_documento }}</td>
                        <td>{{ $fisica->nombres }}</td>
                        <td>{{ $fisica->apellidos }}</td>
                        <td>{{ $fisica->telefono }}</td>
                        <td>{{ $fisica->especialidad }}</td>
                        <td>{{ $fisica->genero }}</td>
                        <td>{{ $fisica->fecha_hora }}</td>

                        <td>
                            <a href="{{ route('lsttfisica.edit', $fisica->id) }}" class="btn btn-primary btn-block">Editar</a>
                            <form method="POST" action="#" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-block" onclick="return confirm('¿Estás seguro de que deseas archivar a esta persona?')">Archivar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
