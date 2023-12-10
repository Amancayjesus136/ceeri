<!--php -->

<?php   
$primeraLetra = strtoupper(substr($user->name, 0, 1));

$rutaImagen = "assets/images/fotoPerfilSmall/{$primeraLetra}.png";

?>

<!--php -->

<style>
    .card-body h1 {
        color: white; 
    }
    .card-body h5 {
        color: white;
    }

    .card-body p {
        color: white;
    }

    .card-body h3 {
        color: white;
    }

    .card-body {
        border-radius: 4px;
        border: 2px;
        border-style: solid;
    }
</style>
@extends('layouts.admin')
{{-- resources/views/perfil/index.blade.php --}}

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
            <div class="col-xl-1">
                <img src="{{ asset($rutaImagen) }}" alt="" style="width: 140px; height: 140px; border-radius: 340px;">
            </div>
            <div class="col-xl-10" style="margin-left: 42px;">
            <!-- Información del usuario -->
            <div class="card" style="background-color: #405189;">
                <div class="card-body d-flex flex-row">
                    <!-- Contenedor para los elementos en línea -->
                    <div>
                        <!-- Nombre del usuario -->
                        <h1>{{ $user->name }}</h1>
                        <!-- Descripción -->
                        <p>Empleado y administrador medio del sistema</p>
                        <!-- Cede -->
                        <h5>Cede: Villa el Salvador</h5>
                    </div>
                    <!-- Botón de edición -->
                    <div class="ms-auto">
                        <a href="{{ route('perfil.edit', ['perfil' => $user->id]) }}" class="btn btn-success">
                            <i class="ri-edit-box-line align-bottom"></i> Editar
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3">
            <div class="card">
                <div class="card-body" style="background-color: #405189;">
                    <h3>informacion</h3> <br>
                    <h5>nombre completo: {{ $user->name }}</h1> <br><br>
                    <h5>Email: {{ $user->email }}</h3> <br><br>
                    <h5>telefono: {{ $user->telefono }}</h5> <br><br>
                    <h5>se unio el: {{ $user->created_at }}</h5>
                    <h5>foto: {{ $user->foto }}</h5>
                </div>
            </div>
        </div>
        <div class="col-xl-8">
            <div class="card">
                <div class="card-body">
                    <h3 style="color: black">sobre:</h3> <br>
                    <p style="color: black">
                        {{ $user->descripcion }}
                    </p>
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

@endsection
