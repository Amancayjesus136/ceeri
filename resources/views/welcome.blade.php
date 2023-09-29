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
                                    <a class="dropdown-item" href="#candidates">Galeria</a>
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
                            <a href="{{ route('login') }}" class="btn btn-soft-primary"><i class="ri-user-3-line align-bottom me-1"></i> Iniciar Sección</a>
                        </div>
                    </div>
                    

                </div>
            </nav>
            

<!-- Modal para Crear Nuevo reserva -->
<div class="modal fade" id="agregarModal" tabindex="-1" aria-labelledby="crearModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="crearModalLabel">Crear nuevo registro</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="#" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="tipo_documento" class="form-label">Tipo de Documento</label>
                            <select class="form-select" id="tipo_documento" name="tipo_documento">
                                <option value="" disabled selected>Seleccionar tipo de documento...</option>
                                <option value="DNI">DNI</option>
                                <option value="Pasaporte">Pasaporte</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="numero_documento" class="form-label">Número de Documento</label>
                            <input type="number" class="form-control" id="numero_documento" name="numero_documento">
                        </div>
                        <div class="mb-3">
                            <label for="nombres" class="form-label">Nombres</label>
                            <input type="text" class="form-control" id="nombres" name="nombres">
                        </div>
                        <div class="mb-3">
                            <label for="apellidos" class="form-label">Apellidos</label>
                            <input type="text" class="form-control" id="apellidos" name="apellidos">
                        </div>
                        <div class="mb-3">
                            <label for="telefono" class="form-label">Teléfono</label>
                            <input type="number" class="form-control" id="telefono" name="telefono">
                        </div>
                        <div class="mb-3">
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
                        <div class="mb-3">
                            <label for="genero" class="form-label">Género</label>
                            <select class="form-select" id="genero" name="genero">
                                <option value="" disabled selected>Seleccionar género...</option>
                                <option value="Masculino">Masculino</option>
                                <option value="Femenino">Femenino</option>
                                <option value="Otro">Otro</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Reservar cita</button>
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
                    background-color: #499BE7
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
            </style>

            <!-- start hero section -->
            <section class="section job-hero-section bg-crema pb-0" id="hero">
                <div class="container">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-lg-6">
                            <div>
                            <h1 class="display-6 fw-semibold text-capitalize mb-3 lh-base texto-azul">Consulta tu cita en menos de lo que esperas</h1>
                                <p  style="color: white;">Brindamos a nuestros usuarios la facilidad de consultar sus citas por si se les olvidaron.</p>
                                <form action="{{ route('consultar') }}" class="job-panel-filter" method="POST">
                                    @csrf 
                                    <div class="row g-md-0 g-2">
                                        <div class="col-md-4">
                                            <div>
                                                <select class="form-control" data-choices>
                                                    <option value="">Seleccionar tipo</option>
                                                    <option value="Full Time">DNI</option>
                                                    <option value="Part Time">Pasaporte</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div>
                                                <input type="number" id="job-title" class="form-control filter-input-box" placeholder="Insertar dato...">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="h-100">
                                                <button id="consultarBtn" class="btn btn-primary submit-btn w-100 h-100" type="button" data-bs-toggle="modal" data-bs-target="#myModal"><i class="ri-search-2-line align-bottom me-1"></i> Consultar</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                                <!-- Modal -->
                                <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="crearModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="crearModalLabel">Consulta tu Reserva</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="#" method="POST">
                                                    @csrf
                                                    <div class="mb-3">
                                                        <label for="numero_documento" class="form-label">Número de Documento</label>
                                                        <input type="number" class="form-control" id="numero_documento" name="numero_documento">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="nombres" class="form-label">Nombres</label>
                                                        <input type="text" class="form-control" id="nombres" name="nombres">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="apellidos" class="form-label">Apellidos</label>
                                                        <input type="text" class="form-control" id="apellidos" name="apellidos">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="fecha_hora" class="form-label">Fecha de reserva</label>
                                                        <input type="date" class="form-control" id="fecha_hora" name="fecha_hora">
                                                    </div>
                                                        <button type="button" class="btn btn-success ml-auto" data-bs-dismiss="modal">Retroceder</button>
                                                </form>
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
                                                <a class="nav-link" href="https://wa.me/tunumerodetelefono">
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
                                <h1 class="mb-3 ff-secondary fw-semibold lh-base">Como <span class="text-primary">reservar tu cita</span> en menos de un minuto!!</h1>
                                <p class="text-muted">Seleccionar la opción <a href="#"><span class="text-primary">Reservar tu cita</span></a>, llenar los datos completos y obtener el mejor servicio por nustros especialistas. </p>
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!--end row-->
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="card shadow-lg">
                                <div class="card-body p-4">
                                    <h1 class="fw-bold display-5 ff-secondary mb-4 text-success position-relative">
                                        <div class="job-icon-effect"></div>
                                        <span>1</span>
                                    </h1>
                                    <h6 class="fs-17 mb-2">Registrar tus datos completos</h6>
                                    <p class="text-muted mb-0 fs-15">Se deberá llenar los datos completos del solicitante.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="card shadow-none">
                                <div class="card-body p-4">
                                    <h1 class="fw-bold display-5 ff-secondary mb-4 text-success position-relative">
                                        <div class="job-icon-effect"></div>
                                        <span>2</span>
                                    </h1>
                                    <h6 class="fs-17 mb-2">Seleccionar la especialidad</h6>
                                    <p class="text-muted mb-0 fs-15">Es importante seleccionar la especialidad de la consulta.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="card shadow-none">
                                <div class="card-body p-4">
                                    <h1 class="fw-bold display-5 ff-secondary mb-4 text-success position-relative">
                                        <div class="job-icon-effect"></div>
                                        <span>3</span>
                                    </h1>

                                    <h6 class="fs-17 mb-2">Se deberá asignar Fecha y hora</h6>
                                    <p class="text-muted mb-0 fs-15">Deberá registrar el horario de su reserva.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="card shadow-none">
                                <div class="card-body p-4">
                                    <h1 class="fw-bold display-5 ff-secondary mb-4 text-success position-relative">
                                        <div class="job-icon-effect"></div>
                                        <span>4</span>
                                    </h1>
                                    <h6 class="fs-17 mb-2">SE REGISTRARÁ SU CITA!</h6>
                                    <p class="text-muted mb-0 fs-15">Por ultimo se le asignará un horario para acercarse a nosotros.</p>
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
                                <h1 class="mb-3 lh-base"><span class="text-primary">Conocenos</span> un poco más!</h1>
                                <p class="ff-secondary fs-16 mb-2">Somos un centro dedicado a la atención de <b>pacientes con alteraciones motoras temporales y/o permanentes. </b> Preocurando su bienestar a travéz dun tratamiento multidisciplinado enfocado eneliminar el dolor y recuperar su movibilidad.
                                <p class="ff-secondary fs-16">Contamos con equipos disioterapéuticos de la másavanzada tecnología.</p>
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
                                            <p class="mb-0">Magento</p>
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
                                            <p class="mb-0">Laser</p>
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
                                            <p class="mb-0">Corrientes TENS</p>
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
                                            <p class="mb-0">Agentes fisicos de calor y frío</p>
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

             <!-- start blog -->
             <section class="section" id="blog">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="text-center mb-5">
                                <h1 class="mb-3 ff-secondary fw-semibold text-capitalize lh-base">LO QUE <span class="text-primary">OFRECEMOS</span></h1>
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
                                        <a href="#!" class="link-success">Vista <i class="ri-arrow-right-line align-bottom ms-1"></i></a>
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
                                        <a href="#!" class="link-success">Vista <i class="ri-arrow-right-line align-bottom ms-1"></i></a>
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
                                        <a href="#!" class="link-success">Vista <i class="ri-arrow-right-line align-bottom ms-1"></i></a>
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
                                        <a href="#!" class="link-success">Vista <i class="ri-arrow-right-line align-bottom ms-1"></i></a>
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
                                        <a href="#!" class="link-success">Vista <i class="ri-arrow-right-line align-bottom ms-1"></i></a>
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
                                        <h5>Terapia Física</h5>
                                    </a>
                                    <p class="text-muted fs-14">Tratamiento que se enfoca en mejorar la función física, la movilidad y la calidad de vida de las personas.</p>
                                    <div>
                                        <a href="#!" class="link-success">Vista <i class="ri-arrow-right-line align-bottom ms-1"></i></a>
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
                            <button class="btn btn-danger" type="button">Contactar <i class="ri-arrow-right-line align-bottom"></i></button>
                        </div>
                    </div>
                </div>
            </section>
            </div>

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
                                            <li><a href="pages-faqs.html">WhatsApp</a></li>
                                            <li><a href="pages-faqs.html">Correo Electrónico</a></li>
                                            <li><a href="pages-faqs.html">Facebook</a></li>
                                            <li><a href="pages-faqs.html">Instagram</a></li>
                                            <li><a href="pages-faqs.html">Telefono personal</a></li>
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
                                        <a href="pages-privacy-policy.html">Politica y privacidad</a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="pages-term-conditions.html">Terminos y condiciones</a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="pages-privacy-policy.html">Seguridad</a>
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

        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <script>
        $(document).ready(function() {
            $("#consultarBtn").on("click", function() {
                var tipoDocumento = $("#tipoDocumento").val();
                var numeroDocumento = $("#job-title").val();

                $.ajax({
                    type: "POST",
                    url: "{{ route('consultar') }}",
                    data: {
                        tipo_documento: tipoDocumento,
                        numero_documento: numeroDocumento,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        var modalContent = '<ul>';
                        $.each(response, function(index, resultado) {
                            modalContent += '<li>Nombre: ' + resultado.nombres + ' ' + resultado.apellidos + ', Especialidad: ' + resultado.especialidad + '</li>';
                        });
                        modalContent += '</ul>';

                        $("#modalBody").html(modalContent);
                        $("#myModal").modal();
                    }
                });
            });
        });
    </script>


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