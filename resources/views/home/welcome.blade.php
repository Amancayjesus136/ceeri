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
                                <a class="nav-link" href="https://wa.me/910558971">Reserva tu cita</a>
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
                <form action="{{route('registroPrincipal')}}" method="POST" id="registrar-cita">
                    @csrf
                    <div class="row mb-1">
                        <div class="col-md-6">
                            <label for="nombres" class="form-label">Nombres</label>
                            <input type="text" class="form-control" id="nombres" name="nombres" oninput="limitarCaracteres(this, 45)"required>                       
                        </div>
                        <div class="col-md-6">
                            <label for="apellidos" class="form-label">Apellidos</label>
                            <input type="text" class="form-control" id="apellidos" name="apellidos" oninput="limitarCaracteres(this, 45)"required>            
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="tipo_documento" class="form-label">Tipo de Documento</label>
                            <select class="form-select" id="tipo_documento" name="tipo_documento"required>
                                <option value="" disabled selected>Seleccionar tipo de documento...</option>
                                <option value="DNI">DNI</option>
                                <option value="Pasaporte">Pasaporte</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="numero_documento" class="form-label">Número de Documento</label>
                            <input type="number" class="form-control" id="numero_documento" name="numero_documento" oninput="limitarCaracteres(this, 40)"required>  
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="telefono" class="form-label">Teléfono</label>
                            <input type="number" class="form-control" id="telefono" name="telefono" oninput="limitarCaracteres(this, 15)"required>   
                        </div>
                        <div class="col-md-6">
                            <label for="fecha_hora" class="form-label">Fecha y Hora</label>
                            <input type="datetime-local" class="form-control" id="fecha_hora" name="fecha_hora" required>
                        </div>
                    </div>
                    <div class="row mb-3">                 
                        <div class="col-md-6">
                            <label for="especialidad" class="form-label">Especialidad</label>
                            <select class="form-select" id="especialidad" name="especialidad" required>
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

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function () {
        $('#registrar-cita').submit(function (e) {
            e.preventDefault();
            var selectedDateTime = new Date($('#fecha_hora').val());
            var horaInicio = 8;
            var horaFin = 18;
            var horaSeleccionada = selectedDateTime.getHours();

            // Obtener solo la hora de la fecha seleccionada
            var minutosSeleccionados = selectedDateTime.getMinutes();

            // Verificar si la hora está fuera del rango permitido
            if (horaSeleccionada < horaInicio || horaSeleccionada >= horaFin || (horaSeleccionada === horaFin && minutosSeleccionados > 0)) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'No puede elegir horas fuera del horario de atención (08:00 a 18:00)',
                });
                return; // Detener la ejecución si la hora es inválida
            }

            // Resto del código AJAX
            $.ajax({
                url: "{{ route('registroPrincipal') }}",
                method: "POST",
                data: $(this).serialize(),
                dataType: "json",
                success: function (data) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Éxito',
                        text: 'Su cita ha sido registrada correctamente',
                    }).then(function () {
                        setTimeout(function () {
                            $('#agregarModal').modal('hide');
                        }, 500);

                        setTimeout(function () {
                            location.reload();
                        }, 500);
                    });
                },
                error: function (error) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Hubo un problema al registrar la cita',
                    });
                }
            });
        });
    });
</script>

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
                                                                                            '<strong>Especialidad:</strong> ' + result.especialidad + '<br>' +
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

                                
                                <img src="assets/images/prin.png" alt="" class="user-img" style="width: 420px; height:420px; margin-left: 60px;">

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
                                <h1 class="mb-3 ff-secondary fw-semibold lh-base">HAZ TU RESERVA!</h1>
                                <p class="text-muted">para reservar tu cita tienes que:</p>
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!--end row-->
                    <div class="row"> 
                        <div class="col-lg-4 col-md-6">
                            <div class="card shadow-lg">
                                <div class="card-body p-4">
                                    <h1 class="fw-bold display-5 ff-secondary mb-4 text-success position-relative">
                                        <div class="job-icon-effect"></div>
                                        <span>1 </span>
                                        <a href="https://www.facebook.com/centrodeterapiafisicaceeri" class="profile-title rounded-circle fs-16 bg-primary text-light d-inline-block p-2"><i class="ri-facebook-fill" style="font-size:30px;"></i></a>
                                        <a href="https://wa.me/910558971" class="profile-title rounded-circle fs-16 bg-success text-light d-inline-block p-2"><i class="ri-whatsapp-fill" style="font-size:30px;"></i></a>
                                        <a href="https://www.instagram.com/ceeri.terapiafisica/" class="profile-title rounded-circle fs-16 bg-danger text-light d-inline-block p-2"><i class="ri-instagram-fill" style="font-size:30px;"></i></a>

                                    </h1>
                                    <h6 class="fs-17 mb-3"><b>Contáctanos</b></h6>
                                    <p class="text-muted mb-0 fs-15"> Al contactarnos, te informaremos sobre nuestros horarios disponibles para adaptarnos a tus necesidades.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="card shadow-lg">
                                <div class="card-body p-4">
                                    <h1 class="fw-bold display-5 ff-secondary mb-4 text-success position-relative">
                                        <div class="job-icon-effect"></div>
                                        <span>2</span>
                                    </h1>
                                    <h6 class="fs-17 mb-3"><b>Reserva tu cita</b></h6>
                                    <p class="text-muted mb-0 fs-15">Al hablar con recepcion este registrara tu cita en base a la disponibilidad y horario del terapeuta.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="card shadow-lg">
                                <div class="card-body p-4">
                                    <h1 class="fw-bold display-5 ff-secondary mb-4 text-success position-relative">
                                        <div class="job-icon-effect"></div>
                                        <span>3</span>
                                    </h1>
                                    <h6 class="fs-17 mb-2"><b>Confirmacíon de Reserva</b></h6>
                                    <p class="text-muted mb-0 fs-15">
                                        Al llegar a nuestro local, confirmaremos tu asistencia para ofrecerte una experiencia sin contratiempos.</p>
                                </div>
                            </div>
                        </div>
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
                            <div class="about-img mb-5 mb-lg-0 text-center">
                                

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
                                <img src="assets/images/2.jpg" alt="" class="img-fluid mx-auto rounded-3" style="height: 410px; width:520px; margin-bottom:20px;" />
                            </div>
                        </div>
                        
                        
                        <div class="col-lg-6">
                            <div class="text-muted">
                                <h1 class="mb-3 lh-base"><span class="text-primary">CONÓCENOS</h1>
                                <p class="ff-secondary fs-16 mb-2">Somos el 1er Centro Especializado En Terapia Fisica y Rehabilitación del Cono Sur, Con profesionales TITULADAS - COLEGIADAS - HABILITADAS</p>
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
                                            <p class="mb-0">nuestro horario es Lunes a Sabado de 08:00 a 21:00.</p>
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
                                            <p class="mb-0">nos encuentra en: <a href="https://www.google.com/maps/search/Mz+A+Lt3+Barrio2+Sector2+4Etapa.+Villa+El+Salvador,+Lima,+Peru/@-12.2265712,-76.9337685,15z/data=!3m1!4b1?entry=ttu">Mz A Lt3 Barrio2 Sector2 4Etapa. Villa El Salvador, Lima, Peru.</a></p>                                     
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
                                            <p class="mb-0">telefono de contacto: 910 558 971</p>
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
                                <p class="text-muted mb-4">Experiencia, Confianza y Resultados: Transmitimos confianza con nuestra experiencia probada. Cada día, entregamos resultados tangibles que respaldan nuestra dedicación a tu bienestar.</p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <img src="assets/images/portadafsi.png" alt="" class="img-fluid rounded" />
                                </div>
                                <div class="card-body">
                                    <a href="javascript:void(0);">
                                        <h5>Terapia Física y Rehabilitación</h5>
                                    </a>
                                    <p class="text-muted fs-14"> Enfocada en mejorar la función física y movilidad, este tratamiento dedicado potencia la calidad de vida, abordando de manera personalizada las necesidades individuales para lograr una recuperación.</p>
                                    <div>
                                        <a href="#!"  data-bs-toggle="modal" data-bs-target="#tfisica" class="link-success">Vista <i class="ri-arrow-right-line align-bottom ms-1"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <img src="assets/images/portadalgj.png" alt="" class="img-fluid rounded" />
                                </div>
                                <div class="card-body">
                                    <a href="javascript:void(0);">
                                        <h5>Terapia de lenguaje</h5>
                                    </a>
                                    <p class="text-muted fs-14">Apoyamos a personas con trastornos del habla, lenguaje y comunicación, además de dificultades en la deglución y respiración, mejorando la calidad de vida con estrategias personalizadas y efectivas.</p>
                        
                                    <div>
                                        <a href="#!"  data-bs-toggle="modal" data-bs-target="#tlenguaje" class="link-success">Vista <i class="ri-arrow-right-line align-bottom ms-1"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <img src="assets/images/portadaocu.png" alt="" class="img-fluid rounded" />
                                </div>
                                <div class="card-body">
                                    <a href="javascript:void(0);">
                                        <h5>Terapia Ocupacional</h5>
                                    </a>
                                    <p class="text-muted fs-14">La terapia ocupacional es una disciplina de atención médica que ayuda a personas de todas las edades con dificultades físicas, sensoriales o cognitivas, promoviendo su independencia en la vida diaria.</p>
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
                                    <img src="assets/images/portadainf.png" alt="" class="img-fluid rounded" />
                                </div>
                                <div class="card-body">
                                    <a href="javascript:void(0);">
                                        <h5>Terapia infantil</h5>
                                    </a>
                                    <p class="text-muted fs-14">Forjamos un desarrollo saludable en los más pequeños mediante métodos especializados que cultivan habilidades emocionales y conductuales esenciales. Nuestra misión es lograr resultados impactantes que perduren en su viaje hacia el bienestar.</p>
                                    <div>
                                        <a href="#!" data-bs-toggle="modal" data-bs-target="#tinfantil" class="link-success">Vista <i class="ri-arrow-right-line align-bottom ms-1"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                <img src="assets/images/portadapsi.jpg" alt="" class="img-fluid rounded" />

                                </div>
                                <div class="card-body">
                                    <a href="javascript:void(0);">
                                        <h5>Psicología</h5>
                                    </a>
                                    <p class="text-muted fs-14">La psicología social investiga cómo las relaciones sociales influyen en la conducta, pensamientos y emociones. Explora dinámicas grupales, normas sociales y percepciones colectivas, proporcionando insights valiosos para mejorar las interacciones humanas y cultivar relaciones.</p>
                                    <div>
                                        <a href="#!"  data-bs-toggle="modal" data-bs-target="#psicologia"  class="link-success">Vista <i class="ri-arrow-right-line align-bottom ms-1"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <img src="assets/images/N4.jpg" alt="" style="width: 325px; height: 310px;"/>
                                </div>
                                <div class="card-body">
                                    <a href="javascript:void(0);">
                                        <h5>Los mejores equipos en Terapias</h5>
                                    </a>
                                    <p class="text-muted fs-14">el equipamiento tecnologico con el que cuenta CEERI para lidiar con los tratamientos en los pacientes de una forma efectiva y segura</p>
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
                                <h1 class="mb-3 ff-secondary fw-semibold text-capitalize lh-base">MIRA NUESTRA <span class="text-primary">GALERÍA DE TERAPUETAS</span></h1>
                                <p class="text-muted mb-4">En esta seccion se muestran a nuestros terapeutas con su informacion sobre su profesion y experiencia</p>
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
                                                <img src="assets/images/espe-psicologia/psi1.png" alt="" class="rounded-circle avatar-md mx-auto d-block">
                                                <h5 class="fs-17 mt-3 mb-2">Nancy </h5>
                                                <p class="text-muted fs-13 mb-3">Psicología</p>

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
                                                <img src="assets/images/espe-psicologia/es2.png" alt="" class="rounded-circle avatar-md mx-auto d-block">
                                                <h5 class="fs-17 mt-3 mb-2">Maria</h5>
                                                <p class="text-muted fs-13 mb-3">Psicología</p>
                                        
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
                                                <img src="assets/images/espe-psicologia/esocu.png" alt="" class="rounded-circle avatar-md mx-auto d-block">
                                                <h5 class="fs-17 mt-3 mb-2">Rosa</h5>
                                                <p class="text-muted fs-13 mb-3">Terapia de lenguaje</p>
                                        
                                                <p class="text-muted mb-4 fs-14">
                                                    <i class="ri-map-pin-2-line text-primary me-1 align-bottom"></i> Villa El Salvador
                                                </p>
                                        
                                                <a href="#!"  data-bs-toggle="modal" data-bs-target="#ronal13" class="btn btn-primary w-100">Ver detalles</a>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="swiper-slide">
                                        <div class="card text-center">
                                            <div class="card-body p-4">
                                                <img src="assets/images/espe-psicologia/espe3.png" alt="" class="rounded-circle avatar-md mx-auto d-block" />
                                                <h5 class="fs-17 mt-3 mb-2">Angelica</h5>
                                                <p class="text-muted fs-13 mb-3">Psicologia</p>
                                        
                                                <p class="text-muted mb-4 fs-14">
                                                    <i class="ri-map-pin-2-line text-primary me-1 align-bottom"></i> Villa El Salvador
                                                </p>
                                        
                                                <a href="#!"  data-bs-toggle="modal" data-bs-target="#ronal14" class="btn btn-primary w-100">Ver detalles</a>
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
                <h2 class="modal-title" id="crearModalLabel"></h2>
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
                                                <img src="assets/images/tfisica/img1.png" class="d-block w-100" alt="First slide"/>
                                            </div>
                                            <div class="carousel-item active" data-bs-interval="2000">
                                                <img src="assets/images/tfisica/img2.png" class="d-block w-100" alt="two slide" width="100%" />
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
                    <div class="col-xl-6" >
        <div class="card">
            <div>
                <h2 class="text-center">Terapia Fisica y Rehabilitación</h2>
            </div><hr>

            <span class="text-justify-center" style="font-size: 15px;">
            En nuestro Centro de Especialidad en Salud Física, te damos la bienvenida a un espacio dedicado a potenciar tu recuperación y bienestar físico. Aquí, nuestra misión se enfoca en ir más allá de la terapia convencional; nos sumergimos en un ambiente de aprendizaje enriquecedor donde la terapia física y la rehabilitación se entrelazan para ofrecer un cuidado integral. En este santuario de salud, no solo buscamos entender tus desafíos físicos, sino también guiarte hacia una recuperación completa y duradera.
            </span><br>

            <ul>
                <div style="margin-left: 10px; margin-top: 10px;">
                    <span class="checkmark" style="font-size: 15px;">&#x2713; MAGNETOTERAPIA DE 360°</span>
                </div>
                <div style="margin-left: 10px; margin-top: 10px;">
                    <span class="checkmark" style="font-size: 15px;">&#x2713; LASERTERAPIA DE ALTA INTENSIDAD</span>
                </div>
                <div style="margin-left: 10px; margin-top: 10px;">
                    <span class="checkmark" style="font-size: 15px;">&#x2713; TERAPIA COMBINADA</span>
                </div>
                <div style="margin-left: 10px; margin-top: 10px;">
                    <span class="checkmark" style="font-size: 15px;">&#x2713; ULTRASONIDO</span>
                </div>
                <div style="margin-left: 10px; margin-top: 10px;">
                    <span class="checkmark" style="font-size: 15px;">&#x2713; ELECTROTERAPIA</span>
                </div>

                <div style="margin-left: 10px; margin-top: 10px;">
                    <span class="checkmark" style="font-size: 15px;">&#x2713; ONDAS DE CHOQUE</span>
                </div>

                <div style="margin-left: 10px; margin-top: 10px;">
                    <span class="checkmark" style="font-size: 15px;">&#x2713; PRESOTERAPIA</span>
                </div>

                <div style="margin-left: 10px; margin-top: 10px;">
                    <span class="checkmark" style="font-size: 15px;">&#x2713; TERAPIA MANUAL</span>
                </div>

            </ul>
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
    <!-- Modal de NANCY -->
<div class="modal fade" id="ronal1" tabindex="-1" aria-labelledby="crearModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="crearModalLabel"></h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body d-flex align-items">
                <img src="assets/images/espe-psicologia/psi1.png" alt="" style="width: 320px; height: 420px; margin-right: 100px;">
                <div class="text-muted">
                    <div class="col-xl-8">
                        <div class="card">
                            <div>
                                <h2 class="text-center">Especialista en Psicología</h2>
                            </div>
                            <hr>
                            <span class="text-justify-center" style="font-size: 15px;">
                                Como psicóloga, mi fuerza radica en la capacidad de sumergirme genuinamente en las experiencias de mis clientes. Mi empatía profunda crea un espacio terapéutico de confianza, impulsando el crecimiento y la transformación personal.
                            </span><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>



    <!-- Modal de vista MARIA -->   

    <div class="modal fade" id="ronal2" tabindex="-1" aria-labelledby="crearModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="crearModalLabel"></h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body d-flex align-items">
                <img src="assets/images/espe-psicologia/es2.png" alt="" style="width: 320px; height: 420px; margin-right: 100px;">
                <div class="text-muted">
                    <div class="col-xl-8">
                        <div class="card">
                            <div>
                                <h2 class="text-center">Especialista en Psicología</h2>
                            </div>
                            <hr>
                            <span class="text-justify-center" style="font-size: 15px;">
                            Como psicóloga, mi habilidad para fomentar la autenticidad y la expresión libre en mis sesiones promueve un ambiente de apertura, facilitando así el descubrimiento personal y la resolución de conflictos internos.
                            </span><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
    
    
     <!-- Modal de vista ROSA -->  

     <div class="modal fade" id="ronal13" tabindex="-1" aria-labelledby="crearModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="crearModalLabel"></h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body d-flex align-items">
                <img src="assets/images/espe-psicologia/esocu.png" alt="" style="width: 320px; height: 420px; margin-right: 100px;">
                <div class="text-muted">
                    <div class="col-xl-8">
                        <div class="card">
                            <div>
                                <h2 class="text-center">Especialista en Terapia Ocupacional</h2>
                            </div>
                            <hr>
                            <span class="text-justify-center" style="font-size: 15px;">
                            Como terapeuta ocupacional, sobresalgo al crear intervenciones personalizadas que no solo promueven la independencia, sino que también transforman la vida diaria de mis pacientes, generando un impacto positivo y duradero.
                            </span><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>


<!-- Modal de vista ANGELICA -->  

<div class="modal fade" id="ronal14" tabindex="-1" aria-labelledby="crearModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="crearModalLabel"></h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body d-flex align-items">
                <img src="assets/images/espe-psicologia/espe3.png" alt="" style="width: 320px; height: 420px; margin-right: 100px;">
                <div class="text-muted">
                    <div class="col-xl-8">
                        <div class="card">
                            <div>
                                <h2 class="text-center">Especialista en Psicologia</h2>
                            </div>
                            <hr>
                            <span class="text-justify-center" style="font-size: 15px;">
                            Como psicóloga, destaco por mi capacidad para establecer conexiones profundas y genuinas con mis pacientes, cultivando un entorno de confianza que facilita la exploración emocional y el desarrollo personal.
                            </span><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>

    <!-- Modal de vista 1 -->   
<!-- RONAL -->






<!-- Modal para terapia lenguaje detalles -->
<div class="modal fade" id="tlenguaje" tabindex="-1" aria-labelledby="crearModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="crearModalLabel"></h2>
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
                                <img src="assets/images/tlenguaje/lgj1.png" alt="First slide" width="100%"/>
                            </div>
                            <div class="carousel-item" data-bs-interval="1000">
                                <img src="assets/images/tlenguaje/lgj2.png" class="d-block w-100" alt="There slide"width="100%" />
                            </div>
                            
                            <div class="carousel-item" data-bs-interval="1000">
                                <img src="assets/images/tlenguaje/lgj3.png" class="d-block w-100" alt="There slide"width="100%" />
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
    <div class="col-xl-6" >
        <div class="card">
            <div>
                <h2 class="text-center">Terapia de Lenguaje</h2>
            </div><hr>

            <span class="text-justify-center" style="font-size: 15px;">¡Bienvenidos al espacio dedicado al desarrollo lingüístico de los pequeños! Aquí, rompemos con lo convencional al sumergirnos en un océano de descubrimiento donde la terapia de lenguaje se entrelaza con atención personalizada y comprensión profunda. Guiamos a cada niño en su viaje único hacia una comunicación efectiva y un desarrollo lingüístico integral. ¡Exploramos nuevas fronteras para el florecimiento emocional y el crecimiento de cada pequeño!
            </span><br>

            <ul>
                <div style="margin-left: 10px; margin-top: 10px;">
                    <span class="checkmark" style="font-size: 15px;">&#x2713; MEJORA DE LA PRONUNCIACIÓN Y ARTICULACIÓN</span>
                </div>
                <div style="margin-left: 10px; margin-top: 10px;">
                    <span class="checkmark" style="font-size: 15px;">&#x2713;MEJORA DE LA PRONUNCIACIÓN Y ARTICULACIÓN</span>
                </div>
                <div style="margin-left: 10px; margin-top: 10px;">
                    <span class="checkmark" style="font-size: 15px;">&#x2713; FOMENTO DE LA COMPETENCIA LECTORA Y ESCRITORA</span>
                </div>
                <div style="margin-left: 10px; margin-top: 10px;">
                    <span class="checkmark" style="font-size: 15px;">&#x2713;ABORDAJE DE TRASTORNOS DEL LENGUAJE</span>
                </div>
                <div style="margin-left: 10px; margin-top: 10px;">
                    <span class="checkmark" style="font-size: 15px;">&#x2713;DESARROLLO DE HABILIDADES SOCIALES Y PRAGMÁTICAS</span>
                </div>

                <div style="margin-left: 10px; margin-top: 10px;">
                    <span class="checkmark" style="font-size: 15px;">&#x2713; EVALUACIÓN DETALLADA DEL LENGUAJE  </span>
                </div>

                <div style="margin-left: 10px; margin-top: 10px;">
                    <span class="checkmark" style="font-size: 15px;">&#x2713;INTERVENCIÓN PERSONALIZADA </span>
                </div>

                <div style="margin-left: 10px; margin-top: 10px;">
                    <span class="checkmark" style="font-size: 15px;">&#x2713; ESTRATEGIAS PARA SUPERAR TRASTORNOS DEL HABLA Y LA VOZ </span>
                </div>

                
            </ul>
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
                <h2 class="modal-title" id="crearModalLabel"></h2>
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
                                <img src="assets/images/tocupacional/ocu1.png" alt="First slide" width="100%"/>
                            </div>
                            <div class="carousel-item" data-bs-interval="2000">
                                <img src="assets/images/tocupacional/ocu2.png" class="d-block w-100" alt="two slide" width="100%"/>
                            </div>
                            <div class="carousel-item">
                                <img src="assets/images/tocupacional/ocu3.png" class="d-block w-100" alt="There slide"width="100%" />
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
    <div class="col-xl-6" >
        <div class="card">
            <div>
                <h2 class="text-center">Terapia Ocupacional</h2>
            </div><hr>

            <span class="text-justify-center" style="font-size: 15px;">
            Bienvenidos a la Terapia Ocupacional, donde el arte de vivir se encuentra con la ciencia de la rehabilitación. En nuestro espacio, nos dedicamos a empoderar a individuos de todas las edades para alcanzar su máxima independencia y participación en las actividades diarias. Nuestros terapeutas ocupacionales, apasionados y dedicados, trabajan mano a mano con cada persona para superar desafíos físicos, emocionales o de desarrollo. Desde la recuperación de habilidades básicas hasta la adaptación en el entorno laboral, estamos comprometidos con su bienestar integral. ¡Bienvenidos a una vida plena a través de la Terapia Ocupacional
            </span><br>

            <ul>
                <div style="margin-left: 10px; margin-top: 10px;">
                    <span class="checkmark" style="font-size: 15px;">&#x2713; EVALUACIÓN DETALLADA DE HABILIDADES Y DESAFÍOS</span>
                </div>
                <div style="margin-left: 10px; margin-top: 10px;">
                    <span class="checkmark" style="font-size: 15px;">&#x2713; DESARROLLO DE COORDINACIÓN Y DESTREZA</span>
                </div>
                <div style="margin-left: 10px; margin-top: 10px;">
                    <span class="checkmark" style="font-size: 15px;">&#x2713; ADAPTACIÓN DE ACTIVIDADES DE LA VIDA DIARIA</span>
                </div>
                <div style="margin-left: 10px; margin-top: 10px;">
                    <span class="checkmark" style="font-size: 15px;">&#x2713; AJUSTE DE ENTORNOS PARA OPTIMIZAR LA INDEPENDENCIA</span>
                </div>
                <div style="margin-left: 10px; margin-top: 10px;">
                    <span class="checkmark" style="font-size: 15px;">&#x2713; INTERVENCIÓN EN DIFICULTADES DE APRENDIZAJE Y DESARROLLO</span>
                </div>

                <div style="margin-left: 10px; margin-top: 10px;">
                    <span class="checkmark" style="font-size: 15px;">&#x2713; REHABILITACIÓN POST-LESIÓN O CIRUGÍA</span>
                </div>

                <div style="margin-left: 10px; margin-top: 10px;">
                    <span class="checkmark" style="font-size: 15px;">&#x2713;DESARROLLO DE HABILIDADES MOTORAS Y COORDINACIÓN</span>
                </div>

                <div style="margin-left: 10px; margin-top: 10px;">
                    <span class="checkmark" style="font-size: 15px;">&#x2713;JUEGO TERAPÉUTICO PARA ESTIMULAR EL APRENDIZAJE </span>
                </div>

                <div style="margin-left: 10px; margin-top: 10px;">
                    <span class="checkmark" style="font-size: 15px;">&#x2713; INTERVENCIÓN EN DIFICULTADES DE APRENDIZAJE Y CONCENTRACIÓN </span>
                </div>

                <div style="margin-left: 10px; margin-top: 10px;">
                    <span class="checkmark" style="font-size: 15px;">&#x2713; ESTIMULACIÓN DE LA CREATIVIDAD Y LA EXPRESIÓN </span>
                </div>
                
            </ul>
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
                <h2 class="modal-title" id="crearModalLabel"></h2>
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
                                <img src="assets/images/tinfantil/inf1.png" alt="First slide" width="100%"/>
                            </div>
                            <div class="carousel-item" data-bs-interval="2000">
                                <img src="assets/images/tinfantil/inf2.png" class="d-block w-100" alt="two slide" width="100%" />
                            </div>
                            <div class="carousel-item">
                                <img src="assets/images/tinfantil/inf3.png" class="d-block w-100" alt="There slide" width="100%"/>
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
    <div class="col-xl-6" >
        <div class="card">
            <div>
                <h2 class="text-center">Terapia Infantil</h2>
            </div><hr>

            <span class="text-justify-center" style="font-size: 15px;">
            Te damos la bienvenida a un espacio dedicado al florecimiento emocional de los más pequeños a través de terapias neurológicas y traumatológicas. Aquí, rompemos con lo convencional, sumergiéndonos en un océano de descubrimiento donde la psicología infantil se fusiona con atención personalizada y comprensión profunda. Guiamos a cada niño en su viaje único hacia el bienestar, abordando terapias neurológicas y traumatológicas para un desarrollo integral.
            </span><br>

            <ul>
                <div style="margin-left: 10px; margin-top: 10px;">
                    <span class="checkmark" style="font-size: 15px;">&#x2713; ESTIMULACION TEMPRANA</span>
                </div>
                <div style="margin-left: 10px; margin-top: 10px;">
                    <span class="checkmark" style="font-size: 15px;">&#x2713; PARALISIS CEREBRAL</span>
                </div>
                <div style="margin-left: 10px; margin-top: 10px;">
                    <span class="checkmark" style="font-size: 15px;">&#x2713; TORSIONES DE MMII</span>
                </div>
                <div style="margin-left: 10px; margin-top: 10px;">
                    <span class="checkmark" style="font-size: 15px;">&#x2713; HABILIDADES SOCIALES</span>
                </div>
                <div style="margin-left: 10px; margin-top: 10px;">
                    <span class="checkmark" style="font-size: 15px;">&#x2713; MODIFICACION DE CONDUCTA</span>
                </div>

                <div style="margin-left: 10px; margin-top: 10px;">
                    <span class="checkmark" style="font-size: 15px;">&#x2713; TERAPIA DE APRENDISAJE</span>
                </div>

                <div style="margin-left: 10px; margin-top: 10px;">
                    <span class="checkmark" style="font-size: 15px;">&#x2713; PSICOMOTRICIDAD </span>
                </div>

                <div style="margin-left: 10px; margin-top: 10px;">
                    <span class="checkmark" style="font-size: 15px;">&#x2713; DISTROFIAS MUSCULARES </span>
                </div>

                <div style="margin-left: 10px; margin-top: 10px;">
                    <span class="checkmark" style="font-size: 15px;">&#x2713; POST OPERADOS </span>
                </div>

                <div style="margin-left: 10px; margin-top: 10px;">
                    <span class="checkmark" style="font-size: 15px;">&#x2713; PIE PLANO </span>
                </div>
                
            </ul>
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
                <h5 class="modal-title" id="crearModalLabel"></h5>
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
                                <img src="assets/images/psicologia/psi1.jpeg" alt="First slide" width="100%"/>
                            </div>
                            <div class="carousel-item" data-bs-interval="2000">
                                <img src="assets/images/psicologia/psi2.png" class="d-block w-100" alt="two slide"width="100%" />
                            </div>
                            <div class="carousel-item">
                                <img src="assets/images/psicologia/psi3.png" class="d-block w-100" alt="There slide" width="100%"/>
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

    <div class="col-xl-6" >
        <div class="card">
            <div>
                <h2 class="text-center">Psicologia</h2>
            </div><hr>

            <span class="text-justify-center" style="font-size: 15px;">
                En el Centro de Especialidad en Psicología, te extendemos una cálida bienvenida a un santuario dedicado a la exploración de la mente y el cultivo del bienestar emocional. En este espacio, nuestra misión va más allá de la educación convencional; aquí, nos sumergimos en un mar de aprendizaje enriquecedor donde los fundamentos de la psicología se entrelazan con una comprensión profunda y una atención dedicada a cada individuo.
            </span><br>

            <ul>
                <div style="margin-left: 10px; margin-top: 10px;">
                    <span class="checkmark" style="font-size: 15px;">&#x2713; ESTRATEGIAS DE APRENDIZAJE</span>
                </div>
                <div style="margin-left: 10px; margin-top: 10px;">
                    <span class="checkmark" style="font-size: 15px;">&#x2713; HABILIDADES SOCIALES BASADAS EN RESPETO Y EMPATIA</span>
                </div>
                <div style="margin-left: 10px; margin-top: 10px;">
                    <span class="checkmark" style="font-size: 15px;">&#x2713; RESOLUCIÓN DE PROBLEMAS</span>
                </div>
                <div style="margin-left: 10px; margin-top: 10px;">
                    <span class="checkmark" style="font-size: 15px;">&#x2713; CAMBIOS DE RUTINA Y ADAPTACIÓN</span>
                </div>
                <div style="margin-left: 10px; margin-top: 10px;">
                    <span class="checkmark" style="font-size: 15px;">&#x2713; METODOS PARA ATENCIÓN Y CONCENTRACIÓN</span>
                </div>

                <div style="margin-left: 10px; margin-top: 10px;">
                    <span class="checkmark" style="font-size: 15px;">&#x2713; MÉTODOS DE RELAJACIÓN</span>
                </div>

                <div style="margin-left: 10px; margin-top: 10px;">
                    <span class="checkmark" style="font-size: 15px;">&#x2713; POTENCIAR LA MEMORIA</span>
                </div>

                <div style="margin-left: 10px; margin-top: 10px;">
                    <span class="checkmark" style="font-size: 15px;">&#x2713; ESTIMULACIÓN COGNITIVA</span>
                </div>

                <div style="margin-left: 10px; margin-top: 10px;">
                    <span class="checkmark" style="font-size: 15px;">&#x2713; AUTOESTIMA</span>
                </div>

                <div style="margin-left: 10px; margin-top: 10px;">
                    <span class="checkmark" style="font-size: 15px;">&#x2713; AUTOESTIMA</span>
                </div>
            </ul>
        </div>
    </div>    
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
                <h5 class="modal-title" id="crearModalLabel"></h5>
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

            <div class="col-xl-6" >
                <div class="card">
                    <div>
                        <h2 class="text-center">Equipos de técnologia</h2>
                    </div><hr>

                    <span class="text-justify-center" style="font-size: 15px;">
                        Ceeri cuenta con numerosos equipos tecnologicos de vanguardia para cumplir adecuadamente
                        con todas los tipos de terapia que ofrecemos asi como profesionales capacitados en su manejo.
                    </span><br>

                    <ul>
                        <div style="margin-left: 10px; margin-top: 10px;">
                            <span class="checkmark" style="font-size: 15px;">&#x2713; Laserterapia</span>
                        </div>
                        <div style="margin-left: 10px; margin-top: 10px;">
                            <span class="checkmark" style="font-size: 15px;">&#x2713; Magnetoterapia</span>
                        </div>
                        <div style="margin-left: 10px; margin-top: 10px;">
                            <span class="checkmark" style="font-size: 15px;">&#x2713; Ultrasonido</span>
                        </div>
                        <div style="margin-left: 10px; margin-top: 10px;">
                            <span class="checkmark" style="font-size: 15px;">&#x2713; Punsion seca</span>
                        </div>
                        <div style="margin-left: 10px; margin-top: 10px;">
                            <span class="checkmark" style="font-size: 15px;">&#x2713; Ondas de choque</span>
                        </div>

                        <div style="margin-left: 10px; margin-top: 10px;">
                            <span class="checkmark" style="font-size: 15px;">&#x2713; Magnetoterapia de 360º</span>
                        </div>

                        <div style="margin-left: 10px; margin-top: 10px;">
                            <span class="checkmark" style="font-size: 15px;">&#x2713; Electroterapia</span>
                        </div>
                    </ul>
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