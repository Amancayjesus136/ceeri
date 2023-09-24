@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Editar Ocupacional</h1>
    <form method="POST" action="{{ route('lsttocupacional.update', $ocupacional->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="tipo_documento">tipo_documento:</label>
            <input type="text" id="tipo_documento" name="tipo_documento" class="form-control" value="{{ $ocupacional->tipo_documento }}" required>
        </div>

        <div class="form-group">
            <label for="numero_documento">numero_documento:</label>
            <input type="text" id="numero_documento" name="numero_documento" class="form-control" value="{{ $ocupacional->numero_documento }}" required>
        </div>

        <div class="form-group">
            <label for="nombres">nombres:</label>
            <input type="text" id="nombres" name="nombres" class="form-control" value="{{ $ocupacional->nombres }}">
        </div>

        <div class="form-group">
            <label for="apellidos">teléfono:</label>
            <input type="text" id="apellidos" name="apellidos" class="form-control" value="{{ $ocupacional->apellidos }}">
        </div>

        <div class="form-group">
            <label for="telefono">teléfono:</label>
            <input type="text" id="telefono" name="telefono" class="form-control" value="{{ $ocupacional->telefono }}">
        </div>

        <div class="form-group">
            <label for="especialidad">teléfono:</label>
            <input type="text" id="especialidad" name="especialidad" class="form-control" value="{{ $ocupacional->especialidad }}">
        </div>

        <div class="form-group">
            <label for="genero">teléfono:</label>
            <input type="text" id="genero" name="genero" class="form-control" value="{{ $ocupacional->genero }}">
        </div>

        <div class="form-group">
            <label for="fecha_hora">fecha_hora:</label>
            <input type="date" id="fecha_hora" name="fecha_hora" class="form-control" value="{{ $ocupacional->fecha_hora }}">
        </div>

        
        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
    </form>
</div>

<!-- <div class="form-group">
            <label for="apellidos">Apellidos:</label>
            <input type="text" id="apellidos" name="apellidos" class="form-control" required>
        </div> -->
@endsection