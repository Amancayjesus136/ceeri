@extends('layouts.admin')
@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card shadow p-3 mb-5 bg-white rounded">
                <div class="card-body">
                    <h3 class="card-title text-center">Reservar Citas de Psicologia</h3><br><br>
                    @if(session('success'))
                    
                    @endif

                    <form action="{{ route('lstpsicologia.store') }}" method="POST" id="reservation-form">
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
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="telefono" class="form-label">Teléfono</label>
                                    <input type="number" class="form-control" id="telefono" name="telefono" required>
                                </div>
                            </div>
                            <div class="col-md-4">
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
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="fecha_hora" class="form-label">Fecha y hora</label>
                                    <input type="date" class="form-control" data-provider="flatpickr" data-date-format="d M, Y H:i" data-minDate="today" data-enable-time="true" name="fecha_hora" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mt-4">
                            <button type="submit" class="btn btn-info">
                                <i class="fas fa-paper-plane"></i> Enviar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function() {
        $('form').submit(function(e) {
            e.preventDefault();

            var form = $(this);

            $.ajax({
                type: "POST",
                url: form.attr('action'),
                data: form.serialize(),
                success: function(response) {
                    if (response.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'El paciente fue registrado exitosamente',
                            showConfirmButton: false,
                            timer: 2000
                        });

                        setTimeout(function() {
                            window.location.href = "{{ route('lstpsicologia.index') }}";
                        }, 2000);
                    }
                },
                error: function(response) {
                }
            });
        });
    });
</script>
@endsection
