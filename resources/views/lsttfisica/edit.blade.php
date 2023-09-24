@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Editar Terapia Fisica y Rehabilitacion</h1>
    <form method="POST" action="{{ route('lsttfisica.update', $fisica->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
        <label for="tipo_documento" class="form-label">Tipo de Documento</label>
                                    <select class="form-select" id="tipo_documento" name="tipo_documento" required>
                                        <option value="" disabled selected>Seleccionar tipo de documento...</option>
                                        <option value="DNI">DNI</option>
                                        <option value="Pasaporte">Pasaporte</option>
                                    </select>
        </div>

        <div class="form-group">
            <label for="numero_documento">numero_documento:</label>
            <input type="text" id="numero_documento" name="numero_documento" class="form-control" value="{{ $fisica->numero_documento }}" required>
        </div>

        <div class="form-group">
            <label for="nombres">nombres:</label>
            <input type="text" id="nombres" name="nombres" class="form-control" value="{{ $fisica->nombres }}">
        </div>

        <div class="form-group">
            <label for="apellidos">teléfono:</label>
            <input type="text" id="apellidos" name="apellidos" class="form-control" value="{{ $fisica->apellidos }}">
        </div>

        <div class="form-group">
            <label for="telefono">teléfono:</label>
            <input type="text" id="telefono" name="telefono" class="form-control" value="{{ $fisica->telefono }}">
        </div>

        <div class="form-group">
            <label for="especialidad">especialidad:</label>
            <input type="text" id="especialidad" name="especialidad" class="form-control" value="{{ $fisica->especialidad }}">
        </div>

        <div class="form-group">
            <label for="genero">genero:</label>
            <input type="text" id="genero" name="genero" class="form-control" value="{{ $fisica->genero }}">
        </div>

        <div class="form-group">
            <label for="fecha_hora">fecha_hora:</label>
            <input type="date" id="fecha_hora" name="fecha_hora" class="form-control" value="{{ $fisica->fecha_hora }}">
        </div>

        
        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
    </form>
</div>

<!-- <div class="form-group">
            <label for="apellidos">Apellidos:</label>
            <input type="text" id="apellidos" name="apellidos" class="form-control" required>
        </div> -->
@endsection