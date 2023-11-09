@extends('layouts.admin')
@section('content')
  <style>
    .contenedor {
      margin-top: 80px;
      display: block;
      clear: both;
      text-align: center;
    }

    .contenedor button {
      margin-top: 20px; /* Ajusta el margen superior según sea necesario */
      background-color: blue;
      color: white;
      border-radius: 7px;
      font-size: 30px;

    } 

    .cuadro {
      width: 100%;
      height: 100%;
      border: 1px solid black;
      display: flex;
      justify-content: center;
      align-items: center;
      font-size: 24px;
    }
  </style>

  <div class="contenedor">
    <h2 style="font-size: 35px;">reservacion de citas en todas las especialidades disponibles</h2>
    <button class="btn btn-primary">
      <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#agregarModal">Reservar la cita</a>
    </button>
  </div>

  <!-- Modal para Crear Nuevo reserva -->
  <div class="modal fade" id="agregarModal" tabindex="-1" aria-labelledby="crearModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="crearModalLabel">Reservar Cita</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('registroPrincipal')}}" method="POST">
                    @csrf
                    <div class="row mb-1">
                        <div class="col-md-6">
                            <label for="tipo_documento" class="form-label">Tipo de Documento</label>
                            <select class="form-select" id="tipo_documento" name="tipo_documento">
                                <option value="" disabled selected>Seleccionar tipo de documento...</option>
                                <option value="DNI">DNI</option>
                                <option value="Pasaporte">Pasaporte</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="numero_documento" class="form-label">Número de Documento</label>
                            <input type="number" class="form-control" id="numero_documento" name="numero_documento">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="nombres" class="form-label">Nombres</label>
                            <input type="text" class="form-control" id="nombres" name="nombres">
                        </div>
                        <div class="col-md-6">
                            <label for="apellidos" class="form-label">Apellidos</label>
                            <input type="text" class="form-control" id="apellidos" name="apellidos">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="fecha_hora" class="form-label">Fecha y Hora</label>
                            <input type="datetime-local" class="form-control" id="fecha_hora" name="fecha_hora" required>
                        </div>
                        <div class="col-md-6">
                            <label for="especialidad" class="form-label">Especialidad</label>
                            <select class="form-select" id="especialidad" name="especialidad">
                                <option value="" disabled selected>Seleccionar género...</option>
                                <option value="Psicologia">Psicologia</option>
                                <option value="Terapia fisica">Terapia fisica</option>
                                <option value="Terapia infantil">Terapia infantil</option>
                                <option value="Terapia ocupacional">Terapia ocupacional</option>
                                <option value="Terapia lenguaje">Terapia lenguaje</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="genero" class="form-label">Género</label>
                            <select class="form-select" id="genero" name="genero">
                                <option value="" disabled selected>Seleccionar género...</option>
                                <option value="Masculino">Masculino</option>
                                <option value="Femenino">Femenino</option>
                                <option value="Otro">otro</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                          <button type="submit" class="btn btn-primary" style="margin-top: 25px;">Reservar cita</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal para Crear Nuevo reserva -->

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

@endsection