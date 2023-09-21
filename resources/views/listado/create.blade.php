@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Agregar listado de reservas</h1>
    <form method="POST" action="{{ route('listado.store') }}">
        @csrf
        
        <div class="form-group">
            <label for="tipo_documento">tipo_documento:</label>
            <input type="text" id="tipo_documento" name="tipo_documento" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="numero_documento">numero_documento:</label>
            <input type="text" id="numero_documento" name="numero_documento" class="form-control">
        </div>

        <div class="form-group">
            <label for="nombres">nombres:</label>
            <input type="text" id="nombres" name="nombres" class="form-control">
        </div>

        <div class="form-group">
            <label for="apellidos">apellidos:</label>
            <input type="text" id="apellidos" name="apellidos" class="form-control">
        </div>

        <div class="form-group">
            <label for="telefono">telefono:</label>
            <input type="text" id="telefono" name="telefono" class="form-control">
        </div>

        <div class="form-group">
            <label for="especialidad">especialidad:</label>
            <input type="text" id="especialidad" name="especialidad" class="form-control">
        </div>

        <div class="form-group">
            <label for="genero">genero:</label>
            <input type="text" id="genero" name="genero" class="form-control">
        </div>

        <div class="form-group">
            <label for="genero">genero:</label>
            <input type="date" id="genero" name="genero" class="form-control">
        </div>
        
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection