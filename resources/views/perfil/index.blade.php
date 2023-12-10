<!-- PHP -->
<?php
$primeraLetra = strtoupper(substr($user->name, 0, 1));
$rutaImagen = "assets/images/fotoPerfilSmall/{$primeraLetra}.png";
?>

<!-- Estilos CSS -->
<style>
    body {
        background-color: #f8f9fa; /* Color de fondo */
    }

    .card-body h1, .card-body h5, .card-body p, .card-body h3 {
        color: #343a40; /* Color de texto */
    }

    .card-body {
        border-radius: 10px;
        border: 2px solid #ced4da; /* Color del borde */
        background-color: #fff; /* Color de fondo de la tarjeta */
        padding: 20px;
        margin-bottom: 20px;
    }

    .card {
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Sombra de la tarjeta */
    }

    .row {
        margin: 20px 0;
    }

    #successAlertEdit {
        margin-top: 20px;
    }
</style>

@extends('layouts.admin')
@extends('layouts.footer')

@section('content')
    @if(session('successEdit'))
        <div id="successAlertEdit" class="alert alert-success alert-dismissible bg-success text-white alert-label-icon fade show" role="alert">
            <i class="ri-notification-off-line label-icon"></i><strong>Éxito</strong> - Su perfil ha sido editado correctamente
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if ($user)
        <div class="row">
            <div class="col-4">
                <img src="{{ asset($rutaImagen) }}" alt="Foto de perfil" style="width: 140px; height: 140px; border-radius: 50%;">
            </div>

            <div class="col-md-6">
        <!-- Información del usuario -->
        <div class="card mt-3">
            <div class="card-body d-flex flex-row">
                <div>
                    <h1 class="card-title">{{ $user->name }}</h1>
                    <p class="card-text">Empleado y administrador medio del sistema</p>
                    <h5 class="card-text">Cede: Villa el Salvador</h5>
                </div>

                <div class="ms-auto">
                    <a href="{{ route('perfil.edit', ['perfil' => $user->id]) }}" class="btn btn-success">
                        <i class="ri-edit-box-line align-bottom"></i> Editar
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
            <div>
                <!-- Información adicional -->
                <h3>INFORMACION</h3>
                <div class="card">
                    <div class="card-body">
                        <h5>Nombre completo: {{ $user->name }}</h5>
                        <h5>Email: {{ $user->email }}</h5>
                        <h5>Teléfono: {{ $user->telefono }}</h5>
                        <h5>Se unió el: {{ $user->created_at }}</h5>
                        <h5>Foto: {{ $user->foto }}</h5>
                    </div>
                </div>
            </div>

            <div >
                <!-- Sobre el usuario -->
                <div class="card">
                    <div class="card-body">
                        <h3>Sobre:</h3>
                        <p>{{ $user->descripcion }}</p>
                    </div>
                </div>
            </div>
        </div>
    @else
        <p>No se encontró perfil para este usuario.</p>
    @endif

    <script>
        var successAlertEdit = document.getElementById('successAlertEdit');

        if (successAlertEdit) {
            setTimeout(function () {
                successAlertEdit.classList.remove('show');
                setTimeout(function () {
                    window.location.reload();
                }, 1000);
            }, 2000);
        }
    </script>

    <!-- Scripts para limitar caracteres -->
    <script>
        function limitarCaracteres(input, maxLength) {
            if (input.value.length > maxLength) {
                input.value = input.value.slice(0, maxLength);
            }
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
@endsection
