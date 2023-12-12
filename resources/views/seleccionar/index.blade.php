@extends('layouts.admin')

@section('content')

<link href='https://cdn.jsdelivr.net/npm/fullcalendar@3.10.5/dist/fullcalendar.min.css' rel='stylesheet' />
<style>
    .listado-busqueda {
  width: 240px;
  float: right;
}
.listado-busqueda input {
  width: calc(100% - 70px);
  display: inline-block;
}
</style>

<div class="container-fluid">
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Reservar Cita</h4>
        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-12">
        <div class="row">
            <div class="col-xl-3">
                <div class="card card-h-100">
                    <div class="card-body">
                        <button class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#agregarModal"><i class="mdi mdi-plus"></i> Nueva reserva</button>

                    </div>
                </div>
                
                <div class="card">
                    <div class="card-header align-items-center d-flex border-bottom-dashed">
                        <h4 class="card-title mb-0 flex-grow-1">Consultas</h4>
                        <div class="flex-shrink-0">
                        <form method="GET" class="listado-busqueda">
                            <input type="text" placeholder="Ingrese DNI" name="s" class="form-control input-sm"
                                value="<?php if (!empty($_GET['s'])) echo $_GET['s']; ?>" />
                            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                        </form>
                        </div>
                    </div>

                    <div class="card-body">
                        <div data-simplebar style="height: 235px;" class="mx-n3 px-3">
                            <div class="vstack gap-3">
                                @foreach ($clientes as $cliente)
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1">
                                    <h5 class="fs-13 mb-0">
                                            {{
                                                \Illuminate\Support\Str::limit(
                                                    $cliente->nombres . ' ' . $cliente->apellidos,
                                                    15,
                                                    $end='...'
                                                )
                                            }}
                                    </h5>

                                        <p class="fs-13 text-muted mb-0">{{ $cliente->especialidad }}</p>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <small class="badge bg-primary-subtle text-primary ms-auto">
                                            {{ \Carbon\Carbon::parse($cliente->fecha_hora)->format('m/d/Y - h:i A') }}
                                        </small>
                                    </div>
                                    <a href="#" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editarModal{{ $cliente->id }}" style="padding: 0.15rem 0.3rem; font-size: 0.6rem; margin-left:30px">
                                        <i class="fas fa-eye"></i> 
                                    </a>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <!--end card-->
            </div> <!-- end col-->

            <div class="col-xl-9">
                <div class="card card-h-100">
                    <div class="card-body">
                        <div id="calendar"></div>
                    </div>
                </div>
            </div><!-- end col -->
        </div>
        <!--end row-->

        <!-- modal -->
        <div class="modal fade" id="agregarModal" tabindex="-1" aria-labelledby="crearModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header p-3 bg-soft-info">
                    <h5 class="modal-title" id="crearModalLabel">Nuevo registro</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('lstpsicologia.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="numero_documento" class="form-label">Número de Documento</label>
                                    <input type="number" class="form-control" id="numero_documento" name="numero_documento" oninput="limitarCaracteres(this, 40)"required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="tipo_documento" class="form-label">Documento</label>
                                    <select class="form-select" id="tipo_documento" name="tipo_documento"required>
                                        <option value="" disabled selected>Tipo de documento...</option>
                                        <option value="DNI">DNI</option>
                                        <option value="Pasaporte">Pasaporte</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="nombres" class="form-label">Nombres</label>
                                    <input type="text" class="form-control" id="nombres" name="nombres" oninput="limitarCaracteres(this, 45)"required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="apellidos" class="form-label">Apellidos</label>
                                    <input type="text" class="form-control" id="apellidos" name="apellidos" oninput="limitarCaracteres(this, 45)"required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="fecha_hora" class="form-label">Fecha y Hora</label>
                                    <input type="datetime-local" class="form-control" id="fecha_hora" name="fecha_hora" required>
                                </div>
                            </div>
                            
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="especialidad" class="form-label">Especialidad</label>
                                        <select class="form-select" id="especialidad" name="especialidad"required>
                                            <option value="" disabled selected>Seleccionar especialidad...</option>
                                            <option value="Psicologia">Psicologia</option>
                                            <option value="Terapia fisica">Terapia fisica</option>
                                            <option value="Terapia infantil">Terapia infantil</option>
                                            <option value="Terapia ocupacional">Terapia ocupacional</option>
                                            <option value="Terapia lenguaje">Terapia lenguaje</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                        <div class="row">
                            <div class="col-8">
                                <div class="mb-3">
                                    <label for="telefono" class="form-label">Teléfono</label>
                                    <input type="number"  class="form-control" id="telefono" name="telefono" oninput="limitarCaracteres(this, 15)"required>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="genero" class="form-label">Genero</label>
                                    <select class="form-select" id="genero" name="genero"required>
                                        <option value="" disabled selected>Seleccionar genero...</option>
                                        <option value="Masculino">Masculino</option>
                                        <option value="Femenino">Femenino</option>
                                        <option value="Otro">Otro</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Registrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<!-- modal -->

<!-- Modal para ver -->
@foreach ($clientes as $cliente)
    <div class="modal fade" id="editarModal{{ $cliente->id }}" tabindex="-1" aria-labelledby="editarModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header p-3 bg-soft-info">
                    <h5 class="modal-title" id="editarModalLabel">Ver Cliente</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <h5 class="fs-13 mb-2">
                                <i class="fas fa-user"></i> {{ $cliente->nombres }} {{ $cliente->apellidos }}
                            </h5>
                            <h5 class="fs-13 mb-2">
                                <i class="fas fa-id-card"></i> {{ $cliente->numero_documento }}
                            </h5>
                            <h5 class="fs-13 mb-2">
                                <i class="far fa-calendar"></i> {{ \Carbon\Carbon::parse($cliente->fecha_hora)->format('m/d/Y') }}
                            </h5>
                            <h5 class="fs-13 mb-2">
                                <i class="far fa-clock"></i> {{ \Carbon\Carbon::parse($cliente->fecha_hora)->format('h:i A') }}
                            </h5>
                            <h5 class="fs-13 mb-2">
                                <i class="fas fa-briefcase"></i> {{ $cliente->especialidad }}
                            </h5>
                            <h5 class="fs-13 mb-2">
                                <i class="fas fa-phone"></i> {{ $cliente->telefono }}
                            </h5>
                            <h5 class="fs-13 mb-2">
                                <i class="fas fa-venus-mars"></i> {{ $cliente->genero }}
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach

        <div style='clear:both'></div>

        <!-- Add New Event MODAL -->
        <div class="modal fade" id="event-modal" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content border-0">
                    <div class="modal-header p-3 bg-soft-info">
                        <h5 class="modal-title" id="modal-title">Event</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                    </div>
                    <div class="modal-body p-4">
                        <form class="needs-validation" name="event-form" id="form-event" novalidate>
                            <div class="text-end">
                                <a href="#" class="btn btn-sm btn-soft-primary" id="edit-event-btn" data-id="edit-event" onclick="editEvent(this)" role="button">Edit</a>
                            </div>
                            <div class="event-details">
                                <div class="d-flex mb-2">
                                    <div class="flex-grow-1 d-flex align-items-center">
                                        <div class="flex-shrink-0 me-3">
                                            <i class="ri-calendar-event-line text-muted fs-16"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="d-block fw-semibold mb-0" id="event-start-date-tag"></h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center mb-2">
                                    <div class="flex-shrink-0 me-3">
                                        <i class="ri-time-line text-muted fs-16"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="d-block fw-semibold mb-0"><span id="event-timepicker1-tag"></span> - <span id="event-timepicker2-tag"></span></h6>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center mb-2">
                                    <div class="flex-shrink-0 me-3">
                                        <i class="ri-map-pin-line text-muted fs-16"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="d-block fw-semibold mb-0"> <span id="event-location-tag"></span></h6>
                                    </div>
                                </div>
                                <div class="d-flex mb-3">
                                    <div class="flex-shrink-0 me-3">
                                        <i class="ri-discuss-line text-muted fs-16"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <p class="d-block text-muted mb-0" id="event-description-tag"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="row event-form">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label">Type</label>
                                        <select class="form-select d-none" name="category" id="event-category" required>
                                            <option value="bg-soft-danger">Danger</option>
                                            <option value="bg-soft-success">Success</option>
                                            <option value="bg-soft-primary">Primary</option>
                                            <option value="bg-soft-info">Info</option>
                                            <option value="bg-soft-dark">Dark</option>
                                            <option value="bg-soft-warning">Warning</option>
                                        </select>
                                        <div class="invalid-feedback">Please select a valid event category</div>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label">Event Name</label>
                                        <input class="form-control d-none" placeholder="Enter event name" type="text" name="title" id="event-title" required value="" />
                                        <div class="invalid-feedback">Please provide a valid event name</div>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label>Event Date</label>
                                        <div class="input-group d-none">
                                            <input type="text" id="event-start-date" class="form-control flatpickr flatpickr-input" placeholder="Select date" readonly required>
                                            <span class="input-group-text"><i class="ri-calendar-event-line"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-12" id="event-time">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label class="form-label">Start Time</label>
                                                <div class="input-group d-none">
                                                    <input id="timepicker1" type="text" class="form-control flatpickr flatpickr-input" placeholder="Select start time" readonly>
                                                    <span class="input-group-text"><i class="ri-time-line"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label class="form-label">End Time</label>
                                                <div class="input-group d-none">
                                                    <input id="timepicker2" type="text" class="form-control flatpickr flatpickr-input" placeholder="Select end time" readonly>
                                                    <span class="input-group-text"><i class="ri-time-line"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="event-location">Location</label>
                                        <div>
                                            <input type="text" class="form-control d-none" name="event-location" id="event-location" placeholder="Event location">
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" id="eventid" name="eventid" value="" />
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label">Description</label>
                                        <textarea class="form-control d-none" id="event-description" placeholder="Enter a description" rows="3" spellcheck="false"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="hstack gap-2 justify-content-end">
                                <button type="button" class="btn btn-soft-danger" id="btn-delete-event"><i class="ri-close-line align-bottom"></i> Delete</button>
                                <button type="submit" class="btn btn-success" id="btn-save-event">Add Event</button>
                            </div>
                        </form>
                    </div>
                </div> 
            </div> 
        </div> 
        
    </div>
</div> 

</div>

<script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>
    <script src="assets/libs/feather-icons/feather.min.js"></script>
    <script src="assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
    <script src="assets/js/plugins.js"></script>

   
<script src='https://cdn.jsdelivr.net/npm/moment@2/min/moment.min.js'></script>
<script src='https://cdn.jsdelivr.net/npm/jquery@3/dist/jquery.min.js'></script>
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@3.10.5/dist/fullcalendar.min.js'></script>
<script src="assets/js/app.js"></script>

<script>

    $(function() {
        $('#calendar').fullCalendar({
        defaultView: 'agendaWeek',
        header: {
            left: 'prev,next',
            center: 'title',
            right: 'basicDay,agendaWeek,month'
        },
        events: <?php echo json_encode($eventos); ?>
        });
    });
    
</script>

@endsection