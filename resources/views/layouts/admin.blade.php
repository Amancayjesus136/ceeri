<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>

    <meta charset="utf-8" />
    <title>Ceeri</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- Agrega la referencia a Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    </head>
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">
    <script type='text/javascript' src='assets/libs/flatpickr/flatpickr.min.js'></script>
    <!-- Aquí van tus otros elementos HTML -->

<!-- Enlaces a Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0/css/bootstrap.min.css">

<!-- Aquí va el contenido de tu página -->

<!-- Scripts de Bootstrap y JavaScript requeridos -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.4/umd/popper.min.js"></script>


    <!-- Layout config Js -->
    <script src="{{ asset('assets/js/layout.js') }}"></script>
    <!-- Bootstrap Css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="{{ asset('assets/css/custom.min.css?v=1234') }}" rel="stylesheet" type="text/css" />
    <head>

<!-- ============================================================== --> 
<!-- LISTADO DE MODULO DE ALUMNO -->
<!-- ============================================================== --> 

<style>
    /* Styling for the table container */
    .table-container {
        background-color: white;
        border: 2px solid #ccc;
        border-radius: 10px;
        padding: 10px;
        box-shadow: 5px 5px 5px #888888;
    }
</style>

<!-- JQUERY -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- DATATABLES -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function () {
        // Check if the DataTable is already initialized before reinitializing
        if (!$.fn.dataTable.isDataTable('#tablax')) {
            $('#tablax').DataTable({
                language: {
                    processing: "Tratamiento en curso...",
                    search: "Buscar&nbsp;:",
                    lengthMenu: "Agrupar de _MENU_ items",
                    info: "Mostrando del item _START_ al _END_ de un total de _TOTAL_ items",
                    // ... Add more language options here as needed ...
                },
                scrollY: 400,
                lengthMenu: [[10, 25, -1], [10, 25, "All"]],
            });
        }
    });
</script>
<!-- ============================================================== --> 
<!-- -->
<!-- ============================================================== --> 

@include('layouts.menu-sidebar')
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

      @yield('content')

      @include('layouts.footer')

    </div>
  </div>
    <!-- END layout-wrapper -->

    
    <!--start back-to-top-->
    <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
        <i class="ri-arrow-up-line"></i>
    </button>
    <!--end back-to-top-->

    <!--preloader-->
    <div id="preloader">
        <div id="status">
            <div class="spinner-border text-primary avatar-sm" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>

    



    <!-- JAVA DE CATEGORIAS -->

    <script>

        // TIEMPO, HORAS, MINUTOS

        function mostrarSubcategorias9(selectElement) {
        var subcategoriaContainer = document.getElementById("subcategoria-container-9");
        var subcategoriaSelect = document.getElementById("subcategoria-curso-9");
        
        // Restablecer las opciones de subcategoría
        subcategoriaSelect.innerHTML = '<option selected>Seleccionar subcategoría...</option>';
        
        // Obtener el valor seleccionado de la categoría de curso
        var categoriaCursoValue = selectElement.value;
        
        if (categoriaCursoValue !== "Seleccionar categoría...") {
            // Mostrar el contenedor de subcategoría
            subcategoriaContainer.style.display = "block";
            
            // Agregar las opciones de subcategoría correspondientes
            if (categoriaCursoValue === "1") {
                subcategoriaSelect.innerHTML += '<option value="minutos">Academicas</option>';
                subcategoriaSelect.innerHTML += '<option value="horas">Cronologicas</option>';
            } else if (categoriaCursoValue === "2") {
                subcategoriaSelect.innerHTML += '<option value="horas">Horas</option>';
                subcategoriaSelect.innerHTML += '<option value="minutos">minutos</option>';
            }
        } else {
            // Ocultar el contenedor de subcategoría si no se ha seleccionado ninguna categoría de curso
            subcategoriaContainer.style.display = "none";
        }
    }

        // categoria4
        function mostrarSubcategorias4(selectElement) {
        var subcategoriaContainer = document.getElementById("subcategoria-container-4");
        var subsubcategoriaContainer = document.getElementById("subsubcategoria-container-4");
        
        // Restablecer las opciones de subcategoría y subsubcategoría
        document.getElementById("subcategoria-curso-4").innerHTML = '<option selected>Seleccionar subcategoría...</option>';
        document.getElementById("subsubcategoria-curso-4").innerHTML = '<option selected>Seleccionar subsubcategoría...</option>';
        
        // Obtener el valor seleccionado de la categoría de curso
        var categoriaCursoValue = selectElement.value;
        
        if (categoriaCursoValue !== "Seleccionar categoría...") {
            // Mostrar el contenedor de subcategoría
            subcategoriaContainer.style.display = "block";
            
            // Aquí puedes agregar lógica adicional para cargar las subcategorías correspondientes
            // basándote en el valor de la categoría de curso seleccionada
            
            // Ejemplo de opciones de subcategoría
            if (categoriaCursoValue === "1") {
                document.getElementById("subcategoria-curso-4").innerHTML += '<option value="1">Desarrollo web 4</option>';
                document.getElementById("subcategoria-curso-4").innerHTML += '<option value="2">Desarrollo móvil 4</option>';
            } else if (categoriaCursoValue === "2") {
                document.getElementById("subcategoria-curso-4").innerHTML += '<option value="3">Diseño gráfico 4</option>';
                document.getElementById("subcategoria-curso-4").innerHTML += '<option value="4">Diseño de UX/UI 4</option>';
            } else if (categoriaCursoValue === "3") {
                document.getElementById("subcategoria-curso-4").innerHTML += '<option value="5">Marketing digital 4</option>';
                document.getElementById("subcategoria-curso-4").innerHTML += '<option value="6">SEO 4</option>';
            }
            
            // Mostrar el contenedor de subsubcategoría
            subsubcategoriaContainer.style.display = "block";
        } else {
            // Ocultar el contenedor de subcategoría y subsubcategoría si no se ha seleccionado ninguna categoría de curso
            subcategoriaContainer.style.display = "none";
            subsubcategoriaContainer.style.display = "none";
        }
    }


        //  categoria 3
        function mostrarSubcategorias3(selectElement) {
        var subcategoriaContainer = document.getElementById("subcategoria-container-3");
        var subsubcategoriaContainer = document.getElementById("subsubcategoria-container-3");
        
        // Restablecer las opciones de subcategoría y subsubcategoría
        document.getElementById("subcategoria-curso-3").innerHTML = '<option selected>Seleccionar subcategoría...</option>';
        document.getElementById("subsubcategoria-curso-3").innerHTML = '<option selected>Seleccionar subsubcategoría...</option>';
        
        // Obtener el valor seleccionado de la categoría de curso
        var categoriaCursoValue = selectElement.value;
        
        if (categoriaCursoValue !== "Seleccionar categoría...") {
            // Mostrar el contenedor de subcategoría
            subcategoriaContainer.style.display = "block";
            
            // Aquí puedes agregar lógica adicional para cargar las subcategorías correspondientes
            // basándote en el valor de la categoría de curso seleccionada
            
            // Ejemplo de opciones de subcategoría
            if (categoriaCursoValue === "1") {
                document.getElementById("subcategoria-curso-3").innerHTML += '<option value="1">Desarrollo web 3</option>';
                document.getElementById("subcategoria-curso-3").innerHTML += '<option value="2">Desarrollo móvil 3</option>';
            } else if (categoriaCursoValue === "2") {
                document.getElementById("subcategoria-curso-3").innerHTML += '<option value="3">Diseño gráfico 3</option>';
                document.getElementById("subcategoria-curso-3").innerHTML += '<option value="4">Diseño de UX/UI 3</option>';
            } else if (categoriaCursoValue === "3") {
                document.getElementById("subcategoria-curso-3").innerHTML += '<option value="5">Marketing digital 3</option>';
                document.getElementById("subcategoria-curso-3").innerHTML += '<option value="6">SEO 3</option>';
            }
            
            // Mostrar el contenedor de subsubcategoría
            subsubcategoriaContainer.style.display = "block";
        } else {
            // Ocultar el contenedor de subcategoría y subsubcategoría si no se ha seleccionado ninguna categoría de curso
            subcategoriaContainer.style.display = "none";
            subsubcategoriaContainer.style.display = "none";
        }
    }


    // categoria2
        function mostrarSubcategorias2(selectElement) {
        var subcategoriaContainer = document.getElementById("subcategoria-container-2");
        var subsubcategoriaContainer = document.getElementById("subsubcategoria-container-2");
        
        // Restablecer las opciones de subcategoría y subsubcategoría
        document.getElementById("subcategoria-curso-2").innerHTML = '<option selected>Seleccionar subcategoría...</option>';
        document.getElementById("subsubcategoria-curso-2").innerHTML = '<option selected>Seleccionar subsubcategoría...</option>';
        
        // Obtener el valor seleccionado de la categoría de curso
        var categoriaCursoValue = selectElement.value;
        
        if (categoriaCursoValue !== "Seleccionar categoría...") {
            // Mostrar el contenedor de subcategoría
            subcategoriaContainer.style.display = "block";
            
            // Aquí puedes agregar lógica adicional para cargar las subcategorías correspondientes
            // basándote en el valor de la categoría de curso seleccionada
            
            // Ejemplo de opciones de subcategoría
            if (categoriaCursoValue === "1") {
                document.getElementById("subcategoria-curso-2").innerHTML += '<option value="1">Desarrollo web 2</option>';
                document.getElementById("subcategoria-curso-2").innerHTML += '<option value="2">Desarrollo móvil 2</option>';
            } else if (categoriaCursoValue === "2") {
                document.getElementById("subcategoria-curso-2").innerHTML += '<option value="3">Diseño gráfico 2</option>';
                document.getElementById("subcategoria-curso-2").innerHTML += '<option value="4">Diseño de UX/UI 2</option>';
            } else if (categoriaCursoValue === "3") {
                document.getElementById("subcategoria-curso-2").innerHTML += '<option value="5">Marketing digital 2</option>';
                document.getElementById("subcategoria-curso-2").innerHTML += '<option value="6">SEO 2</option>';
            }
            
            // Mostrar el contenedor de subsubcategoría
            subsubcategoriaContainer.style.display = "block";
        } else {
            // Ocultar el contenedor de subcategoría y subsubcategoría si no se ha seleccionado ninguna categoría de curso
            subcategoriaContainer.style.display = "none";
            subsubcategoriaContainer.style.display = "none";
        }
    }

    // categoria1
    function mostrarSubcategorias(selectElement) {
        var subcategoriaContainer = document.getElementById("subcategoria-container");
        var subsubcategoriaContainer = document.getElementById("subsubcategoria-container");
        
        // Restablecer las opciones de subcategoría y subsubcategoría
        document.getElementById("subcategoria-curso").innerHTML = '<option selected>Seleccionar subcategoría...</option>';
        document.getElementById("subsubcategoria-curso").innerHTML = '<option selected>Seleccionar subsubcategoría...</option>';
        
        // Obtener el valor seleccionado de la categoría de curso
        var categoriaCursoValue = selectElement.value;
        
        if (categoriaCursoValue !== "Seleccionar categoría...") {
            // Mostrar el contenedor de subcategoría
            subcategoriaContainer.style.display = "block";
            
            // Aquí puedes agregar lógica adicional para cargar las subcategorías correspondientes
            // basándote en el valor de la categoría de curso seleccionada
            
            // Ejemplo de opciones de subcategoría
            if (categoriaCursoValue === "1") {
                document.getElementById("subcategoria-curso").innerHTML += '<option value="1">Desarrollo web</option>';
                document.getElementById("subcategoria-curso").innerHTML += '<option value="2">Desarrollo móvil</option>';
            } else if (categoriaCursoValue === "2") {
                document.getElementById("subcategoria-curso").innerHTML += '<option value="3">Diseño gráfico</option>';
                document.getElementById("subcategoria-curso").innerHTML += '<option value="4">Diseño de UX/UI</option>';
            } else if (categoriaCursoValue === "3") {
                document.getElementById("subcategoria-curso").innerHTML += '<option value="5">Marketing digital</option>';
                document.getElementById("subcategoria-curso").innerHTML += '<option value="6">SEO</option>';
            }
            
            // Mostrar el contenedor de subsubcategoría
            subsubcategoriaContainer.style.display = "block";
        } else {
            // Ocultar el contenedor de subcategoría y subsubcategoría si no se ha seleccionado ninguna categoría de curso
            subcategoriaContainer.style.display = "none";
            subsubcategoriaContainer.style.display = "none";
        }
    }

    // EVENTOS REGISTRAR (NACIONALIDAD)

const nacionalidadSelect = document.getElementById('nacionalidadSelect');
    const otraNacionalidadInput = document.getElementById('otraNacionalidadInput');

    nacionalidadSelect.addEventListener('change', function() {
        if (nacionalidadSelect.value === 'otro') {
            otraNacionalidadInput.style.display = 'block';
        } else {
            otraNacionalidadInput.style.display = 'none';
        }
    });

    



</script>

    <!-- JAVASCRIPT -->
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('assets/libs/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
    <script src="{{ asset('assets/js/plugins.js') }}"></script>

    <!-- prismjs plugin -->
    <script src="{{ asset('assets/libs/prismjs/prism.js') }}"></script>

    <script src="{{ asset('assets/js/app.js') }}"></script>

    <!-- Modern colorpicker bundle -->
    <script src="{{ ('assets/libs/@simonwep/pickr/pickr.min.js') }}"></script>

    <!-- init js -->
    <script src="{{ ('assets/js/pages/form-pickers.init.js') }}"></script>

    <!--app js-->
    <script src="{{ ('assets/js/app.js') }}"></script>

</body>

</html>