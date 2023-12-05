<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

    <head>

        <meta charset="utf-8" />
        <title>CEERI</title>
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


    <style>
        .logo {
            width: 200px;
            height: 80px;
        }
    </style>

    <body data-bs-spy="scroll" data-bs-target="#navbar-example">
        <div class="layout-wrapper landing">
            <nav class="navbar navbar-expand-lg navbar-landing fixed-top job-navbar" id="navbar">
                <img src="assets/images/logo-sinfondo.png" class="logo">
                 
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
                                <a class="nav-link" href="#hero">Inicio</a>
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
                                <option value="" disabled selected>Seleccionar especialidad...</option>
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

<!--scripts para los numeros de caracteres -->
<script>
    function limitarCaracteres(input, maxLength) {
      if (input.value.length > maxLength) {
        input.value = input.value.slice(0, maxLength);
      }
    }
  </script>

<!--scripts para los numeros de caracteres -->
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
                    @if(session('success'))
                        <div id="successAlert" class="alert alert-success alert-dismissible bg-success text-white alert-label-icon fade show" role="alert">
                            <i class="ri-notification-off-line label-icon"></i><strong>Éxito</strong> - Reserva registrado correctamente
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif  
                    <div class="row justify-content-between align-items-center">
                        <div class="col-lg-6">
                            <div>
                            <h1 class="display-6 fw-semibold text-capitalize mb-3 lh-base texto-azul">Consulta tu cita en menos de lo que esperas</h1>
                                <p  style="color: white;">Brindamos a nuestros usuarios la facilidad de consultar sus citas por si se les olvidaron.</p>
                                
                            <!-- CODIGO PARA QUE FUNCIONE LA CONSULTA DE RESERVA  -->
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

                                <<div class="modal fade fadeInRight" id="resultadoModal" tabindex="-1" aria-labelledby="resultadoModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-fullscreen-xxl-down">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="resultadoModalLabel">Resultados de Consulta</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
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

                                <script>
                                    document.addEventListener('DOMContentLoaded', function () {
                                        document.querySelector('.job-panel-filter').addEventListener('submit', function (event) {
                                            event.preventDefault();

                                            var formData = new FormData(this);

                                            fetch('{{ route("consultadni") }}', {
                                                method: 'POST',
                                                body: formData,
                                            })
                                            .then(response => response.json())
                                            .then(data => {
                                                displayResultsInModal(data);
                                            })
                                            .catch(error => {
                                                console.error('Error en la solicitud Ajax:', error);
                                            });
                                        });

                                        function displayResultsInModal(results) {
                                            var modalId = '#resultadoModal';
                                            var modalBody = document.querySelector(modalId + ' .modal-body');

                                            modalBody.innerHTML = '';

                                            for (var category in results) {
                                                if (results.hasOwnProperty(category)) {
                                                    var categoryResults = results[category];
                                                    if (categoryResults.length > 0) {
                                                        var categoryContainer = document.createElement('div');
                                                        categoryContainer.className = 'mb-4';

                                                        categoryResults.forEach(result => {
                                                            var resultCard = document.createElement('div');
                                                            resultCard.className = 'card text-center';
                                                            
                                                            var formattedDate = new Date(result.fecha_hora).toLocaleString();

                                                            resultCard.innerHTML = '<div class="card-header">' + category.replace('_', ' ').toUpperCase() + '</div>' +
                                                                                    '<div class="card-body">' +
                                                                                        '<p class="card-text">' +
                                                                                            '<strong>Tipo de Documento:</strong> ' + result.tipo_documento + '<br>' +
                                                                                            '<strong>Número de Documento:</strong> ' + result.numero_documento + '<br>' +
                                                                                            '<strong>Nombres:</strong> ' + result.nombres + '<br>' +
                                                                                            '<strong>Apellidos:</strong> ' + result.apellidos + '<br>' +
                                                                                            '<strong>Fecha y Hora:</strong> ' + formattedDate + '<br>' +
                                                                                        '</p>' +
                                                                                    '</div>';

                                                            categoryContainer.appendChild(resultCard);
                                                        });

                                                        modalBody.appendChild(categoryContainer);
                                                    }
                                                }
                                            }

                                            $(modalId).modal('show');
                                        }

                                        function guardarResultados() {

                                            alert('Implementa la lógica para guardar los resultados aquí.');
                                            $(modalId).modal('hide');
                                        }
                                    });
                                </script>
                            <!-- CODIGO PARA QUE FUNCIONE LA CONSULTA DE RESERVA  -->

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
                                    <p class="text-muted fs-14">Ayuda a personas con problemas y trastornos del habla, del lenguaje y la comunicación, así como afecciones para la deglución y la respiración.</p>
                        
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
                                    <p class="text-muted fs-14">es una rama del cuidado de la salud que ayuda a personas de todas las edades con problemas físicos, sensoriales o cognitivos. Las ayudan a ser lo más independientes posible en todos los aspectos de su vida.</p>
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
                                    <p class="text-muted fs-14">Se basa de diversas técnicas y métodos para ayudar a los pequeños que tienen problemas con sus emociones o conductas.</p>
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
                                    <p class="text-muted fs-14">La psicología social es el estudio de las relaciones sociales y cómo estas influyen y modifican la conducta, los pensamientos y sentimientos de las personas.</p>
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
                                    <p class="text-muted fs-14">el equipamiento tecnologico con el que cuenta CEERI para lidiar con los tratamientos en los pacientes</p>
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

                                                <a href="#!"  data-bs-toggle="modal" data-bs-target="#ronal1" class="btn btn-primary w-100">Ver detalles</a>

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
                                        
                                                <a href="#!"  data-bs-toggle="modal" data-bs-target="#ronal2" class="btn btn-primary w-100">Ver detalles</a>
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
                                        
                                                <a href="#!"  data-bs-toggle="modal" data-bs-target="#ronal3" class="btn btn-primary w-100">Ver detalles</a>
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
                                        
                                                <a href="#!"  data-bs-toggle="modal" data-bs-target="#ronal4" class="btn btn-primary w-100">Ver detalles</a>
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
                                        
                                                <a href="#!"  data-bs-toggle="modal" data-bs-target="#ronal5" class="btn btn-primary w-100">Ver detalles</a>
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
                                        
                                                <a href="#!"  data-bs-toggle="modal" data-bs-target="#ronal6" class="btn btn-primary w-100">Ver detalles</a>
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
                                        
                                                <a href="#!"  data-bs-toggle="modal" data-bs-target="#ronal7" class="btn btn-primary w-100">Ver detalles</a>
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
                                        
                                                <a href="#!"  data-bs-toggle="modal" data-bs-target="#ronal8" class="btn btn-primary w-100">Ver detalles</a>
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
                                        
                                                <a href="#!"  data-bs-toggle="modal" data-bs-target="#ronal9" class="btn btn-primary w-100">Ver detalles</a>
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
                                        
                                                <a href="#!"  data-bs-toggle="modal" data-bs-target="#ronal10" class="btn btn-primary w-100">Ver detalles</a>
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
                                        
                                                <a href="#!"  data-bs-toggle="modal" data-bs-target="#ronal11" class="btn btn-primary w-100">Ver detalles</a>
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
                        <div class="modal-body d-flex align-items-center">
                            <div class="mb-2" style="margin-left: 40px;">
                                <a href="#"><i class="ri-mail-send-line" style="font-size: 54px; color: red;"></i></a>
                            </div>
                            <div class="circle-text mb-2">
                                <a href="#" id="copiarCorreo">Correo Electrónico</a>
                            </div>
                            <div class="mb-2">
                                <a href="https://wa.me/910558971"><i class="ri-whatsapp-line" style="font-size: 54px; color: green;"></i></a>
                            </div>
                            <div class="circle-text">
                                <a href="https://wa.me/910558971">WhatsApp</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

             <!-- script para copia de gmail al darle click -->

            <script>
                document.getElementById('copiarCorreo').addEventListener('click', function() {
                    // Dirección de correo electrónico que deseas copiar
                    var direccionCorreo = 'ceerirehabilitacion14@gmail.com';

                    // Crear un elemento de entrada de texto temporal
                    var inputTemp = document.createElement('input');
                    inputTemp.setAttribute('value', direccionCorreo);
                    document.body.appendChild(inputTemp);

                    // Seleccionar y copiar el contenido del campo de texto temporal
                    inputTemp.select();
                    document.execCommand('copy');

                    // Eliminar el campo de texto temporal
                    document.body.removeChild(inputTemp);

                    // Puedes mostrar un mensaje de éxito
                    alert('Dirección de correo electrónico copiada: ' + direccionCorreo);
                });
            </script>
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
                                            <li><a href="">Correo Electrónico: ceerirehabilitacion14@gmail.com</a></li>
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
                <h2 class="modal-title" id="crearModalLabel">Terapia Fisica y Rehabilitación</h2>
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
                                                <img src="assets/images/tfisica/img3.png" class="d-block w-100" alt="There slide" width="100%"/>
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
                                <div class="text-muted">
                                    La Terapia Física y Rehabilitación es una especialidad que tiene como objetivo recuperar y mejorar la 
                                    capacidad funcional y calidad de vida de aquellas personas que sufren de discapacidad por una enfermedad
                                    o lesión. A diferencia de otras áreas  médicas, la Terapia Física no se enfoca únicamente en curar,
                                    sino en ayudarle al paciente a mejorar su calidad de vida facilitando una mayor movilidad e 
                                    independencia, disminuyendo el dolor y ayudándole a recuperar diferentes capacidades de la vida 
                                    diaria y reintegración a las actividades deportivas.
                                </div>
                                <br>                          
                                <h2>profesional a cargo: Juanito Alcachofa</h2>

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


<!-- RONAL -->
    <!-- Modal de vista 1 -->
    <div class="modal fade" id="ronal1" tabindex="-1" aria-labelledby="crearModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="crearModalLabel">Juanito Alcachofa</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body d-flex align-items">
                    <img src="assets/images/tfisica/img3.png" alt="" style="width: 320px; height: 420px; margin-right: 40px;">
                    <div class="text-muted">
                        <b>Fatima Asad</b>
                        <br><br>
                        Calle San José Calasanz, 12
                        Calpe, Alicante 03710
                        698019052
                        fatima.asad@outlook.com
                        <br><br>
                        <b>Perfil profesional</b>
                        <br><br>
                        Terapeuta ocupacional con amplios conocimientos sobre programación, tratamientos y modalidades para la recuperación
                        y mitigación de problemas físicos y psíquicos para mejorar el estado de los pacientes.
                        <br><br>
                        <b>Experiencia laboral</b>
                        <br><br>
                        Diciembre 2019 – Actual
                        Sentits – Alicante
                        Terapeuta ocupacional
                        <br><br>
                        Evaluación de cada usuario conforme al proceso de rehabilitación y apoyo comunitario acordado. <br>
                        Participación en programas de atención a familias. <br>
                        Estímulo y motivación de los pacientes en la realización de actividades físicas y lúdicas. <br><br>
                        Agosto 2013 – Agosto 2019
                        Saner – Alicante
                        Terapeuta ocupacional
                        <br><br>
                        Experiencia en programas de intervención en deterioro cognitivo. <br>
                        Apoyo en la habilitación y rehabilitación física de las personas usuarias del servicio. <br>
                        Coordinación, planificación y organización de intervenciones individuales. <br>
                        Octubre 2011 – Enero 2013
                        Centro IDEAT – Alicante
                        Terapeuta ocupacional
                        <br><br>
                        Planificación y puesta en marcha de talleres y actividades de apoyo social. <br>
                        Diseño y desarrollo de los programas de mejora de autonomía personal y social. <br>
                        Interactuó con pacientes, familiares y médicos para coordinarlos e informarles sobre el cuidado a los pacientes. <br><br>
                        <b>Formación académica</b>
                        <br><br>
                        Septiembre 2010
                        Universidad Miguel Hernández – Elche
                        Grado en Terapia Ocupacional
                        <br><br>
                        <b>Aptitudes</b>
                        <br><br>
                        Empatía en el trato al paciente
                        Formación en metodología didáctica
                        Resolución de conflictos
                        Vocación por los colectivos vulnerables
                        Grandes dosis de iniciativa y dedicación
                        Persona proactiva y dinámica. <br><br>
                        <b>Idiomas</b>
                        
                        Árabe, 
                        Idioma nativo. <br>

                        Español
                        C2 – Experto. <br>
                        <br><br>
                        <b>Formación adicional</b>
                        <br><br>
                        Curso de Estimulación Multisensorial – IPFAP Formación, 2014
                        Curso de Auxiliar de Rehabilitación – ELBS, 2012
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal de vista 1 -->   
<!-- RONAL -->

<!-- RONAL -->
    <!-- Modal de vista 1 -->
    <div class="modal fade" id="ronal2" tabindex="-1" aria-labelledby="crearModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="crearModalLabel">Nancy Martines</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body align-items d-flex">
                    <img src="assets/images/tfisica/img3.png" alt="" style="width: 320px; height: 420px; margin-right: 40px;">
                    <div class="text-muted">
                        <b>Fatima Asad</b>
                        <br><br>
                        Calle San José Calasanz, 12
                        Calpe, Alicante 03710
                        698019052
                        fatima.asad@outlook.com
                        <br><br>
                        <b>Perfil profesional</b>
                        <br><br>
                        Terapeuta ocupacional con amplios conocimientos sobre programación, tratamientos y modalidades para la recuperación
                        y mitigación de problemas físicos y psíquicos para mejorar el estado de los pacientes.
                        <br><br>
                        <b>Experiencia laboral</b>
                        <br><br>
                        Diciembre 2019 – Actual
                        Sentits – Alicante
                        Terapeuta ocupacional
                        <br><br>
                        Evaluación de cada usuario conforme al proceso de rehabilitación y apoyo comunitario acordado. <br>
                        Participación en programas de atención a familias. <br>
                        Estímulo y motivación de los pacientes en la realización de actividades físicas y lúdicas. <br><br>
                        Agosto 2013 – Agosto 2019
                        Saner – Alicante
                        Terapeuta ocupacional
                        <br><br>
                        Experiencia en programas de intervención en deterioro cognitivo. <br>
                        Apoyo en la habilitación y rehabilitación física de las personas usuarias del servicio. <br>
                        Coordinación, planificación y organización de intervenciones individuales. <br>
                        Octubre 2011 – Enero 2013
                        Centro IDEAT – Alicante
                        Terapeuta ocupacional
                        <br><br>
                        Planificación y puesta en marcha de talleres y actividades de apoyo social. <br>
                        Diseño y desarrollo de los programas de mejora de autonomía personal y social. <br>
                        Interactuó con pacientes, familiares y médicos para coordinarlos e informarles sobre el cuidado a los pacientes. <br><br>
                        <b>Formación académica</b>
                        <br><br>
                        Septiembre 2010
                        Universidad Miguel Hernández – Elche
                        Grado en Terapia Ocupacional
                        <br><br>
                        <b>Aptitudes</b>
                        <br><br>
                        Empatía en el trato al paciente
                        Formación en metodología didáctica
                        Resolución de conflictos
                        Vocación por los colectivos vulnerables
                        Grandes dosis de iniciativa y dedicación
                        Persona proactiva y dinámica. <br><br>
                        <b>Idiomas</b>
                        
                        Árabe, 
                        Idioma nativo. <br>

                        Español
                        C2 – Experto. <br>
                        <br><br>
                        <b>Formación adicional</b>
                        <br><br>
                        Curso de Estimulación Multisensorial – IPFAP Formación, 2014
                        Curso de Auxiliar de Rehabilitación – ELBS, 2012
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal de vista 1 -->   
<!-- RONAL -->

<!-- RONAL -->
    <!-- Modal de vista 1 -->
    <div class="modal fade" id="ronal3" tabindex="-1" aria-labelledby="crearModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="crearModalLabel">Nancy Martines</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body align-items d-flex">
                    <img src="assets/images/tfisica/img3.png" alt="" style="width: 320px; height: 420px; margin-right: 40px;">
                    <div class="text-muted">
                        <b>Fatima Asad</b>
                        <br><br>
                        Calle San José Calasanz, 12
                        Calpe, Alicante 03710
                        698019052
                        fatima.asad@outlook.com
                        <br><br>
                        <b>Perfil profesional</b>
                        <br><br>
                        Terapeuta ocupacional con amplios conocimientos sobre programación, tratamientos y modalidades para la recuperación
                        y mitigación de problemas físicos y psíquicos para mejorar el estado de los pacientes.
                        <br><br>
                        <b>Experiencia laboral</b>
                        <br><br>
                        Diciembre 2019 – Actual
                        Sentits – Alicante
                        Terapeuta ocupacional
                        <br><br>
                        Evaluación de cada usuario conforme al proceso de rehabilitación y apoyo comunitario acordado. <br>
                        Participación en programas de atención a familias. <br>
                        Estímulo y motivación de los pacientes en la realización de actividades físicas y lúdicas. <br><br>
                        Agosto 2013 – Agosto 2019
                        Saner – Alicante
                        Terapeuta ocupacional
                        <br><br>
                        Experiencia en programas de intervención en deterioro cognitivo. <br>
                        Apoyo en la habilitación y rehabilitación física de las personas usuarias del servicio. <br>
                        Coordinación, planificación y organización de intervenciones individuales. <br>
                        Octubre 2011 – Enero 2013
                        Centro IDEAT – Alicante
                        Terapeuta ocupacional
                        <br><br>
                        Planificación y puesta en marcha de talleres y actividades de apoyo social. <br>
                        Diseño y desarrollo de los programas de mejora de autonomía personal y social. <br>
                        Interactuó con pacientes, familiares y médicos para coordinarlos e informarles sobre el cuidado a los pacientes. <br><br>
                        <b>Formación académica</b>
                        <br><br>
                        Septiembre 2010
                        Universidad Miguel Hernández – Elche
                        Grado en Terapia Ocupacional
                        <br><br>
                        <b>Aptitudes</b>
                        <br><br>
                        Empatía en el trato al paciente
                        Formación en metodología didáctica
                        Resolución de conflictos
                        Vocación por los colectivos vulnerables
                        Grandes dosis de iniciativa y dedicación
                        Persona proactiva y dinámica. <br><br>
                        <b>Idiomas</b>
                        
                        Árabe, 
                        Idioma nativo. <br>

                        Español
                        C2 – Experto. <br>
                        <br><br>
                        <b>Formación adicional</b>
                        <br><br>
                        Curso de Estimulación Multisensorial – IPFAP Formación, 2014
                        Curso de Auxiliar de Rehabilitación – ELBS, 2012
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal de vista 1 -->   
<!-- RONAL -->

<!-- RONAL -->
    <!-- Modal de vista 1 -->
    <div class="modal fade" id="ronal4" tabindex="-1" aria-labelledby="crearModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="crearModalLabel">Nancy Martines</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body align-items d-flex">
                    <img src="assets/images/tfisica/img3.png" alt="" style="width: 320px; height: 420px; margin-right: 40px;">
                    <div class="text-muted">
                        <b>Fatima Asad</b>
                        <br><br>
                        Calle San José Calasanz, 12
                        Calpe, Alicante 03710
                        698019052
                        fatima.asad@outlook.com
                        <br><br>
                        <b>Perfil profesional</b>
                        <br><br>
                        Terapeuta ocupacional con amplios conocimientos sobre programación, tratamientos y modalidades para la recuperación
                        y mitigación de problemas físicos y psíquicos para mejorar el estado de los pacientes.
                        <br><br>
                        <b>Experiencia laboral</b>
                        <br><br>
                        Diciembre 2019 – Actual
                        Sentits – Alicante
                        Terapeuta ocupacional
                        <br><br>
                        Evaluación de cada usuario conforme al proceso de rehabilitación y apoyo comunitario acordado. <br>
                        Participación en programas de atención a familias. <br>
                        Estímulo y motivación de los pacientes en la realización de actividades físicas y lúdicas. <br><br>
                        Agosto 2013 – Agosto 2019
                        Saner – Alicante
                        Terapeuta ocupacional
                        <br><br>
                        Experiencia en programas de intervención en deterioro cognitivo. <br>
                        Apoyo en la habilitación y rehabilitación física de las personas usuarias del servicio. <br>
                        Coordinación, planificación y organización de intervenciones individuales. <br>
                        Octubre 2011 – Enero 2013
                        Centro IDEAT – Alicante
                        Terapeuta ocupacional
                        <br><br>
                        Planificación y puesta en marcha de talleres y actividades de apoyo social. <br>
                        Diseño y desarrollo de los programas de mejora de autonomía personal y social. <br>
                        Interactuó con pacientes, familiares y médicos para coordinarlos e informarles sobre el cuidado a los pacientes. <br><br>
                        <b>Formación académica</b>
                        <br><br>
                        Septiembre 2010
                        Universidad Miguel Hernández – Elche
                        Grado en Terapia Ocupacional
                        <br><br>
                        <b>Aptitudes</b>
                        <br><br>
                        Empatía en el trato al paciente
                        Formación en metodología didáctica
                        Resolución de conflictos
                        Vocación por los colectivos vulnerables
                        Grandes dosis de iniciativa y dedicación
                        Persona proactiva y dinámica. <br><br>
                        <b>Idiomas</b>
                        
                        Árabe, 
                        Idioma nativo. <br>

                        Español
                        C2 – Experto. <br>
                        <br><br>
                        <b>Formación adicional</b>
                        <br><br>
                        Curso de Estimulación Multisensorial – IPFAP Formación, 2014
                        Curso de Auxiliar de Rehabilitación – ELBS, 2012
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal de vista 1 -->   
<!-- RONAL -->

<!-- RONAL -->
    <!-- Modal de vista 1 -->
    <div class="modal fade" id="ronal5" tabindex="-1" aria-labelledby="crearModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="crearModalLabel">Nancy Martines</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body align-items d-flex">
                    <img src="assets/images/tfisica/img3.png" alt="" style="width: 320px; height: 420px; margin-right: 40px;">
                    <div class="text-muted">
                        <b>Fatima Asad</b>
                        <br><br>
                        Calle San José Calasanz, 12
                        Calpe, Alicante 03710
                        698019052
                        fatima.asad@outlook.com
                        <br><br>
                        <b>Perfil profesional</b>
                        <br><br>
                        Terapeuta ocupacional con amplios conocimientos sobre programación, tratamientos y modalidades para la recuperación
                        y mitigación de problemas físicos y psíquicos para mejorar el estado de los pacientes.
                        <br><br>
                        <b>Experiencia laboral</b>
                        <br><br>
                        Diciembre 2019 – Actual
                        Sentits – Alicante
                        Terapeuta ocupacional
                        <br><br>
                        Evaluación de cada usuario conforme al proceso de rehabilitación y apoyo comunitario acordado. <br>
                        Participación en programas de atención a familias. <br>
                        Estímulo y motivación de los pacientes en la realización de actividades físicas y lúdicas. <br><br>
                        Agosto 2013 – Agosto 2019
                        Saner – Alicante
                        Terapeuta ocupacional
                        <br><br>
                        Experiencia en programas de intervención en deterioro cognitivo. <br>
                        Apoyo en la habilitación y rehabilitación física de las personas usuarias del servicio. <br>
                        Coordinación, planificación y organización de intervenciones individuales. <br>
                        Octubre 2011 – Enero 2013
                        Centro IDEAT – Alicante
                        Terapeuta ocupacional
                        <br><br>
                        Planificación y puesta en marcha de talleres y actividades de apoyo social. <br>
                        Diseño y desarrollo de los programas de mejora de autonomía personal y social. <br>
                        Interactuó con pacientes, familiares y médicos para coordinarlos e informarles sobre el cuidado a los pacientes. <br><br>
                        <b>Formación académica</b>
                        <br><br>
                        Septiembre 2010
                        Universidad Miguel Hernández – Elche
                        Grado en Terapia Ocupacional
                        <br><br>
                        <b>Aptitudes</b>
                        <br><br>
                        Empatía en el trato al paciente
                        Formación en metodología didáctica
                        Resolución de conflictos
                        Vocación por los colectivos vulnerables
                        Grandes dosis de iniciativa y dedicación
                        Persona proactiva y dinámica. <br><br>
                        <b>Idiomas</b>
                        
                        Árabe, 
                        Idioma nativo. <br>

                        Español
                        C2 – Experto. <br>
                        <br><br>
                        <b>Formación adicional</b>
                        <br><br>
                        Curso de Estimulación Multisensorial – IPFAP Formación, 2014
                        Curso de Auxiliar de Rehabilitación – ELBS, 2012
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal de vista 1 -->   
<!-- RONAL -->

<!-- RONAL -->
    <!-- Modal de vista 1 -->
    <div class="modal fade" id="ronal6" tabindex="-1" aria-labelledby="crearModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="crearModalLabel">Nancy Martines</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body align-items d-flex">
                    <img src="assets/images/tfisica/img3.png" alt="" style="width: 320px; height: 420px; margin-right: 40px;">
                    <div class="text-muted">
                        <b>Fatima Asad</b>
                        <br><br>
                        Calle San José Calasanz, 12
                        Calpe, Alicante 03710
                        698019052
                        fatima.asad@outlook.com
                        <br><br>
                        <b>Perfil profesional</b>
                        <br><br>
                        Terapeuta ocupacional con amplios conocimientos sobre programación, tratamientos y modalidades para la recuperación
                        y mitigación de problemas físicos y psíquicos para mejorar el estado de los pacientes.
                        <br><br>
                        <b>Experiencia laboral</b>
                        <br><br>
                        Diciembre 2019 – Actual
                        Sentits – Alicante
                        Terapeuta ocupacional
                        <br><br>
                        Evaluación de cada usuario conforme al proceso de rehabilitación y apoyo comunitario acordado. <br>
                        Participación en programas de atención a familias. <br>
                        Estímulo y motivación de los pacientes en la realización de actividades físicas y lúdicas. <br><br>
                        Agosto 2013 – Agosto 2019
                        Saner – Alicante
                        Terapeuta ocupacional
                        <br><br>
                        Experiencia en programas de intervención en deterioro cognitivo. <br>
                        Apoyo en la habilitación y rehabilitación física de las personas usuarias del servicio. <br>
                        Coordinación, planificación y organización de intervenciones individuales. <br>
                        Octubre 2011 – Enero 2013
                        Centro IDEAT – Alicante
                        Terapeuta ocupacional
                        <br><br>
                        Planificación y puesta en marcha de talleres y actividades de apoyo social. <br>
                        Diseño y desarrollo de los programas de mejora de autonomía personal y social. <br>
                        Interactuó con pacientes, familiares y médicos para coordinarlos e informarles sobre el cuidado a los pacientes. <br><br>
                        <b>Formación académica</b>
                        <br><br>
                        Septiembre 2010
                        Universidad Miguel Hernández – Elche
                        Grado en Terapia Ocupacional
                        <br><br>
                        <b>Aptitudes</b>
                        <br><br>
                        Empatía en el trato al paciente
                        Formación en metodología didáctica
                        Resolución de conflictos
                        Vocación por los colectivos vulnerables
                        Grandes dosis de iniciativa y dedicación
                        Persona proactiva y dinámica. <br><br>
                        <b>Idiomas</b>
                        
                        Árabe, 
                        Idioma nativo. <br>

                        Español
                        C2 – Experto. <br>
                        <br><br>
                        <b>Formación adicional</b>
                        <br><br>
                        Curso de Estimulación Multisensorial – IPFAP Formación, 2014
                        Curso de Auxiliar de Rehabilitación – ELBS, 2012
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal de vista 1 -->   
<!-- RONAL -->

<!-- RONAL -->
    <!-- Modal de vista 1 -->
    <div class="modal fade" id="ronal7" tabindex="-1" aria-labelledby="crearModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="crearModalLabel">Nancy Martines</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body align-items d-flex">
                    <img src="assets/images/tfisica/img3.png" alt="" style="width: 320px; height: 420px; margin-right: 40px;">
                    <div class="text-muted">
                        <b>Fatima Asad</b>
                        <br><br>
                        Calle San José Calasanz, 12
                        Calpe, Alicante 03710
                        698019052
                        fatima.asad@outlook.com
                        <br><br>
                        <b>Perfil profesional</b>
                        <br><br>
                        Terapeuta ocupacional con amplios conocimientos sobre programación, tratamientos y modalidades para la recuperación
                        y mitigación de problemas físicos y psíquicos para mejorar el estado de los pacientes.
                        <br><br>
                        <b>Experiencia laboral</b>
                        <br><br>
                        Diciembre 2019 – Actual
                        Sentits – Alicante
                        Terapeuta ocupacional
                        <br><br>
                        Evaluación de cada usuario conforme al proceso de rehabilitación y apoyo comunitario acordado. <br>
                        Participación en programas de atención a familias. <br>
                        Estímulo y motivación de los pacientes en la realización de actividades físicas y lúdicas. <br><br>
                        Agosto 2013 – Agosto 2019
                        Saner – Alicante
                        Terapeuta ocupacional
                        <br><br>
                        Experiencia en programas de intervención en deterioro cognitivo. <br>
                        Apoyo en la habilitación y rehabilitación física de las personas usuarias del servicio. <br>
                        Coordinación, planificación y organización de intervenciones individuales. <br>
                        Octubre 2011 – Enero 2013
                        Centro IDEAT – Alicante
                        Terapeuta ocupacional
                        <br><br>
                        Planificación y puesta en marcha de talleres y actividades de apoyo social. <br>
                        Diseño y desarrollo de los programas de mejora de autonomía personal y social. <br>
                        Interactuó con pacientes, familiares y médicos para coordinarlos e informarles sobre el cuidado a los pacientes. <br><br>
                        <b>Formación académica</b>
                        <br><br>
                        Septiembre 2010
                        Universidad Miguel Hernández – Elche
                        Grado en Terapia Ocupacional
                        <br><br>
                        <b>Aptitudes</b>
                        <br><br>
                        Empatía en el trato al paciente
                        Formación en metodología didáctica
                        Resolución de conflictos
                        Vocación por los colectivos vulnerables
                        Grandes dosis de iniciativa y dedicación
                        Persona proactiva y dinámica. <br><br>
                        <b>Idiomas</b>
                        
                        Árabe, 
                        Idioma nativo. <br>

                        Español
                        C2 – Experto. <br>
                        <br><br>
                        <b>Formación adicional</b>
                        <br><br>
                        Curso de Estimulación Multisensorial – IPFAP Formación, 2014
                        Curso de Auxiliar de Rehabilitación – ELBS, 2012
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal de vista 1 -->   
<!-- RONAL -->

<!-- RONAL -->
    <!-- Modal de vista 1 -->
    <div class="modal fade" id="ronal8" tabindex="-1" aria-labelledby="crearModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="crearModalLabel">Nancy Martines</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body align-items d-flex">
                    <img src="assets/images/tfisica/img3.png" alt="" style="width: 320px; height: 420px; margin-right: 40px;">
                    <div class="text-muted">
                        <b>Fatima Asad</b>
                        <br><br>
                        Calle San José Calasanz, 12
                        Calpe, Alicante 03710
                        698019052
                        fatima.asad@outlook.com
                        <br><br>
                        <b>Perfil profesional</b>
                        <br><br>
                        Terapeuta ocupacional con amplios conocimientos sobre programación, tratamientos y modalidades para la recuperación
                        y mitigación de problemas físicos y psíquicos para mejorar el estado de los pacientes.
                        <br><br>
                        <b>Experiencia laboral</b>
                        <br><br>
                        Diciembre 2019 – Actual
                        Sentits – Alicante
                        Terapeuta ocupacional
                        <br><br>
                        Evaluación de cada usuario conforme al proceso de rehabilitación y apoyo comunitario acordado. <br>
                        Participación en programas de atención a familias. <br>
                        Estímulo y motivación de los pacientes en la realización de actividades físicas y lúdicas. <br><br>
                        Agosto 2013 – Agosto 2019
                        Saner – Alicante
                        Terapeuta ocupacional
                        <br><br>
                        Experiencia en programas de intervención en deterioro cognitivo. <br>
                        Apoyo en la habilitación y rehabilitación física de las personas usuarias del servicio. <br>
                        Coordinación, planificación y organización de intervenciones individuales. <br>
                        Octubre 2011 – Enero 2013
                        Centro IDEAT – Alicante
                        Terapeuta ocupacional
                        <br><br>
                        Planificación y puesta en marcha de talleres y actividades de apoyo social. <br>
                        Diseño y desarrollo de los programas de mejora de autonomía personal y social. <br>
                        Interactuó con pacientes, familiares y médicos para coordinarlos e informarles sobre el cuidado a los pacientes. <br><br>
                        <b>Formación académica</b>
                        <br><br>
                        Septiembre 2010
                        Universidad Miguel Hernández – Elche
                        Grado en Terapia Ocupacional
                        <br><br>
                        <b>Aptitudes</b>
                        <br><br>
                        Empatía en el trato al paciente
                        Formación en metodología didáctica
                        Resolución de conflictos
                        Vocación por los colectivos vulnerables
                        Grandes dosis de iniciativa y dedicación
                        Persona proactiva y dinámica. <br><br>
                        <b>Idiomas</b>
                        
                        Árabe, 
                        Idioma nativo. <br>

                        Español
                        C2 – Experto. <br>
                        <br><br>
                        <b>Formación adicional</b>
                        <br><br>
                        Curso de Estimulación Multisensorial – IPFAP Formación, 2014
                        Curso de Auxiliar de Rehabilitación – ELBS, 2012
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal de vista 1 -->   
<!-- RONAL -->

<!-- RONAL -->
    <!-- Modal de vista 1 -->
    <div class="modal fade" id="ronal9" tabindex="-1" aria-labelledby="crearModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="crearModalLabel">Nancy Martines</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body align-items d-flex">
                    <img src="assets/images/tfisica/img3.png" alt="" style="width: 320px; height: 420px; margin-right: 40px;">
                    <div class="text-muted">
                        <b>Fatima Asad</b>
                        <br><br>
                        Calle San José Calasanz, 12
                        Calpe, Alicante 03710
                        698019052
                        fatima.asad@outlook.com
                        <br><br>
                        <b>Perfil profesional</b>
                        <br><br>
                        Terapeuta ocupacional con amplios conocimientos sobre programación, tratamientos y modalidades para la recuperación
                        y mitigación de problemas físicos y psíquicos para mejorar el estado de los pacientes.
                        <br><br>
                        <b>Experiencia laboral</b>
                        <br><br>
                        Diciembre 2019 – Actual
                        Sentits – Alicante
                        Terapeuta ocupacional
                        <br><br>
                        Evaluación de cada usuario conforme al proceso de rehabilitación y apoyo comunitario acordado. <br>
                        Participación en programas de atención a familias. <br>
                        Estímulo y motivación de los pacientes en la realización de actividades físicas y lúdicas. <br><br>
                        Agosto 2013 – Agosto 2019
                        Saner – Alicante
                        Terapeuta ocupacional
                        <br><br>
                        Experiencia en programas de intervención en deterioro cognitivo. <br>
                        Apoyo en la habilitación y rehabilitación física de las personas usuarias del servicio. <br>
                        Coordinación, planificación y organización de intervenciones individuales. <br>
                        Octubre 2011 – Enero 2013
                        Centro IDEAT – Alicante
                        Terapeuta ocupacional
                        <br><br>
                        Planificación y puesta en marcha de talleres y actividades de apoyo social. <br>
                        Diseño y desarrollo de los programas de mejora de autonomía personal y social. <br>
                        Interactuó con pacientes, familiares y médicos para coordinarlos e informarles sobre el cuidado a los pacientes. <br><br>
                        <b>Formación académica</b>
                        <br><br>
                        Septiembre 2010
                        Universidad Miguel Hernández – Elche
                        Grado en Terapia Ocupacional
                        <br><br>
                        <b>Aptitudes</b>
                        <br><br>
                        Empatía en el trato al paciente
                        Formación en metodología didáctica
                        Resolución de conflictos
                        Vocación por los colectivos vulnerables
                        Grandes dosis de iniciativa y dedicación
                        Persona proactiva y dinámica. <br><br>
                        <b>Idiomas</b>
                        
                        Árabe, 
                        Idioma nativo. <br>

                        Español
                        C2 – Experto. <br>
                        <br><br>
                        <b>Formación adicional</b>
                        <br><br>
                        Curso de Estimulación Multisensorial – IPFAP Formación, 2014
                        Curso de Auxiliar de Rehabilitación – ELBS, 2012
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal de vista 1 -->   
<!-- RONAL -->

<!-- RONAL -->
    <!-- Modal de vista 1 -->
    <div class="modal fade" id="ronal10" tabindex="-1" aria-labelledby="crearModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="crearModalLabel">Nancy Martines</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body align-items d-flex">
                    <img src="assets/images/tfisica/img3.png" alt="" style="width: 320px; height: 420px; margin-right: 40px;">
                    <div class="text-muted">
                        <b>Fatima Asad</b>
                        <br><br>
                        Calle San José Calasanz, 12
                        Calpe, Alicante 03710
                        698019052
                        fatima.asad@outlook.com
                        <br><br>
                        <b>Perfil profesional</b>
                        <br><br>
                        Terapeuta ocupacional con amplios conocimientos sobre programación, tratamientos y modalidades para la recuperación
                        y mitigación de problemas físicos y psíquicos para mejorar el estado de los pacientes.
                        <br><br>
                        <b>Experiencia laboral</b>
                        <br><br>
                        Diciembre 2019 – Actual
                        Sentits – Alicante
                        Terapeuta ocupacional
                        <br><br>
                        Evaluación de cada usuario conforme al proceso de rehabilitación y apoyo comunitario acordado. <br>
                        Participación en programas de atención a familias. <br>
                        Estímulo y motivación de los pacientes en la realización de actividades físicas y lúdicas. <br><br>
                        Agosto 2013 – Agosto 2019
                        Saner – Alicante
                        Terapeuta ocupacional
                        <br><br>
                        Experiencia en programas de intervención en deterioro cognitivo. <br>
                        Apoyo en la habilitación y rehabilitación física de las personas usuarias del servicio. <br>
                        Coordinación, planificación y organización de intervenciones individuales. <br>
                        Octubre 2011 – Enero 2013
                        Centro IDEAT – Alicante
                        Terapeuta ocupacional
                        <br><br>
                        Planificación y puesta en marcha de talleres y actividades de apoyo social. <br>
                        Diseño y desarrollo de los programas de mejora de autonomía personal y social. <br>
                        Interactuó con pacientes, familiares y médicos para coordinarlos e informarles sobre el cuidado a los pacientes. <br><br>
                        <b>Formación académica</b>
                        <br><br>
                        Septiembre 2010
                        Universidad Miguel Hernández – Elche
                        Grado en Terapia Ocupacional
                        <br><br>
                        <b>Aptitudes</b>
                        <br><br>
                        Empatía en el trato al paciente
                        Formación en metodología didáctica
                        Resolución de conflictos
                        Vocación por los colectivos vulnerables
                        Grandes dosis de iniciativa y dedicación
                        Persona proactiva y dinámica. <br><br>
                        <b>Idiomas</b>
                        
                        Árabe, 
                        Idioma nativo. <br>

                        Español
                        C2 – Experto. <br>
                        <br><br>
                        <b>Formación adicional</b>
                        <br><br>
                        Curso de Estimulación Multisensorial – IPFAP Formación, 2014
                        Curso de Auxiliar de Rehabilitación – ELBS, 2012
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal de vista 1 -->   
<!-- RONAL -->

<!-- RONAL -->
    <!-- Modal de vista 1 -->
    <div class="modal fade" id="ronal11" tabindex="-1" aria-labelledby="crearModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="crearModalLabel">Nancy Martines</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body align-items d-flex">
                    <img src="assets/images/tfisica/img3.png" alt="" style="width: 320px; height: 420px; margin-right: 40px;">
                    <div class="text-muted">
                        <b>Fatima Asad</b>
                        <br><br>
                        Calle San José Calasanz, 12
                        Calpe, Alicante 03710
                        698019052
                        fatima.asad@outlook.com
                        <br><br>
                        <b>Perfil profesional</b>
                        <br><br>
                        Terapeuta ocupacional con amplios conocimientos sobre programación, tratamientos y modalidades para la recuperación
                        y mitigación de problemas físicos y psíquicos para mejorar el estado de los pacientes.
                        <br><br>
                        <b>Experiencia laboral</b>
                        <br><br>
                        Diciembre 2019 – Actual
                        Sentits – Alicante
                        Terapeuta ocupacional
                        <br><br>
                        Evaluación de cada usuario conforme al proceso de rehabilitación y apoyo comunitario acordado. <br>
                        Participación en programas de atención a familias. <br>
                        Estímulo y motivación de los pacientes en la realización de actividades físicas y lúdicas. <br><br>
                        Agosto 2013 – Agosto 2019
                        Saner – Alicante
                        Terapeuta ocupacional
                        <br><br>
                        Experiencia en programas de intervención en deterioro cognitivo. <br>
                        Apoyo en la habilitación y rehabilitación física de las personas usuarias del servicio. <br>
                        Coordinación, planificación y organización de intervenciones individuales. <br>
                        Octubre 2011 – Enero 2013
                        Centro IDEAT – Alicante
                        Terapeuta ocupacional
                        <br><br>
                        Planificación y puesta en marcha de talleres y actividades de apoyo social. <br>
                        Diseño y desarrollo de los programas de mejora de autonomía personal y social. <br>
                        Interactuó con pacientes, familiares y médicos para coordinarlos e informarles sobre el cuidado a los pacientes. <br><br>
                        <b>Formación académica</b>
                        <br><br>
                        Septiembre 2010
                        Universidad Miguel Hernández – Elche
                        Grado en Terapia Ocupacional
                        <br><br>
                        <b>Aptitudes</b>
                        <br><br>
                        Empatía en el trato al paciente
                        Formación en metodología didáctica
                        Resolución de conflictos
                        Vocación por los colectivos vulnerables
                        Grandes dosis de iniciativa y dedicación
                        Persona proactiva y dinámica. <br><br>
                        <b>Idiomas</b>
                        
                        Árabe, 
                        Idioma nativo. <br>

                        Español
                        C2 – Experto. <br>
                        <br><br>
                        <b>Formación adicional</b>
                        <br><br>
                        Curso de Estimulación Multisensorial – IPFAP Formación, 2014
                        Curso de Auxiliar de Rehabilitación – ELBS, 2012
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal de vista 1 -->   
<!-- RONAL -->


<!-- Modal para Crear Nuevo Tema -->
<div class="modal fade" id="tlenguaje" tabindex="-1" aria-labelledby="crearModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="crearModalLabel">Terapia Lenguaje</h2>
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
                <div class="text-muted">
                    La terapia del lenguaje consiste en la evaluación, diagnóstico y tratamiento de los trastornos que atañen a
                    la comunicación. Éstos se manifiestan mediante alteraciones en la voz, la capacidad de habla, el lenguaje, 
                    la audición y la deglución. El profesional encargado de trabajar estas dificultades es el logopeda infantil.
                    Va dirigido A todo niño que tenga dificultades asociadas al área del lenguaje.
                    <b>Las problemáticas más comunes a tratar con la terapia del lenguaje son:</b> 
                    <li>Trastornos de articulación y reproducción de sonidos: dislalia, disglosia, disartria.</li>
                    <li>Trastornos en la fluidez del habla: tartamudez.</li>
                    <li>Trastornos de la voz: disfonías.</li>
                    <li>Trastornos de la alimentación: alteraciones de la deglución, disfagia.</li>
                    <li>Alteraciones en la lectura y la escritura: dislexia, disgrafía, disortografía.</li>
                    <li>
                        Alteraciones en la comprensión y/o expresión del lenguaje: Retraso del lenguaje,
                        trastorno del lenguaje, trastornos neurodegenerativos, demencias….
                    </li>
                    <li>Problemas del lenguaje pragmático: dificultad para elegir el lenguaje socialmente adecuado.</li>   
                </div>
                <br>                          
                <h2>profesional a cargo: Elsa Pito</h2>                
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
                <h2 class="modal-title" id="crearModalLabel">Terapia ocupacional</h2>
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
                    <div id="carouselExampleInterval3" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active" data-bs-interval="10000">
                                <img src="assets/images/tocupacional/img1.png" alt="First slide" width="100%"/>
                            </div>
                            <div class="carousel-item" data-bs-interval="2000">
                                <img src="assets/images/tocupacional/img2.png" class="d-block w-100" alt="two slide" width="100%"/>
                            </div>
                            <div class="carousel-item">
                                <img src="assets/images/tocupacional/img3.png" class="d-block w-100" alt="There slide"width="100%" />
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval3" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval3" data-bs-slide="next">
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
                <div class="text-muted">
                    La terapia ocupacional es el uso terapéutico de las actividades de cuidado, trabajo y juego para incrementar 
                    la independencia funcional, aumentar el desarrollo y prevenir la incapacidad; puede incluir la adaptación de 
                    tareas o del entorno para alcanzar la máxima independencia y para aumentar la calidad de vida.
                    Se valora el grado de independencia, se potencian habilidades para las situaciones cotidianas y para mejorar 
                    la función general, dando importancia a las capacidades residuales.
                    El terapeuta ocupacional utiliza actividades terapéuticas, de cuidado personal, de cuidado del hogar y recreativas 
                    para facilitar o aumentar al máximo el nivel de función del paciente. Se evalúan tanto los aspectos psicosociales
                    como los aspectos físicos del estado del paciente en función del contexto total del tratamiento.   
                </div>
                <br>                          
                <h2>profesional a cargo: Dolores Delano</h2>
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
                <h2 class="modal-title" id="crearModalLabel">Terapia infantil</h2>
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
                    <div id="carouselExampleInterval4" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active" data-bs-interval="10000">
                                <img src="assets/images/tinfantil/img1.png" alt="First slide" width="100%"/>
                            </div>
                            <div class="carousel-item" data-bs-interval="2000">
                                <img src="assets/images/tinfantil/img1}2.png" class="d-block w-100" alt="two slide" width="100%" />
                            </div>
                            <div class="carousel-item">
                                <img src="assets/images/tinfantil/img3.png" class="d-block w-100" alt="There slide" width="100%"/>
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval4" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval4" data-bs-slide="next">
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
                <div class="text-muted">
                    La terapia o psicoterapia infantil es una forma de intervención terapéutica que busca mejorar el bienestar 
                    emocional y social del niño y de la niña. Se basa de diversas técnicas y métodos para ayudar a los pequeños 
                    que tienen problemas con sus emociones o conductas. Una de sus características es que usa el juego como punto 
                    clave. Además, hace que la familia, escuela y personas cercanas se involucren en el proceso de tratamiento 
                    del niño o de la niña. La terapia para niños y niñas se desarrolla a partir de muchas experiencias y actividades. 
                    Además, en ella se usa mucho el lenguaje y la comunicación verbal para interactuar con el menor, pero debe 
                    adaptarse a la etapa y compresión de cada pequeño. Así como a las características cognitivas y de pensamiento 
                    de cada niño o niña.
                    <b>Beneficios de la terapia infantil:</b>
                    <br>
                    <li>Trata diversos problemas</li>
                    <li>Facilita el desarrollo de habilidades</li>
                    <li>Controla las emociones</li>
                    <li>Da mejores herramientas de enseñanza a padres y madres</li>
                </div>
                <br>                          
                <h2>profesional a cargo: Aquiles Bailo</h2>
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
                <h5 class="modal-title" id="crearModalLabel">Psicologia</h5>
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
                    <div id="carouselExampleInterval5" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active" data-bs-interval="10000">
                                <img src="assets/images/psicologia/img1.png" alt="First slide" width="100%"/>
                            </div>
                            <div class="carousel-item" data-bs-interval="2000">
                                <img src="assets/images/psicologia/img2.png" class="d-block w-100" alt="two slide"width="100%" />
                            </div>
                            <div class="carousel-item">
                                <img src="assets/images/psicologia/img3.png" class="d-block w-100" alt="There slide" width="100%"/>
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval5" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval5" data-bs-slide="next">
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
            <div class="text-muted">
            La psicología es la ciencia que estudia la conducta humana y los procesos mentales. Al ser bastante amplia, 
            para su estudio y aplicación se divide en dos vertientes: la psicología básica y la psicología aplicada.
            Quizá te has dado cuenta que tu comportamiento cambia según la compañía o el contexto en el que te encuentres.
            No es lo mismo cuando estás entre maestros o jefes a que cuando estás entre amigos y familiares. Estos cambios 
            son precisamente lo que estudia la psicología social. Entender estas diferencias tiene un impacto interesante 
            en el mundo laboral, educativo, cultural y político, ya que una vez que se conocen los factores que llevan a 
            estas conductas, estas pueden ser modificadas, eliminadas o intensificadas para mejorar la relación entre grupos 
            de personas. La psicología social también analiza las normas y principios que moldean la convivencia entre humanos.
            <b>Gracias a este enfoque hoy conocemos más sobre temas como:</b>
            <li>Patrones de conducta</li>
            <li>Roles sociales</li>
            <li>Conciencia colectiva</li>
            <li>Relaciones sociales</li>
            <li>Identidad social</li>
            <li>Estereotipos</li>
            <li>Valores</li>
            <li>Trabajo en equipo</li>
            <li>Liderazgo</li>
            </div>
                <br>                          
                <h2>profesional a cargo: Ruben Ferrando</h2>
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
                    <div id="carouselExampleInterval6" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active" data-bs-interval="10000">
                                <img src="assets/images/equipoTec/electroterapia.jpg" alt="First slide" width="100%"/>
                            </div>
                            <div class="carousel-item" data-bs-interval="2000">
                                <img src="assets/images/equipoTec/laserterapia.jpg" class="d-block w-100" alt="two slide" width="100%" />
                            </div>
                            <div class="carousel-item">
                                <img src="assets/images/equipoTec/magnetoterapia.jpg" class="d-block w-100" alt="There slide" width="100%" />
                            </div>
                            <div class="carousel-item">
                                <img src="assets/images/equipoTec/magnetoterapia360.jpg" class="d-block w-100" alt="There slide" width="100%" />
                            </div>
                            <div class="carousel-item">
                                <img src="assets/images/equipoTec/ondasChoque.jpg" class="d-block w-100" alt="There slide" width="100%" />
                            </div>
                            <div class="carousel-item">
                                <img src="assets/images/equipoTec/ultrasonido.jpg" class="d-block w-100" alt="There slide" width="100%" height="550px;" />
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval6" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval6" data-bs-slide="next">
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
                        <div class="card-body" style="font-size: 20px;">
                            <div class="text-muted">
                                Ceeri cuenta con numerosos equipos tecnologicos de vanguardia para cumplir adecuadamente
                                con todas los tipos de terapia que ofrecemos asi como profesionales capacitados en su manejo.                                              
                                <b>entre los cuales incluimos:</b>
                                <li>Laserterapia</li>
                                <li>Magnetoterapia</li>
                                <li>Ultrasonido</li>
                                <li>Punsion seca</li>
                                <li>Ondas de choque</li>
                                <li>Magnetoterapia de 360º</li>
                                <li>Electroterapia</li>
                            </div> 
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