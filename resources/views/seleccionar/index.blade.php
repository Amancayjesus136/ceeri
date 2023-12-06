@extends('layouts.admin')
@section('content')
  <style>
 
    .container {
        border: 2px;
        border-radius: 10px;
        border-color: #405189;
        border-style: solid;
        padding: 15px 15px 15px 15px;
        background-color: #405189;
    }

    label {
        font-weight: bold;
        color: white;
    }
        
    h4  {
        font-weight: bold;
    }
    .contenedor button {
      margin-top: 20px; /* Ajusta el margen superior según sea necesario */
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
  <h4 class="page-title-box d-sm-flex align-items-center justify-content-between">Reservacion de citas en todas las especialidades disponibles</h4>
@if(session('success'))
    <div id="successAlert" class="alert alert-success alert-dismissible bg-success text-white alert-label-icon fade show" role="alert">
        <i class="ri-notification-off-line label-icon"></i><strong>Éxito</strong> - Reserva registrado correctamente
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
  </div>
            <div class="container">
                <form action="{{route('lstpsicologia.index')}}" method="POST">
                    @csrf
                    <div class="row mb-1">
                        <div class="col-md-6">
                            <label for="nombres" class="form-label">Nombres</label>
                            <input type="text" class="form-control" id="nombres" name="nombres" oninput="limitarCaracteres(this, 45)">                           
                        </div>
                        <div class="col-md-6">
                            <label for="apellidos" class="form-label">Apellidos</label>
                            <input type="text" class="form-control" id="apellidos" name="apellidos" oninput="limitarCaracteres(this, 45)">
                        </div>
                    </div>
                    <div class="row mb-3">
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
                            <input type="number" class="form-control" id="numero_documento" name="numero_documento" oninput="limitarCaracteres(this, 40)">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="telefono" class="form-label">Teléfono</label>
                            <input type="number" class="form-control" id="telefono" name="telefono" oninput="limitarCaracteres(this, 15)">    
                        </div>
                        <div class="col-md-6">
                            <label for="fecha_hora" class="form-label">Fecha y Hora</label>
                            <input type="datetime-local" class="form-control" id="fecha_hora" name="fecha_hora" required>
                        </div>
                    </div>
                    <div class="row mb-3">    
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
                    <button type="submit" class="btn btn-primary" style="margin-top: 25px; font-weight: bold; background-color: skyblue;">Reservar cita</button>
                </form>
            </div>
            
<!--scripts para los numeros de caracteres -->
<script>
    function limitarCaracteres(input, maxLength) {
      if (input.value.length > maxLength) {
        input.value = input.value.slice(0, maxLength);
      }
    }
  </script>

<!--scripts para los numeros de caracteres -->

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<!-- Tu script de validación de fecha -->
<script>
     $(document).ready(function () {
        $('form').submit(function (e) {
            var selectedDateTime = new Date($('#fecha_hora').val()); // Obtiene la fecha y hora seleccionadas

            // Define el rango de horas no permitido (de 22:00 a 7:00)
            var horaInicio = 22;
            var horaFin = 7;

            // Obtiene la hora de la fecha y hora seleccionadas
            var horaSeleccionada = selectedDateTime.getHours();

            // Comprueba si la hora seleccionada está dentro del rango no permitido
            if (horaSeleccionada >= horaInicio || horaSeleccionada < horaFin) {
                // Muestra un mensaje de alerta
                alert('Horario no válido. Son horas de cierre.');
                e.preventDefault(); // Evita que se envíe el formulario
            }
        });
    });
</script>

<script>
    var successAlert = document.getElementById('successAlert');
    
    if (successAlert) {
        setTimeout(function () {
            successAlert.classList.remove('show');
            setTimeout(function () {
                window.location.reload();
            }, 1000);
        }, 2000);
    }
    
</script>



  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

@endsection