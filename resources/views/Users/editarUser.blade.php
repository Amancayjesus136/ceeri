@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Editar usuario</h4>
        </div>
    </div>
</div>

<form action="{{ route('usuarios.actualizar', $user->id) }}" method="POST">
    @csrf
    @method('PUT')

<!-- ============================================================== -->
<!-- DNI -->
<!-- ============================================================== --> 
    <div class="row mb-3">
        <div class="col-lg-3">
            <label for="dniInput" class="form-label">DNI</label>
        </div>
        <div class="col-lg-9">
            <input type="number" class="form-control" id="dniInput" name="dni" value="{{ $user->dni }}">
        </div>
    </div>

<!-- ============================================================== -->
<!-- NOMBRES -->
<!-- ============================================================== --> 
    <div class="row mb-3">
        <div class="col-lg-3">
            <label for="firstNameInput" class="form-label">Nombres</label>
        </div>
        <div class="col-lg-9">
            <input type="text" class="form-control" id="firstNameInput" name="nombres" value="{{ $user->nombres }}">
        </div>
    </div>

<!-- ============================================================== -->
<!-- APELLIDO PATERNO -->
<!-- ============================================================== --> 
    <div class="row mb-3">
        <div class="col-lg-3">
            <label for="lastNameInput" class="form-label">Apellido Paterno</label>
        </div>
        <div class="col-lg-9">
            <input type="text" class="form-control" id="lastNameInput" name="apellido_paterno" value="{{ $user->apellido_paterno }}">
        </div>
    </div>

<!-- ============================================================== -->
<!-- APELLIDO MATERNO -->
<!-- ============================================================== --> 
    <div class="row mb-3">
        <div class="col-lg-3">
            <label for="lastNameInput" class="form-label">Apellido Materno</label>
        </div>
        <div class="col-lg-9">
            <input type="text" class="form-control" id="lastNameInput" name="apellido_materno" value="{{ $user->apellido_materno }}">
        </div>
    </div>

<!-- ============================================================== -->
<!-- EDAD -->
<!-- ============================================================== --> 
    <div class="row mb-3">
        <div class="col-lg-3">
            <label for="ageInput" class="form-label">Edad</label>
        </div>
        <div class="col-lg-9">
            <input type="number" class="form-control" id="ageInput" name="edad" value="{{ $user->edad }}">
        </div>
    </div>

<!-- ============================================================== -->
<!-- BOTONES -->
<!-- ============================================================== --> 
    <div class="row">
        <div class="col-lg-12 d-flex justify-content-end">
            <button type="submit" class="btn btn-primary me-2">Guardar</button>
            <a href="{{ route('usuarios.listado') }}" class="btn btn-secondary">Regresar</a>
        </div>
    </div>

</form>

@endsection
