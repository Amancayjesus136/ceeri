<!-- Begin page -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<div id="layout-wrapper">

<header id="page-topbar">
<div class="layout-width">
<div class="navbar-header">
<style>

:root {
    --fondo-claro: #ffffff;
    --texto-claro: #000000;
    --fondo-oscuro: #333333;
    --texto-oscuro: #ffffff;
}

body {
    background-color: var(--fondo-claro);
    color: var(--texto-claro);
}

body.modo-oscuro {
    background-color: var(--fondo-oscuro);
}


</style>
    <div class="d-flex">
        <!-- LOGO -->
        <div class="navbar-brand-box horizontal-logo">
            <a href="{{ route('dashboard') }}" class="logo logo-dark">
                <span class="logo-sm">
                    <!-- <img src="{{ asset('assets/images/logo-sm.png') }}" alt="" height="22"> -->
                </span>
                <span class="logo-lg">
                    <!-- <img src="{{ asset('assets/images/logo-dark.png') }}" alt="" height="17"> -->
                </span>
            </a>

            <a href="{{ route('dashboard') }}" class="logo logo-light">
                <span class="logo-sm">
                    <!-- <img src="{{ asset('assets/images/logo-sm.png') }}" alt="" height="22"> -->
                </span>
                <span class="logo-lg">
                    <!-- <img src="{{ asset('assets/images/logo-light.png') }}" alt="" height="100"> -->
                </span>
            </a>
        </div>

        <button type="button" class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger" id="topnav-hamburger-icon">
            <span class="hamburger-icon">
                <span></span>
                <span></span>
                <span></span>
            </span>
        </button>

    </div>

    <div class="d-flex align-items-center">

        <div class="dropdown d-md-none topbar-head-dropdown header-item">
            <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle" id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="bx bx-search fs-22"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-search-dropdown">
                <form class="p-3">
                    <div class="form-group m-0">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                            <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="ms-1 header-item d-none d-sm-flex">
            <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle" data-toggle="fullscreen">
                <i class='bx bx-fullscreen fs-22'></i>
            </button>
        </div>

        <div class="ms-1 header-item d-none d-sm-flex">
            <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle light-dark-mode" id="modoOscuroBtn">
                <i class='bx bx-moon fs-22'></i>
            </button>
        </div>
<script>
// script.js
document.addEventListener('DOMContentLoaded', function () {
    const modoOscuroBtn = document.getElementById('modoOscuroBtn');
    const body = document.body;

    modoOscuroBtn.addEventListener('click', function () {
        body.classList.toggle('modo-oscuro');
        actualizarEstilos();
    });

    function actualizarEstilos() {
        const modoOscuro = body.classList.contains('modo-oscuro');
        document.documentElement.style.setProperty('--fondo', modoOscuro ? '#333333' : '#ffffff');
        document.documentElement.style.setProperty('--texto', modoOscuro ? '#ffffff' : '#000000');
    }
});
</script>

        <div class="dropdown ms-sm-3 header-item topbar-user">
            <button type="button" class="btn" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="d-flex align-items-center">
                    <img class="rounded-circle header-profile-user" src="{{ asset('assets/images/users/avatar-1.jpg') }}" alt="Header Avatar">
                    <span class="text-start ms-xl-2">
                        <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">{{ Auth::user()->name }}</span>
                        <span class="d-none d-xl-block ms-1 fs-12 text-muted user-name-sub-text">Founder</span>
                    </span>
                </span>
            </button>
            <div class="dropdown-menu dropdown-menu-end">
                <!-- item-->
                <h6 class="dropdown-header">Welcome {{ Auth::user()->name }}!</h6>
                <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#profile" class="btn btn-primary w-100""><i class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Profile</span></a>
                <form method="POST" action="{{ route('logout') }}">
                  @csrf
                  <a href="#" onclick="event.preventDefault(); this.closest('form').submit();">
                    <i class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span class="align-middle" data-key="t-logout">Logout</span>
                  </a>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</header>

<div class="modal fade" id="profile" tabindex="-1" aria-labelledby="crearModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="crearModalLabel">TU PERFIL</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body d-flex align-items">
                <img src="" alt=""> en el img va la foto de perfil del usar
                <div class="text-muted">
                    <ul>
                        <li>aqui van el nombre completo</li>
                        <li>aqui van el correo</li>
                        <li>aqui va una descripcion del usuario es decir , el papel que desempeña en ceeri</li>
                        <li>aqui va edad</li>
                        <li>aqui va su telefono</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- removeNotificationModal -->
<div id="removeNotificationModal" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
<div class="modal-content">
    <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="NotificationModalbtn-close"></button>
    </div>
    <div class="modal-body">
        <div class="mt-2 text-center">
            <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
            <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                <h4>Are you sure ?</h4>
                <p class="text-muted mx-4 mb-0">Are you sure you want to remove this Notification ?</p>
            </div>
        </div>
        <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
            <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn w-sm btn-danger" id="delete-notification">Yes, Delete It!</button>
        </div>
    </div>

</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="{{ route('dashboard') }}" class="logo logo-dark">
            <span class="logo-sm">
                <!-- <img src="{{ asset('assets/images/logo-sm.png') }}" alt="" height="22"> -->
            </span>
            <span class="logo-lg">
                <!-- <img src="{{ asset('assets/images/logo-dark.png') }}" alt="" height="17"> -->
            </span>
        </a>
        <!-- Light Logo-->
        <a href="{{ route('dashboard') }}" class="logo logo-light">
            <span class="logo-sm">
                <!-- <img src="{{ asset('assets/images/logo-sm.png') }}" alt="" height="22"> -->
            </span>
            <span class="logo-lg">
            <!-- <img src="{{ asset('assets/images/logo-light.png') }}" alt="" height="70" style="margin-top: 20px;"> -->
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">Menu</span></li>

<!-- ============================================================== -->
<!-- INICIO -->     
<!-- ============================================================== --> 
            <li class="nav-item">
                <a class="nav-link menu-link" href="{{ route('login') }}">
                    <i class="fas fa-home"></i> <span data-key="t-Usuarios">Inicio</span>
                </a>
            </li>
<!-- ============================================================== -->
<!-- Seleccionar -->     
<!-- ============================================================== --> 
            <li class="nav-item">
                <a class="nav-link menu-link" href="{{ route('seleccionar.index') }}">
                    <i class="far fa-calendar-alt"></i> <span data-key="t-Usuarios">Reserva</span>
                </a>
            </li>

<!-- ============================================================== -->
<!-- Clientes -->     
<!-- ============================================================== --> 
<li class="nav-item">
    <a class="nav-link menu-link" href="{{ route('lstpsicologia.index') }}">
        <i class="far fa-calendar-alt"></i> <span data-key="t-Usuarios">Clientes</span>
    </a>
</li>

<!-- ============================================================== -->
<!-- Reservas para hoy -->     
<!-- ============================================================== --> 

             <li class="nav-item">
                <a class="nav-link menu-link" href="#reservashoy" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarPlanCurricular">
                    <i class="fas fa-clipboard-list"></i> <span data-key="t-Configuración">Reservas para hoy</span>
                </a>
                <div class="collapse menu-dropdown" id="reservashoy">
                    <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                            <a href="{{ route('creservadas.index') }}" class="nav-link">
                                <i class="fas fa-clock"></i>Reservas para hoy
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('ccumplidas.index') }}" class="nav-link">
                                <i class="fas fa-check"></i>Citas cumplidas
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('ccanceladas.index') }}" class="nav-link">
                                <i class="fas fa-times"></i>Citas candeladas
                            </a>
                        </li>
                        
                        
                    </ul>
                </div>
             </li>

               <!-- ============================================================== -->
                <!-- CONFIGURACIÓN -->     
                <!-- ============================================================== -->  
            <li lcass="nav-item">
                <a class="nav-link menu-link" href="#sidebarConfiguracion" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarPlanCurricular">
                    <i class="fas fa-cogs"></i> <span data-key="t-Configuración">Configuracion de Inicio</span>
                </a>
                <div class="collapse menu-dropdown" id="sidebarConfiguracion">
                    <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                            <a href="{{ route('inicio.reservarcita') }}" class="nav-link">
                                <i class="fas fa-stethoscope"></i>Lo que ofrecemos
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('inicio.reservarnumero')}}" class="nav-link">
                                <i class="fas fa-arrow-right"></i>Pasos a seguir
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('inicio.conocememas')}}" class="nav-link">
                                <i class="fas fa-info-circle"></i> Conócenos
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('inicio.imagenceeri')}}" class="nav-link">
                                <i class="ri-screenshot-2-line"></i> Imagen de Ceeri
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </div> 
        
    </div>















    <div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>