@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Listado de usuarios</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                    <li class="breadcrumb-item active">Basic Tables</li>
                </ol>
            </div>

        </div>
    </div>
</div>

<!-- ============================================================== -->
<!-- DNI -->
<!-- ============================================================== --> 

<form action="{{ route('usuarios.store') }}" method="POST">
    @csrf
    <div class="row mb-3">
        <div class="col-lg-3">
            <label for="dniInput" class="form-label">DNI</label>
        </div>
        <div class="col-lg-9">
            <input type="number" class="form-control" id="dniInput" name="dni" placeholder="Seleccionar DNI...">
        </div>
    </div>

<!-- ============================================================== -->
<!-- CODIGO DE TRABAJADOR -->
<!-- ============================================================== --> 
    <div class="row mb-3">
        <div class="col-lg-3">
            <label for="workerCodeInput" class="form-label">Codigo de trabajador</label>
        </div>
        <div class="col-lg-9">
            <input type="number" class="form-control" id="workerCodeInput" name="worker_code" placeholder="Codigo de trabajo..">
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
            <input type="text" class="form-control" id="firstNameInput" name="nombres" placeholder="Nombres...">
        </div>
    </div>

<!-- ============================================================== -->
<!-- APELLIDO PATERNO -->
<!-- ============================================================== --> 
    <div class="row mb-3">
        <div class="col-lg-3">
            <label for="lastNameInput" class="form-label">Apellido paterno</label>
        </div>
        <div class="col-lg-9">
            <input type="text" class="form-control" id="lastNameInput" name="apellido_paterno" placeholder="Apellido paterno...">
        </div>
    </div>

<!-- ============================================================== -->
<!-- APELLIDO MATERNO -->
<!-- ============================================================== --> 
    <div class="row mb-3">
        <div class="col-lg-3">
            <label for="motherLastNameInput" class="form-label">Apellido materno</label>
        </div>
        <div class="col-lg-9">
            <input type="text" class="form-control" id="motherLastNameInput" name="apellido_materno" placeholder="Apellido materno...">
        </div>
    </div>

<!-- ============================================================== -->
<!-- SEXO -->
<!-- ============================================================== --> 
    <div class="row mb-3">
        <div class="col-lg-3">
            <label class="form-label">Sexo</label>
        </div>
        <div class="col-lg-9">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="sexo" id="maleRadio" value="Masculino">
                <label class="form-check-label" for="maleRadio">Masculino</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="sexo" id="femaleRadio" value="Femenino">
                <label class="form-check-label" for="femaleRadio">Femenino</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="sexo" id="otherRadio" value="Otro">
                <label class="form-check-label" for="otherRadio">Otro</label>
            </div>
        </div>
    </div>

<!-- ============================================================== -->
<!-- FECHA DE NACIMIENTO -->
<!-- ============================================================== --> 
    <div class="row mb-3">
        <div class="col-lg-3">
            <label for="birthdateInput" class="form-label">Fecha de nacimiento</label>
        </div>
        <div class="col-lg-9">
            <input type="date" class="form-control" id="birthdateInput" name="fecha_nacimiento">
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
            <input type="number" class="form-control" id="ageInput" name="edad" placeholder="Edad...">
        </div>
    </div>

<!-- ============================================================== -->
<!-- ESTADO CIVIL -->
<!-- ============================================================== --> 
    <div class="row mb-3">
        <div class="col-lg-3">
            <label class="form-label">Estado civil</label>
        </div>
        <div class="col-lg-9">
            <select class="form-select" id="estadoCivilSelect" name="estado_civil">
                <option value="" disabled selected>Seleccionar estado civil...</option>
                <option value="Soltero">Soltero</option>
                <option value="Casado">Casado</option>
                <option value="Divorciado">Divorciado</option>
                <option value="Viudo">Viudo</option>
            </select>
        </div>
    </div>

<!-- ============================================================== -->
<!-- NACIONALIDAD -->
<!-- ============================================================== --> 
    <div class="row mb-3">
        <div class="col-lg-3">
            <label class="form-label">Nacionalidad</label>
        </div>
        <div class="col-lg-9">
            <select class="form-select" id="nacionalidadSelect" name="nacionalidad">
                <option value="" disabled selected>Seleccionar nacionalidad...</option>
                <option value="Peruana">Peruana</option>
                <option value="Otro">Otro</option>
            </select>
            <input type="text" class="form-control mt-3" id="otraNacionalidadInput" name="otra_nacionalidad" placeholder="Especificar otra nacionalidad..." style="display: none;">
        </div>
    </div>

<!-- ============================================================== -->
<!-- PROCEDENCIA -->
<!-- ============================================================== --> 
    <div class="row mb-3">
        <div class="col-lg-3">
            <label class="form-label">Procedencia</label>
        </div>
        <div class="col-lg-9">
            <select class="form-select" id="provenanceSelect" name="procedencia">
                <option value="" disabled selected>Seleccionar procedencia...</option>
                <option value="Externos">Externos</option>
                <option value="Sede central">Sede central</option>
                <option value="ZR 01 Piura">ZR 01 Piura</option>
                <option value="ZR 02 Chiclayo">ZR 02 Chiclayo</option>
                <option value="ZR 03 Moyobamba">ZR 03 Moyobamba</option>
                <option value="ZR 04 Iquitos">ZR 04 Iquitos</option>
                <option value="ZR 05 Trujillo">ZR 05 Trujillo</option>
                <option value="ZR 06 Pucallpa">ZR 06 Pucallpa</option>
                <option value="ZR 07 Huaraz">ZR 07 Huaraz</option>
                <option value="ZR 08 Huancayo">ZR 08 Huancayo</option>
                <option value="ZR 09 Lima">ZR 09 Lima</option>
                <option value="ZR 10 Cusco">ZR 10 Cusco</option>
                <option value="ZR 11 Ica">ZR 11 Ica</option>
                <option value="ChoZR 12 Arequipa">ChoZR 12 Arequipa</option>
                <option value="ZR 13 Tacna">ZR 13 Tacna</option>
                <option value="ZR 14 Ayacucho">ZR 14 Ayacucho</option>
            </select>
        </div>
    </div>

<!-- ============================================================== -->
<!-- CONDICION LABORAL -->
<!-- ============================================================== --> 
    <div class="row mb-3">
        <div class="col-lg-3">
            <label class="form-label">Condición laboral</label>
        </div>
        <div class="col-lg-9">
            <select class="form-select" id="condicionLaboralSelect" name="condicion_laboral">
                <option value="" disabled selected>Seleccionar condición laboral...</option>
                <option value="Lima">Lima</option>
                <option value="Callao">Callao</option>
                <option value="Arequipa">Arequipa</option>
                <!-- Add more options here -->
            </select>
        </div>
    </div>

<!-- ============================================================== -->
<!-- REGIMEN LABORAL -->
<!-- ============================================================== --> 
    <div class="row mb-3">
        <div class="col-lg-3">
            <label class="form-label">Regimen laboral</label>
        </div>
        <div class="col-lg-9">
            <select class="form-select" id="regimenLaboralSelect" name="regimen_laboral">
                <option value="" disabled selected>Seleccionar régimen laboral...</option>
                <option value="Contracted (CAS, CAP)">Contracted (CAS, CAP)</option>
                <option value="Intern">Intern</option>
                <option value="Labor Regime (1057, 728)">Labor Regime (1057, 728)</option>
            </select>
        </div>
    </div>

<!-- ============================================================== -->
<!-- CARGO -->
<!-- ============================================================== --> 
    <div class="row mb-3">
        <div class="col-lg-3">
            <label for="positionInput" class="form-label">Cargo</label>
        </div>
        <div class="col-lg-9">
            <input type="text" class="form-control" id="positionInput" name="cargo" placeholder="Seleccionar cargo">
        </div>
    </div>

<!-- ============================================================== -->
<!-- UNIDAD -->
<!-- ============================================================== --> 
    <div class="row mb-3">
        <div class="col-lg-3">
            <label for="unitInput" class="form-label">Unidad</label>
        </div>
        <div class="col-lg-9">
            <input type="text" class="form-control" id="unitInput" name="unidad" placeholder="Seleccionar unidad">
        </div>
    </div>

 <!-- ============================================================== -->
<!-- OFICINA -->
<!-- ============================================================== --> 
    <div class="row mb-3">
        <div class="col-lg-3">
            <label for="officeInput" class="form-label">Oficina</label>
        </div>
        <div class="col-lg-9">
            <input type="text" class="form-control" id="officeInput" name="oficina" placeholder="Seleccionar oficio">
        </div>
    </div>

<!-- ============================================================== -->
<!-- CORREO COORPORATIVO -->
<!-- ============================================================== --> 
    <div class="row mb-3">
        <div class="col-lg-3">
            <label for="corporateEmailInput" class="form-label">Correo corporativo</label>
        </div>
        <div class="col-lg-9">
            <input type="email" class="form-control" id="corporateEmailInput" name="email" placeholder="Correo Corporativo">
        </div>
    </div>


<!-- ============================================================== -->
<!-- CORREO PERSONAL -->
<!-- ============================================================== --> 
    <div class="row mb-3">
        <div class="col-lg-3">
            <label for="personalEmailInput" class="form-label">Correo personal</label>
        </div>
        <div class="col-lg-9">
            <input type="email" class="form-control" id="personalEmailInput" name="correo_personal" placeholder="Correo personal">
        </div>
    </div>

<!-- ============================================================== -->
<!-- PROFESSIONES -->
<!-- ============================================================== --> 
    <div class="row mb-3">
        <div class="col-lg-3">
            <label for="professionInput" class="form-label">Profesiones</label>
        </div>
        <div class="col-lg-9">
            <input type="text" class="form-control" id="professionInput" name="profesiones" placeholder="Professionalismo">
        </div>
    </div>

<!-- ============================================================== -->
<!-- FECHA DE INICIO -->
<!-- ============================================================== --> 
    <div class="row mb-3">
        <div class="col-lg-3">
            <label for="dateOfEntryInput" class="form-label">Fecha de inicio</label>
        </div>
        <div class="col-lg-9">
            <input type="date" class="form-control" id="dateOfEntryInput" name="fecha_ingreso">
        </div>
    </div>

<!-- ============================================================== -->
<!-- FECHA DE CESE -->
<!-- ============================================================== --> 
    <div class="row mb-3">
        <div class="col-lg-3">
            <label for="dateOfExitInput" class="form-label">Fecha de cese</label>
        </div>
        <div class="col-lg-9">
            <input type="date" class="form-control" id="dateOfExitInput" name="fecha_cese">
        </div>
    </div>

<!-- ============================================================== -->
<!-- REGISTRAR -->
<!-- ============================================================== --> 
    <div class="row">
        <div class="col-12">
            <button type="submit" name="button" class="btn btn-success">Registrar</button>
            <button type="button" class="btn btn-danger" onclick="window.location='{{ route('login') }}'">Cancelar</button>
        </div>
    </div>
</form>

@endsection
