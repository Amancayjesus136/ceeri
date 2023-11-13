<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

    <head>

        <meta charset="utf-8" />
        <title>Job Landing | Velzon - Admin & Dashboard Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!--Swiper slider css-->
        <link href="assets/libs/swiper/swiper-bundle.min.css" rel="stylesheet" type="text/css" />

        <!-- Layout config Js -->
        <script src="assets/js/layout.js"></script>
        <!-- Bootstrap Css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
        <!-- custom Css-->
        <link href="assets/css/custom.min.css" rel="stylesheet" type="text/css" />
        <script>//script para el campo fecha y hora
            // Obtén el campo de fecha y hora
            var fechaHoraInput = document.getElementById('fecha_hora');

            // Escucha el evento submit del formulario
            document.querySelector('form').addEventListener('submit', function() {
            // Obtiene el valor del campo datetime-local
            var fechaHora = fechaHoraInput.value;

            // Formatea la fecha y hora para que cumpla con el formato ISO 8601 (YYYY-MM-DDTHH:MM)
            // Puedes ajustar el formato según tus necesidades
            var fechaHoraFormateada = fechaHora.replace('T', ' ');

            // Asigna el valor formateado nuevamente al campo
            fechaHoraInput.value = fechaHoraFormateada;
            });

            $(document).ready(function() {
    $('#consultarBtn').click(function() {
        var tipoDocumento = $('#tipoDocumento').val();
        var numeroDocumento = $('#numeroDocumento').val();

        // Realizar la consulta AJAX
        $.ajax({
            url: '',
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                tipo_documento: tipoDocumento,
                numero_documento: numeroDocumento
            },
            success: function(response) {
                // Rellenar los campos del modal con los datos de la respuesta
                if (response.psicologiaResult) {
                    $('#numero_documento').val(response.psicologiaResult.numero_documento);
                    $('#nombres').val(response.psicologiaResult.nombres);
                    // Agregar más campos según necesites
                } else if (response.terapiaFisicaResult) {
                    // Llenar campos de terapia física
                } else if (response.terapiaInfantilResult) {
                    // Llenar campos de terapia infantil
                } else if (response.terapiaLenguajeResult) {
                    // Llenar campos de terapia de lenguaje
                } else if (response.terapiaOcupacionalResult) {
                    // Llenar campos de terapia ocupacional
                } else {
                    // Manejar caso en que no se encuentren resultados
                }

                // Mostrar el modal
                $('#myModal').modal('show');
            },
            error: function(xhr) {
                console.log(xhr.responseText); // Manejar errores si es necesario
            }
        });
    });
});

        </script>
    </head>

    <body data-bs-spy="scroll" data-bs-target="#navbar-example">

        <div class="layout-wrapper landing">
            <nav class="navbar navbar-expand-lg navbar-landing fixed-top job-navbar" id="navbar">
                <div class="container-fluid custom-container">
                    <a class="navbar-brand" href="index.html">
                        <!-- <img src="assets/images/logo-dark.png" class="card-logo card-logo-dark" alt="logo dark" height="50"> -->
                        <!-- <img src="assets/images/logo-light.png" class="card-logo card-logo-light" alt="logo light" height="50"> -->
                    </a>
                    <button class="navbar-toggler py-0 fs-20 text-body" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="mdi mdi-menu"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mx-auto mt-2 mt-lg-0" id="navbar-example">
                            <li class="nav-item">
                                <a class="nav-link active" href="#hero">Inicio</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Quienes somos
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#conocenos">Conocenos</a>
                                    <a class="dropdown-item" href="#process">Como reservar tu cita</a>
                                    <a class="dropdown-item" href="#blog">Lo que ofrecemos</a>
                                    <a class="dropdown-item" href="#candidates">Especialistas</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Ayuda</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#agregarModal">Reserva tu cita</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#contactanos">Contactanos</a>
                            </li>
                        </ul>
                    
                        <div class="">
                            <a href="{{ route('login') }}" class="btn btn-soft-primary"><i class="ri-user-3-line align-bottom me-1"></i> Iniciar Sesión</a>
                        </div>
                    </div>
                    

                </div>
            </nav>
            

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
                            <label for="genero" class="form-label">Género</label>
                            <select class="form-select" id="genero" name="genero">
                                <option value="" disabled selected>Seleccionar género...</option>
                                <option value="Masculino">Masculino</option>
                                <option value="Femenino">Femenino</option>
                                <option value="Otro">otro</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="telefono" class="form-label">Teléfono</label>
                            <input type="number" class="form-control" id="telefono" name="telefono">   
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
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary" style="margin-top: 25px;">Reservar cita</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal para Crear Nuevo reserva -->
            <style>
                .bg-verde {
                    background-color: #BEDA13; 
                }
                .bg-crema {
                    background-color: #499BE7;
                }
                .texto-azul {
                    color: white;
                }
                .navbar-light .navbar-nav .nav-link {
                    color: white;
                }
                .bg-soft-warning {
                    color: green;
                }
                .circle-icon {
                    width: 80px;
                    height: 80px;
                    border-radius: 50%;
                    background-color:#499BE7;
                    color: white;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    text-align: center;
                    margin: 10px;
                }

                .circle-text {
                    text-align: center;
                    margin: 10px;
                }

                .circle-text a {
                    color: #007bff;
                    text-decoration: none;
                    font-weight: bold;
                }

                .circle-text a:hover {
                    text-decoration: underline;
                }
            </style>

            <!-- start hero section -->
            <section class="section job-hero-section bg-crema pb-0" id="hero">
                <div class="container">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-lg-6">
                            <div>
                            <h1 class="display-6 fw-semibold text-capitalize mb-3 lh-base texto-azul">Consulta tu cita en menos de lo que esperas</h1>
                                <p  style="color: white;">Brindamos a nuestros usuarios la facilidad de consultar sus citas por si se les olvidaron.</p>
                                @if(session('error'))
    <div class="alert alert-danger mt-3">
        {{ session('error') }}
    </div>
@endif

@if(session('success'))
    <div class="alert alert-success mt-3">
        {{ session('success') }}
    </div>

    {{-- Verificar si session('resultados') no es null --}}
    @if(session('resultados'))
        {{-- Modal Bootstrap --}}
        <div class="modal fade" id="resultadosModal" tabindex="-1" role="dialog" aria-labelledby="resultadosModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="resultadosModalLabel">Resultados de la Consulta</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {{-- Mostrar los resultados --}}
                        @foreach (session('resultados') as $key => $resultado)
                            {{-- Muestra los detalles según la estructura de tu array --}}
                            {{-- Por ejemplo, para psicologia --}}
                            @if (isset($resultado->psicologia))
                                {{-- Muestra los detalles de psicologia --}}
                                {{ $resultado->psicologia->nombres }}
                                {{-- ... --}}
                            @endif
                            {{-- Repite para otras consultas --}}
                        @endforeach
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>

        {{-- Script para mostrar el modal --}}
        <script>
            $(document).ready(function () {
                // Manejar clic en el botón de Consultar
                $('.submit-btn').click(function (e) {
                    e.preventDefault(); // Evitar que el formulario se envíe

                    // Obtener datos del formulario
                    var formData = $('form.job-panel-filter').serialize();

                    // Realizar la solicitud al servidor
                    $.ajax({
                        type: 'POST',
                        url: '{{ route('consultadni') }}',
                        data: formData,
                        success: function (data) {
                            // Mostrar el resultado en un cuadro de éxito
                            $('#success-container').html('<div class="alert alert-success mt-3">' + data + '</div>');
                        },
                        error: function (error) {
                            console.log('Error en la solicitud AJAX:', error);
                        }
                    });
                });
            });
        </script>
    @else
        <div class="alert alert-warning mt-3">
            No hay resultados para mostrar.
        </div>
    @endif
@endif

<form action="{{ route('consultadni') }}" class="job-panel-filter" method="post">
    @csrf
    <div class="row g-md-0 g-2">
        <div class="col-md-4">
            <div>
                <select class="form-control" name="tipoDocumento">
                    <option value="">Seleccionar tipo</option>
                    <option value="DNI">DNI</option>
                    <option value="Pasaporte">Pasaporte</option>
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div>
                <input type="number" name="numeroDocumento" class="form-control filter-input-box" placeholder="Insertar dato...">
            </div>
        </div>
        <div class="col-md-4">
            <div class="h-100">
                <button class="btn btn-primary submit-btn w-100 h-100" type="submit">
                    <i class="ri-search-2-line align-bottom me-1"></i> Consultar
                </button>
            </div>
        </div>
    </div>
</form>

<div id="success-container"></div>



                                <!-- Contenido del modal -->
                                <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="crearModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="crearModalLabel">Consulta tu Reserva</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                @if(isset($psicologiaResult))
                                                    <div class="mb-3">
                                                        <label for="numero_documento" class="form-label">Número de Documento</label>
                                                        <input type="number" class="form-control" id="numero_documento" name="numero_documento" value="{{ $psicologiaResult->numero_documento }}">
                                                    </div>
                                                    <!-- Mostrar otros campos según necesites -->
                                                @elseif(isset($terapiaFisicaResult))
                                                    <!-- Mostrar campos de Terapia Fisica aquí -->
                                                @elseif(isset($terapiaInfantilResult))
                                                    <!-- Mostrar campos de Terapia Infantil aquí -->
                                                @elseif(isset($terapiaLenguajeResult))
                                                    <!-- Mostrar campos de Terapia Lenguaje aquí -->
                                                @elseif(isset($terapiaOcupacionalResult))
                                                    <!-- Mostrar campos de Terapia Ocupacional aquí -->
                                                @else
                                                    <p>No se encontraron resultados.</p>
                                                @endif

                                                <button type="button" class="btn btn-success ml-auto" data-bs-dismiss="modal">Retroceder</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <!-- Modal para Crear Nuevo reserva -->
                                <!-- Modal -->
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-lg-4">
                            <div class="position-relative home-img text-center mt-5 mt-lg-0">
                                <div class="card p-3 rounded shadow-lg inquiry-box">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-sm flex-shrink-0 me-3">
                                            <div class="avatar-title bg-soft-warning text-warning rounded fs-18">
                                                <a class="nav-link" href="https://wa.me/+51963795809">
                                                    <i class="ri-whatsapp-line"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <h5 class="fs-15 lh-base mb-0">Contactanos por WhatsApp</h5>
                                    </div>
                                </div>

                                
                                <img src="assets/images/job-profile2.png" alt="" class="user-img">

                                <div class="circle-effect">
                                    <div class="circle"></div>
                                    <div class="circle2"></div>
                                    <div class="circle3"></div>
                                    <div class="circle4"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                </div>
                <!-- end container -->
            </section>
            <!-- end hero section -->

            <section class="section" id="process">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="text-center mb-5">
                                <h1 class="mb-3 ff-secondary fw-semibold lh-base">{{ $cita->titulo_reservar }}</h1>
                                <p class="text-muted">{{ $cita->descripcion_reservar }}</p>
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!--end row-->
                    <div class="row"> 
                    @foreach($numeros as $numero)
                        <div class="col-lg-3 col-md-6">
                            <div class="card shadow-lg">
                                <div class="card-body p-4">
                                    <h1 class="fw-bold display-5 ff-secondary mb-4 text-success position-relative">
                                        <div class="job-icon-effect"></div>
                                        <span>{{ $numero->numero }}</span>
                                    </h1>
                                    <h6 class="fs-17 mb-2">{{ $numero->titulo_numero }}</h6>
                                    <p class="text-muted mb-0 fs-15">{{ $numero->descripcion_numero }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </div>
                </div>
                <!--end container-->
            </section>

            <!-- start features -->
        <div id="conocenos">
            <section class="section">
                <div class="container">
                    <div class="row align-items-center justify-content-lg-between justify-content-center gy-4">
                        <div class="col-lg-5 col-sm-7">
                            <div class="about-img-section mb-5 mb-lg-0 text-center">
                                

                                <div class="card feedback-box">
                                    <div class="card-body d-flex shadow-lg">
                                        <div class="flex-shrink-0 me-3">
                                            <img src="assets/images/users/avatar-10.jpg" alt="" class="avatar-sm rounded-circle">
                                        </div>
                                        <div class="flex-grow-1">
                                            <h5 class="fs-14 lh-base mb-0">Ceeri</h5>
                                            <p class="text-muted fs-11 mb-1">Clínica De Fisioterapia.</p>

                                            <div class="text-warning">
                                                <i class="ri-star-s-fill"></i>
                                                <i class="ri-star-s-fill"></i>
                                                <i class="ri-star-s-fill"></i>
                                                <i class="ri-star-s-fill"></i>
                                                <i class="ri-star-s-line"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <img src="assets/images/2.jpg" alt="" class="img-fluid mx-auto rounded-3" style="height: 400px;" />
                            </div>
                        </div>
                        
                        
                        <div class="col-lg-6">
                            <div class="text-muted">
                                <h1 class="mb-3 lh-base"><span class="text-primary">{{ $conoceno->titulo_conocenos }}</h1>
                                <p class="ff-secondary fs-16 mb-2">{{ $conoceno->descripcion_conocenos }}
                                <p class="ff-secondary fs-16">{{ $conoceno->descripcion2_conocenos }}</p>
                                <div class="vstack gap-2 mb-4 pb-1">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0 me-2">
                                            <div class="avatar-xs icon-effect">
                                                <div class="avatar-title bg-transparent text-success rounded-circle h2">
                                                    <i class="ri-check-fill"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1">
                                            <p class="mb-0">{{ $conoceno->sub1 }}</p>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0 me-2">
                                            <div class="avatar-xs icon-effect">
                                                <div class="avatar-title bg-transparent text-success rounded-circle h2">
                                                    <i class="ri-check-fill"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1">
                                            <p class="mb-0">{{ $conoceno->sub2 }}</p>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0 me-2">
                                            <div class="avatar-xs icon-effect">
                                                <div class="avatar-title bg-transparent text-success rounded-circle h2">
                                                    <i class="ri-check-fill"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1">
                                            <p class="mb-0">{{ $conoceno->sub3 }}</p>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0 me-2">
                                            <div class="avatar-xs icon-effect">
                                                <div class="avatar-title bg-transparent text-success rounded-circle h2">
                                                    <i class="ri-check-fill"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1">
                                            <p class="mb-0">{{ $conoceno->sub4 }}</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- <div>
                                    <a href="#!" class="btn btn-primary">Find Your Jobs <i class="ri-arrow-right-line align-bottom ms-1"></i></a>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

             <!-- Aqui empiezan los modals en el boton "VISTA" LO QUE OFRECEMOS -->
             <section class="section" id="blog">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="text-center mb-5">
                                <h1 class="mb-3 ff-secondary fw-semibold text-capitalize lh-base">LO QUE OFRECEMOS</h1>
                                <p class="text-muted mb-4">Ofrecemos nuestra experiencia, seguridad y sobre todo transmitir confianza mostrando nuestros trabajo de día a día.</p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <img src="assets/images/N1.jpg" alt="" class="img-fluid rounded" />
                                </div>
                                <div class="card-body">
                                    <a href="javascript:void(0);">
                                        <h5>Terapia Física y Rehabilitación</h5>
                                    </a>
                                    <p class="text-muted fs-14">Tratamiento que se enfoca en mejorar la función física, la movilidad y la calidad de vida de las personas.</p>
                                    <div>
                                        <a href="#!"  data-bs-toggle="modal" data-bs-target="#tfisica" class="link-success">Vista <i class="ri-arrow-right-line align-bottom ms-1"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <img src="assets/images/N2.jpg" alt="" class="img-fluid rounded" />
                                </div>
                                <div class="card-body">
                                    <a href="javascript:void(0);">
                                        <h5>Terapia de lenguaje</h5>
                                    </a>
                                    <p class="text-muted fs-14">Tratamiento que se enfoca en mejorar la función física, la movilidad y la calidad de vida de las personas.</p>
                        
                                    <div>
                                        <a href="#!"  data-bs-toggle="modal" data-bs-target="#tlenguaje" class="link-success">Vista <i class="ri-arrow-right-line align-bottom ms-1"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <img src="assets/images/N3.jpg" alt="" class="img-fluid rounded" />
                                </div>
                                <div class="card-body">
                                    <a href="javascript:void(0);">
                                        <h5>Terapia Ocupacional</h5>
                                    </a>
                                    <p class="text-muted fs-14">Tratamiento que se enfoca en mejorar la función física, la movilidad y la calidad de vida de las personas.</p>
                                    <div>
                                        <a href="#!"  data-bs-toggle="modal" data-bs-target="#tocupacional" class="link-success" data-bs-toggle="modal" data-bs-target="#tocupacional">Vista <i class="ri-arrow-right-line align-bottom ms-1"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <img src="assets/images/N4.jpg" alt="" class="img-fluid rounded" />
                                </div>
                                <div class="card-body">
                                    <a href="javascript:void(0);">
                                        <h5>Terapia infantil</h5>
                                    </a>
                                    <p class="text-muted fs-14">Tratamiento que se enfoca en mejorar la función física, la movilidad y la calidad de vida de las personas.</p>
                                    <div>
                                        <a href="#!" data-bs-toggle="modal" data-bs-target="#tinfantil" class="link-success">Vista <i class="ri-arrow-right-line align-bottom ms-1"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                <img src="assets/images/N5.jpg" alt="" class="img-fluid rounded" />

                                </div>
                                <div class="card-body">
                                    <a href="javascript:void(0);">
                                        <h5>Psicología</h5>
                                    </a>
                                    <p class="text-muted fs-14">Tratamiento que se enfoca en mejorar la función física, la movilidad y la calidad de vida de las personas.</p>
                                    <div>
                                        <a href="#!"  data-bs-toggle="modal" data-bs-target="#psicologia"  class="link-success">Vista <i class="ri-arrow-right-line align-bottom ms-1"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <img src="assets/images/N4.jpg" alt=""/>
                                </div>
                                <div class="card-body">
                                    <a href="javascript:void(0);">
                                        <h5>Los mejores equipos en Terapias</h5>
                                    </a>
                                    <p class="text-muted fs-14">Tratamiento que se enfoca en mejorar la función física, la movilidad y la calidad de vida de las personas.</p>
                                    <div>
                                        <a href="#!"  data-bs-toggle="modal" data-bs-target="#equipos" class="link-success">Vista <i class="ri-arrow-right-line align-bottom ms-1"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- start candidates -->
            <section class="section bg-light" id="candidates">
                <div class="bg-overlay bg-overlay-pattern"></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="text-center mb-5">
                                <h1 class="mb-3 ff-secondary fw-semibold text-capitalize lh-base">MIRA NUESTRA <span class="text-primary">GALERÍA</span></h1>
                                <p class="text-muted mb-4">Hiring experts costs more per hour than hiring entry- or mid-level freelancers, but they can usually get the work done faster—and better.</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="swiper candidate-swiper">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="card text-center">
                                            <div class="card-body p-4">
                                                <img src="assets/images/G1.jpg" alt="" class="rounded-circle avatar-md mx-auto d-block">
                                                <h5 class="fs-17 mt-3 mb-2">Nancy Martino</h5>
                                                <p class="text-muted fs-13 mb-3">Terapia Física y Rehabilitación</p>

                                                <p class="text-muted mb-4 fs-14">
                                                    <i class="ri-map-pin-2-line text-primary me-1 align-bottom"></i> Villa El Salvador
                                                </p>

                                                <a href="#!" class="btn btn-primary w-100">Ver detalles</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="card text-center">
                                            <div class="card-body p-4">
                                                <img src="assets/images/G1.jpg" alt="" class="rounded-circle avatar-md mx-auto d-block">
                                                <h5 class="fs-17 mt-3 mb-2">Glen Matney</h5>
                                                <p class="text-muted fs-13 mb-3">Terapia de lenguaje</p>
                                        
                                                <p class="text-muted mb-4 fs-14">
                                                    <i class="ri-map-pin-2-line text-primary me-1 align-bottom"></i> Villa El Salvador
                                                </p>
                                        
                                                <a href="#!" class="btn btn-primary w-100">Ver detalles</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="card text-center">
                                            <div class="card-body p-4">
                                                <img src="assets/images/G2.jpg" alt="" class="rounded-circle avatar-md mx-auto d-block">
                                                <h5 class="fs-17 mt-3 mb-2">Alexis Clarke</h5>
                                                <p class="text-muted fs-13 mb-3">Terapia Ocupacional</p>
                                        
                                                <p class="text-muted mb-4 fs-14">
                                                    <i class="ri-map-pin-2-line text-primary me-1 align-bottom"></i> Villa El Salvador
                                                </p>
                                        
                                                <a href="#!" class="btn btn-primary w-100">Ver detalles</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="card text-center">
                                            <div class="card-body p-4">
                                                <img src="assets/images/G3.jpg" alt="" class="rounded-circle avatar-md mx-auto d-block" />
                                                <h5 class="fs-17 mt-3 mb-2">James Price</h5>
                                                <p class="text-muted fs-13 mb-3">Terapia infantil</p>
                                        
                                                <p class="text-muted mb-4 fs-14">
                                                    <i class="ri-map-pin-2-line text-primary me-1 align-bottom"></i> Villa El Salvador
                                                </p>
                                        
                                                <a href="#!" class="btn btn-primary w-100">Ver detalles</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="card text-center">
                                            <div class="card-body p-4">
                                                <img src="assets/images/G4.jpg" alt="" class="rounded-circle avatar-md mx-auto d-block" />
                                                <h5 class="fs-17 mt-3 mb-2">Michael Morris</h5>
                                                <p class="text-muted fs-13 mb-3">Psicología</p>
                                        
                                                <p class="text-muted mb-4 fs-14">
                                                    <i class="ri-map-pin-2-line text-primary me-1 align-bottom"></i> Villa El Salvador
                                                </p>
                                        
                                                <a href="#!" class="btn btn-primary w-100">Ver detalles</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="card text-center">
                                            <div class="card-body p-4">
                                                <img src="assets/images/G5.jpg" alt="" class="rounded-circle avatar-md mx-auto d-block" />
                                                <h5 class="fs-17 mt-3 mb-2">Michael Morris</h5>
                                                <p class="text-muted fs-13 mb-3">Terapia Física y Rehabilitación</p>
                                        
                                                <p class="text-muted mb-4 fs-14">
                                                    <i class="ri-map-pin-2-line text-primary me-1 align-bottom"></i> Villa El Salvador
                                                </p>
                                        
                                                <a href="#!" class="btn btn-primary w-100">Ver detalles</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="card text-center">
                                            <div class="card-body p-4">
                                                <img src="assets/images/G6.jpg" alt="" class="rounded-circle avatar-md mx-auto d-block" />
                                                <h5 class="fs-17 mt-3 mb-2">Michael Morris</h5>
                                                <p class="text-muted fs-13 mb-3">Terapia de lenguaje</p>
                                        
                                                <p class="text-muted mb-4 fs-14">
                                                    <i class="ri-map-pin-2-line text-primary me-1 align-bottom"></i> Villa El Salvador
                                                </p>
                                        
                                                <a href="#!" class="btn btn-primary w-100">Ver detalles</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="card text-center">
                                            <div class="card-body p-4">
                                                <img src="assets/images/G7.jpg" alt="" class="rounded-circle avatar-md mx-auto d-block" />
                                                <h5 class="fs-17 mt-3 mb-2">Michael Morris</h5>
                                                <p class="text-muted fs-13 mb-3">Terapia de lenguaje</p>
                                        
                                                <p class="text-muted mb-4 fs-14">
                                                    <i class="ri-map-pin-2-line text-primary me-1 align-bottom"></i> Villa El Salvador
                                                </p>
                                        
                                                <a href="#!" class="btn btn-primary w-100">Ver detalles</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="card text-center">
                                            <div class="card-body p-4">
                                                <img src="assets/images/G8.jpg" alt="" class="rounded-circle avatar-md mx-auto d-block" />
                                                <h5 class="fs-17 mt-3 mb-2">Michael Morris</h5>
                                                <p class="text-muted fs-13 mb-3">Terapia infantil</p>
                                        
                                                <p class="text-muted mb-4 fs-14">
                                                    <i class="ri-map-pin-2-line text-primary me-1 align-bottom"></i> Villa El Salvador
                                                </p>
                                        
                                                <a href="#!" class="btn btn-primary w-100">Ver detalles</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="card text-center">
                                            <div class="card-body p-4">
                                                <img src="assets/images/G9.jpg" alt="" class="rounded-circle avatar-md mx-auto d-block" />
                                                <h5 class="fs-17 mt-3 mb-2">Michael Morris</h5>
                                                <p class="text-muted fs-13 mb-3">Psicología</p>
                                        
                                                <p class="text-muted mb-4 fs-14">
                                                    <i class="ri-map-pin-2-line text-primary me-1 align-bottom"></i> Villa El Salvador
                                                </p>
                                        
                                                <a href="#!" class="btn btn-primary w-100">Ver detalles</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="card text-center">
                                            <div class="card-body p-4">
                                                <img src="assets/images/G10.jpg" alt="" class="rounded-circle avatar-md mx-auto d-block" />
                                                <h5 class="fs-17 mt-3 mb-2">Michael Morris</h5>
                                                <p class="text-muted fs-13 mb-3">Terapia Ocupacional</p>
                                        
                                                <p class="text-muted mb-4 fs-14">
                                                    <i class="ri-map-pin-2-line text-primary me-1 align-bottom"></i> Villa El Salvador
                                                </p>
                                        
                                                <a href="#!" class="btn btn-primary w-100">Ver detalles</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- start cta -->
            <div id="contactanos">
            <section class="py-5 bg-primary position-relative">
                <div class="bg-overlay bg-overlay-pattern opacity-50"></div>
                <div class="container">
                    <div class="row align-items-center gy-4">
                        <div class="col-sm">
                            <div>
                                <h4 class="text-white fw-semibold">Contactanos!</h4>
                                <p class="text-white-75 mb-0">Solo estamos a un mensaje de ayudarte.</p>
                            </div>
                        </div>
                        <div class="col-sm-auto">
                            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#agregarContactar" type="button">Contactar <i class="ri-arrow-right-line align-bottom"></i></button>
                        </div>
                    </div>
                </div>
            </section>
            </div>

            <!-- Modal -->
            <div class="modal fade rounded-circle" id="agregarContactar" tabindex="-1" aria-labelledby="crearModalLabel" aria-hidden="true">
                <div class="modal-dialog rounded-circle">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body d-flex flex-column align-items-center">
                            <div class="circle-icon mb-2">
                                <a href="#"><i class="ri-mail-send-line"></i></a>
                            </div>
                            <div class="circle-text mb-2">
                                <a href="#">Correo Electrónico</a>
                            </div>
                            <div class="circle-icon mb-2">
                                <a href="#"><i class="ri-whatsapp-line"></i></a>
                            </div>
                            <div class="circle-text">
                                <a href="#">WhatsApp</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal para Crear Nuevo reserva -->

            <!-- Start footer -->
            <footer class="custom-footer bg-dark py-5 position-relative">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 mt-4">
                            <div>
                                <div>
                                    <img src="assets/images/logo-light.png" alt="logo light" height="80" />
                                </div>
                                <div class="mt-4 fs-13">
                                    <p>Pagina web de confianza</p>
                                    <p>Nuestra calidad te brindara la mejor experiencia, ayuda y sobr todo la tranquila al solicitar nuestros servicios.</p>
                                    <ul class="list-inline mb-0 footer-social-link">
                                        <li class="list-inline-item">
                                            <a href="javascript: void(0);" class="avatar-xs d-block">
                                                <div class="avatar-title rounded-circle">
                                                    <i class="ri-facebook-fill"></i>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript: void(0);" class="avatar-xs d-block">
                                                <div class="avatar-title rounded-circle">
                                                    <i class="ri-github-fill"></i>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript: void(0);" class="avatar-xs d-block">
                                                <div class="avatar-title rounded-circle">
                                                    <i class="ri-linkedin-fill"></i>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript: void(0);" class="avatar-xs d-block">
                                                <div class="avatar-title rounded-circle">
                                                    <i class="ri-google-fill"></i>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript: void(0);" class="avatar-xs d-block">
                                                <div class="avatar-title rounded-circle">
                                                    <i class="ri-dribbble-line"></i>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-7 ms-lg-auto">
                            <div class="row">
                                <div class="col-sm-4 mt-4">
                                    <h5 class="text-white mb-0">Nosotros</h5>
                                    <div class="text-muted mt-3">
                                        <ul class="list-unstyled ff-secondary footer-list">
                                            <li><a href="#conocenos">Conocenos</a></li>
                                            <li><a href="#blog">Lo que ofrecemos</a></li>
                                            <li><a href="#candidates">Galeria</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-sm-4 mt-4">
                                    <h5 class="text-white mb-0">Citas</h5>
                                    <div class="text-muted mt-3">
                                        <ul class="list-unstyled ff-secondary footer-list">
                                            <li><a href="#">Reservar tu cita</a></li>
                                            <li><a href="#process">Como realizar tu reserva</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-sm-4 mt-4">
                                    <h5 class="text-white mb-0">Contactanos</h5>
                                    <div class="text-muted mt-3">
                                        <ul class="list-unstyled ff-secondary footer-list">
                                            <li><a href="https://wa.me/910558971">WhatsApp</a></li>
                                            <li><a href="ceerirehabilitacion14@gmail.com">Correo Electrónico</a></li>
                                            <li><a href="https://www.facebook.com/centrodeterapiafisicaceeri">Facebook</a></li>
                                            <li><a href="https://www.instagram.com/ceeri.terapiafisica/">Instagram</a></li>
                                            <li><a href="https://wa.me/910558971">Telefono personal</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row text-center text-sm-start align-items-center mt-5">
                        <div class="col-sm-6">
                            <div>
                                <p class="copy-rights mb-0">
                                    <script> document.write(new Date().getFullYear()) </script> © Ceeri
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-end mt-3 mt-sm-0">
                                <ul class="list-inline mb-0 footer-list gap-4 fs-13">
                                    <li class="list-inline-item">
                                        <a href="{{ route('politicas') }}">Politica y privacidad</a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="{{ route('condiciones') }}">Terminos y condiciones</a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="{{ route('seguridad') }}">Seguridad</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- end footer -->

            <button onclick="topFunction()" class="btn btn-info btn-icon landing-back-top" id="back-to-top">
                <i class="ri-arrow-up-line"></i>
            </button>


    <!-- Modals "Lo que ofrecemos" -->

                <!-- Modal de vista en terapia fisica -->
                <div class="modal fade" id="tfisica" tabindex="-1" aria-labelledby="crearModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="crearModalLabel">Terapia Fisica y Rehabilitación</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">

                <!-- codigo de contenido para todos -->
                <div class="row">
                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-header align-items-center d-flex">
                                <div class="flex-shrink-0">
                                    
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="live-preview">
                                    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                                        <div class="carousel-inner">
                                            <div class="carousel-item active" data-bs-interval="10000">
                                                <img src="assets/images/tfisica/fisica.png" class="d-block w-100" alt="First slide"/>
                                            </div>
                                            <div class="carousel-item active" data-bs-interval="2000">
                                                <img src="assets/images/tfisica/activo.png" class="d-block w-100" alt="two slide" width="100%" />
                                            </div>
                                            <div class="carousel-item active">
                                                <img src="assets/images/small/img-10.png" class="d-block w-100" alt="There slide" />
                                            </div>
                                        </div>
                                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>
                                    </div>
                                </div>

                                <div class="d-none code-view">
                                    <pre class="language-markup" style="height: 375px;">

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Contenido -->
                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-header align-items-center d-flex">
                                <div class="flex-shrink-0">
                                    
                                </div>
                            </div>
                            <div class="card-body">
                                <li>terapia</li>
                                <li>terapia</li>
                                <li>terapia</li>
                                <li>terapia</li>
                                <li>terapia</li>
                                <li>terapia</li>
                                <li>terapia</li>

                            </div>
                        </div>
                    </div>
                    <!-- Contenido -->

                </div>
                <!-- codigo de contenido para todos -->
            </div>
        </div>
    </div>
</div>


<!-- Modal de vista en terapia Lenguaje -->


    <!-- Modal para Crear Nuevo Tema -->
                <div class="modal fade" id="tlenguaje" tabindex="-1" aria-labelledby="crearModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="crearModalLabel">Terapia Lenguaje</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">

<!-- codigo de contenido para todos -->
<div class="row">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <div class="flex-shrink-0">
                    
                </div>
            </div>
            <div class="card-body">
                <div class="live-preview">
                    <div id="carouselExampleInterval2" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active" data-bs-interval="1000">
                                <img src="assets/images/tlenguaje/lenguaje.png" alt="First slide" width="100%"/>
                            </div>
                            <div class="carousel-item" data-bs-interval="1000">
                                <img src="assets/images/tlenguaje/img1.png" class="d-block w-100" alt="two slide" width="100%"/>
                            </div>
                            <div class="carousel-item" data-bs-interval="1000">
                                <img src="assets/images/tlenguaje/lenguaje2.png" class="d-block w-100" alt="There slide"width="100%" />
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval2" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval2" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>

                <div class="d-none code-view">
                    <pre class="language-markup" style="height: 375px;">

                </div>
            </div>
        </div>
    </div>

    <!-- Contenido -->
    <div class="col-xl-6">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <div class="flex-shrink-0">
                    
                </div>
            </div>
            <div class="card-body">
                <li>terapia</li>
                <li>terapia</li>
                <li>terapia</li>
                <li>terapia</li>
                <li>terapia</li>
                <li>terapia</li>
                <li>terapia</li>
                <li>terapia</li>
                <li>terapia</li>
                <li>terapia</li>
                <li>terapia</li>

            </div>
        </div>
    </div>
    <!-- Contenido -->

</div>
<!-- codigo de contenido para todos -->
</div>
        </div>
    </div>
</div>



    <!-- Modal de vista en terapia ocupacional -->

    <div class="modal fade" id="tocupacional" tabindex="-1" aria-labelledby="crearModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="crearModalLabel">Terapia ocupacional</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            
            <div class="modal-body">

<!-- codigo de contenido para todos -->
<div class="row">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <div class="flex-shrink-0">
                    
                </div>
            </div>
            <div class="card-body">
                <div class="live-preview">
                    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active" data-bs-interval="10000">
                                <img src="assets/images/prueba/pepe.png" alt="First slide" width="50%"/>
                            </div>
                            <div class="carousel-item" data-bs-interval="2000">
                                <img src="assets/images/small/img-11.jpg" class="d-block w-100" alt="two slide" />
                            </div>
                            <div class="carousel-item">
                                <img src="assets/images/small/img-10.jpg" class="d-block w-100" alt="There slide" />
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>

                <div class="d-none code-view">
                    <pre class="language-markup" style="height: 375px;">

                </div>
            </div>
        </div>
    </div>

    <!-- Contenido -->
    <div class="col-xl-6">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <div class="flex-shrink-0">
                    
                </div>
            </div>
            <div class="card-body">
                <li>terapia</li>
                <li>terapia</li>
                <li>terapia</li>
                <li>terapia</li>
                <li>terapia</li>
                <li>terapia</li>
                <li>terapia</li>
                <li>terapia</li>
                <li>terapia</li>
                <li>terapia</li>
                <li>terapia</li>
                <li>terapia</li>

            </div>
        </div>
    </div>
    <!-- Contenido -->

</div>
<!-- codigo de contenido para todos -->
</div>
            </div>
        </div>
    </div>
</div>


        <!-- Modal de vista en terapia infantil -->

        <div class="modal fade" id="tinfantil" tabindex="-1" aria-labelledby="crearModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="crearModalLabel">Terapia infantil</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">

<!-- codigo de contenido para todos -->
<div class="row">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <div class="flex-shrink-0">
                    
                </div>
            </div>
            <div class="card-body">
                <div class="live-preview">
                    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active" data-bs-interval="10000">
                                <img src="assets/images/prueba/pepe.png" alt="First slide" width="50%"/>
                            </div>
                            <div class="carousel-item" data-bs-interval="2000">
                                <img src="assets/images/small/img-11.jpg" class="d-block w-100" alt="two slide" />
                            </div>
                            <div class="carousel-item">
                                <img src="assets/images/small/img-10.jpg" class="d-block w-100" alt="There slide" />
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>

                <div class="d-none code-view">
                    <pre class="language-markup" style="height: 375px;">

                </div>
            </div>
        </div>
    </div>

    <!-- Contenido -->
    <div class="col-xl-6">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <div class="flex-shrink-0">
                    
                </div>
            </div>
            <div class="card-body">
                <li>terapia</li>
                <li>terapia</li>
                <li>terapia</li>
                <li>terapia</li>
                <li>terapia</li>
                <li>terapia</li>
                <li>terapia</li>
                <li>terapia</li>
                <li>terapia</li>

            </div>
        </div>
    </div>
    <!-- Contenido -->

</div>
<!-- codigo de contenido para todos -->
</div>
            </div>
        </div>
    </div>
</div>

        <!-- Modal de vista en Psicologia -->

 <div class="modal fade" id="psicologia" tabindex="-1" aria-labelledby="crearModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="crearModalLabel">Terapia infantil</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">

<!-- codigo de contenido para todos -->
<div class="row">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <div class="flex-shrink-0">
                    
                </div>
            </div>
            <div class="card-body">
                <div class="live-preview">
                    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active" data-bs-interval="10000">
                                <img src="assets/images/prueba/pepe.png" alt="First slide" width="50%"/>
                            </div>
                            <div class="carousel-item" data-bs-interval="2000">
                                <img src="assets/images/small/img-11.jpg" class="d-block w-100" alt="two slide" />
                            </div>
                            <div class="carousel-item">
                                <img src="assets/images/small/img-10.jpg" class="d-block w-100" alt="There slide" />
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>

                <div class="d-none code-view">
                    <pre class="language-markup" style="height: 375px;">

                </div>
            </div>
        </div>
    </div>

    <!-- Contenido -->
    <div class="col-xl-6">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <div class="flex-shrink-0">
                    
                </div>
            </div>
            <div class="card-body">
                <li>terapia</li>
                <li>terapia</li>
                <li>terapia</li>
                <li>terapia</li>
                <li>terapia</li>
                <li>terapia</li>
                <li>terapia</li>
                <li>terapia</li>

            </div>
        </div>
    </div>
    <!-- Contenido -->

</div>
<!-- codigo de contenido para todos -->
</div>
        </div>
    </div>
</div>


           <!-- Modal de vista en Equipos -->

           <div class="modal fade" id="equipos" tabindex="-1" aria-labelledby="crearModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="crearModalLabel">Equipos de técnologias</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">

<!-- codigo de contenido para todos -->
<div class="row">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <div class="flex-shrink-0">
                    
                </div>
            </div>
            <div class="card-body">
                <div class="live-preview">
                    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active" data-bs-interval="10000">
                                <img src="assets/images/prueba/pepe.png" alt="First slide" width="50%"/>
                            </div>
                            <div class="carousel-item" data-bs-interval="2000">
                                <img src="assets/images/small/img-11.jpg" class="d-block w-100" alt="two slide" />
                            </div>
                            <div class="carousel-item">
                                <img src="assets/images/small/img-10.jpg" class="d-block w-100" alt="There slide" />
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>

                <div class="d-none code-view">
                    <pre class="language-markup" style="height: 375px;">

                </div>
            </div>
        </div>
    </div>

    <!-- Contenido -->
    <div class="col-xl-6">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <div class="flex-shrink-0">
                    
                </div>
            </div>
            <div class="card-body">
                <li>terapia</li>
                <li>terapia</li>
                <li>terapia</li>
                <li>terapia</li>
                <li>terapia</li>
                <li>terapia</li>
                <li>terapia</li>
                <li>terapia</li>
                <li>terapia</li>

            </div>
        </div>
    </div>
    <!-- Contenido -->

</div>
<!-- codigo de contenido para todos -->
</div>
            </div>
        </div>
    </div>
</div>


    







        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <!-- Agrega este script a tu archivo Blade para realizar la consulta AJAX -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <!-- JAVASCRIPT -->
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>
        <script src="assets/libs/feather-icons/feather.min.js"></script>
        <script src="assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
        
        <script src="assets/js/plugins.js"></script>

        <!--Swiper slider js-->
        <script src="assets/libs/swiper/swiper-bundle.min.js"></script>

        <!--job landing init -->
        <script src="assets/js/pages/job-lading.init.js"></script>
    </body>

</html>