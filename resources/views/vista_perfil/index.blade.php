@extends('layouts.admin')
@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-lg-12">
                            <div class="text-center">
                                <div class="position-relative d-inline-block">
                                    <div class="position-absolute bottom-0 end-0">
                                        <label for="customer-image-input" class="mb-0" data-bs-toggle="tooltip" data-bs-placement="right" aria-label="Select Image" data-bs-original-title="Select Image">
                                            <div class="avatar-xs cursor-pointer">
                                                <div class="avatar-title bg-light border rounded-circle text-muted">
                                                    <i class="ri-image-fill"></i>
                                                </div>
                                            </div>
                                        </label>
                                        <input class="form-control d-none" value="" id="customer-image-input" type="file" accept="image/png, image/gif, image/jpeg">
                                    </div>
                                    <div class="avatar-lg p-1">
                                        <div class="avatar-title bg-light rounded-circle">
                                            <img src="https://themesbrand.com/velzon/html/default/assets/images/users/avatar-10.jpg" id="customer-img" class="avatar-md rounded-circle object-fit-cover">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <label for="name-field" class="form-label">Nombre Completo</label>
                                <input type="text" id="customername-field" class="form-control" placeholder="Selecciona su nombre..." required="">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div>
                                <label for="company_name-field" class="form-label">Correo Electrónico</label>
                                <input type="text" id="company_name-field" class="form-control" placeholder="correo@gmail.com" required="">
                            </div>
                        </div>

                        <div id="contenedorFechasDeNacimiento">
                        </div>

                        <div id="contenedorTelefonos">
                        </div>
                    </div><br>

                    <button class="btn btn-primary btn-sm" type="button" onclick="agregarCampoDescripcion()" style="outline: none;">
                        <span class="relative">
                            <path fill="currentColor" d="M450.001-450.001h-200q-12.75 0-21.375-8.628-8.625-8.629-8.625-21.384 0-12.756 8.625-21.371 8.625-8.615 21.375-8.615h200v-200q0-12.75 8.628-21.375 8.629-8.625 21.384-8.625 12.756 0 21.371 8.625 8.615 8.625 8.615 21.375v200h200q12.75 0 21.375 8.628 8.625 8.629 8.625 21.384 0 12.756-8.625 21.371-8.625 8.615-21.375 8.615h-200v200q0 12.75-8.628 21.375-8.629 8.625-21.384 8.625-12.756 0-21.371-8.625-8.615-8.625-8.615-21.375v-200Z"></path>
                        </span>
                        <div class="text-sm"> <i class="ri-add-fill"></i>  Descripción</div>
                    </button>

                    <button class="btn btn-primary btn-sm" type="button" onclick="agregarCampoTelefono()" style="outline: none;">
                        <span class="relative">
                            <path fill="currentColor" d="M450.001-450.001h-200q-12.75 0-21.375-8.628-8.625-8.629-8.625-21.384 0-12.756 8.625-21.371 8.625-8.615 21.375-8.615h200v-200q0-12.75 8.628-21.375 8.629-8.625 21.384-8.625 12.756 0 21.371 8.625 8.615 8.625 8.615 21.375v200h200q12.75 0 21.375 8.628 8.625 8.629 8.625 21.384 0 12.756-8.625 21.371-8.625 8.615-21.375 8.615h-200v200q0 12.75-8.628 21.375-8.629 8.625-21.384 8.625-12.756 0-21.371-8.625-8.615-8.625-8.615-21.375v-200Z"></path>
                        </span>
                        <div class="text-sm"> <i class="ri-add-fill"></i>  Teléfono</div>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function agregarCampoDescripcion() {
        var contenedorDescripcion = document.getElementById('contenedorFechasDeNacimiento');

        var existeDescripcion = contenedorDescripcion.querySelector('input[type="text"]');

        if (!existeDescripcion) {
            var nuevoInput = document.createElement('input');
            nuevoInput.type = 'text';
            nuevoInput.placeholder = 'Escribe tu descripcion';
            nuevoInput.classList.add('form-control', 'mt-3');
            contenedorDescripcion.appendChild(nuevoInput);
        }
    }

    function agregarCampoTelefono() {
        var contenedorTelefonos = document.getElementById('contenedorTelefonos');

        var existeTelefono = contenedorTelefonos.querySelector('input[type="tel"]');

        if (!existeTelefono) {
            var nuevoInput = document.createElement('input');
            nuevoInput.type = 'tel';
            nuevoInput.placeholder = 'Número de telefono';
            nuevoInput.classList.add('form-control', 'mt-3');
            contenedorTelefonos.appendChild(nuevoInput);
        }
    }
</script>


@endsection



