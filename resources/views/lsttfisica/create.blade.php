@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Agregar Reservas Para Psicologia</h1>
    <form method="POST" action="{{ route('lsttfisica.store') }}">
        @csrf
        
        <div class="col-md-6">
                    <div class="mb-3">
                        <label for="tipo_documento" class="form-label">Tipo de Documento</label>
                        <select class="form-select" id="tipo_documento" name="tipo_documento" required>
                            <option value="" disabled selected>Seleccionar tipo de documento...</option>
                            <option value="DNI">DNI</option>
                            <option value="Pasaporte">Pasaporte</option>
                        </select>
                    </div>
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
            <input type="text" id="especialidad" name="especialidad" class="form-control" value="terapia fisica">
        </div>

            <div class="col-md-6">
                    <div class="mb-3">
                        <label for="genero" class="form-label">Género</label>
                             <select class="form-select" id="genero" name="genero" required>
                                <option value="" disabled selected>Seleccionar género...</option>
                                <option value="Masculino">Masculino</option>
                                <option value="Femenino">Femenino</option>
                                <option value="Otro">Otro</option>
                    </select>
             </div>

             <div>
            

        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection