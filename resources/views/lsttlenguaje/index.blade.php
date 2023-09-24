@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center mb-4">
        <div class="col-md-8 text-center">
            <h3 class="card-title">Listado de Terapia Lenguje</h3>
        </div>
    </div>
    <div class="row justify-content-between align-items-center mb-4">
        <div class="col-md-6">
            <a href="{{ route('lsttlenguaje.create') }}" class="btn btn-primary btn-block">Agregar</a>
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
                @foreach ($lenguajes as $lenguaje)
                    <tr>
                        <td>{{ $lenguaje->id }}</td>
                        <td>{{ $lenguaje->tipo_documento }}</td>
                        <td>{{ $lenguaje->numero_documento }}</td>
                        <td>{{ $lenguaje->nombres }}</td>
                        <td>{{ $lenguaje->apellidos }}</td>
                        <td>{{ $lenguaje->telefono }}</td>
                        <td>{{ $lenguaje->especialidad }}</td>
                        <td>{{ $lenguaje->genero }}</td>
                        <td>{{ $lenguaje->fecha_hora }}</td>

                        <td>
                            <a href="{{ route('lsttlenguaje.edit', $lenguaje->id) }}" class="btn btn-primary btn-block">Editar</a>
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
