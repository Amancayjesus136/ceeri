@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center mb-4">
        <div class="col-md-8 text-center">
            <h3 class="card-title">Listado de Terapia Infantil</h3>
        </div>
    </div>
    <div class="row justify-content-between align-items-center mb-4">
        <div class="col-md-6">
            <a href="{{ route('lsttinfantil.create') }}" class="btn btn-primary btn-block">Agregar</a>
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
                @foreach ($infantils as $infantil)
                    <tr>
                        <td>{{ $infantil->id }}</td>
                        <td>{{ $infantil->tipo_documento }}</td>
                        <td>{{ $infantil->numero_documento }}</td>
                        <td>{{ $infantil->nombres }}</td>
                        <td>{{ $infantil->apellidos }}</td>
                        <td>{{ $infantil->telefono }}</td>
                        <td>{{ $infantil->especialidad }}</td>
                        <td>{{ $infantil->genero }}</td>
                        <td>{{ $infantil->fecha_hora }}</td>

                        <td>
                            <a href="{{ route('lsttinfantil.edit', $infantil->id) }}" class="btn btn-primary btn-block">Editar</a>
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
