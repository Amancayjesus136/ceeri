@extends('layouts.admin')
@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card shadow p-3 mb-5 bg-white rounded">
                <div class="card-body">
                    <h3 class="card-title text-center">Reservar Citas de Terapia Fisica y Rehabiltiacion</h3><br><br>
                    @if(session('success'))
                    <div id="success-alert" class="alert alert-success alert-dismissible bg-success text-white alert-label-icon fade show" role="alert">
                        <i class="ri-notification-off-line label-icon"></i><strong>Éxito</strong> - Reserva registrada correctamente
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                    <form action="{{ route('lsttfisica.store') }}" method="POST" id="reservation-form">
                        @csrf
                        <div class="row">
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
                            <div class="col-md-6">
                                
                                <div class="mb-3">
                                    <label for="numero_documento" class="form-label">Número de Documento</label>
                                    <input type="number" class="form-control" id="numero_documento" name="numero_documento" required>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="nombres" class="form-label">Nombres completos</label>
                                    <input type="text" class="form-control" id="nombres" name="nombres" required>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="apellidos" class="form-label">Apellidos completos</label>
                                    <input type="text" class="form-control" id="apellidos" name="apellidos" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="telefono" class="form-label">Teléfono</label>
                                    <input type="number" class="form-control" id="telefono" name="telefono" required>
                                </div>
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
                            </div>
                                <div class="mb-3">
                                    <label for="especialidad" class="form-label">Especialidad</label>
                                    <select class="form-select" id="genero" name="especialidad" required>
                                        <option value="" disabled selected>Seleccionar especialidad...</option>
                                        <option value="terapia_fisica">TERAPIA FISICA Y REHABILITACION</option>
                                    </select>
                                </div>
                                <div>
                                    <div class="col-lg-6">
                                        <div class="mt-3">
                                            <label class="form-label mb-0">Fecha y hora</label>
                                            <input type="text" class="form-control" data-provider="flatpickr" data-date-format="d M, Y H:i" data-minDate="today" data-enable-time="true" name="fecha_hora">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <div class="col-12 text-center mt-4">
                            <button type="submit" class="btn btn-success">Enviar Reserva</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Agregar un evento cuando el documento esté listo
    document.addEventListener("DOMContentLoaded", function() {
        // Seleccionar el elemento del alert
        var successAlert = document.getElementById("success-alert");

        // Verificar si el elemento del alert existe
        if (successAlert) {
            // Establecer un temporizador para ocultar el alert después de 2 segundos
            setTimeout(function() {
                successAlert.style.display = "none";
            }, 2000); // 2000 milisegundos = 2 segundos
        }
    });
</script>
@endsection
