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
        <div class="col-xl-3">
            <div class="card">
                <div class="card-body text-center" style="background-color: #405189; align-items: center;">
                    <img src="{{ asset($rutaImagen) }}" alt="" style="width: 140px; height: 140px; border-radius: 340px;">
                    <h1>{{ $user->name }}</h1>
                    
                </div>
            </div>
        </div>
        <div class="col-xl-8">
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('perfil.update', $user->id) }}">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="name" class="form-label">Nombre completo</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" oninput="limitarCaracteres(this, 255)">
                    </div>
                    <div class="col-md-6">
                        <label for="telefono" class="form-label">Teléfono</label>
                        <input type="text" class="form-control" id="telefono" name="telefono" value="{{ $user->telefono }}" oninput="limitarCaracteres(this, 30)">
                    </div> 
                </div>
                
                <div class="row mb-4">
                    <div class="col-md-6">
                        <label for="descripcion" class="form-label">Descripcion</label>
                        <textarea class="form-control" id="descripcion" name="descripcion" rows="4" oninput="limitarCaracteres(this, 500)">{{ $user->descripcion }}</textarea>
                    </div>
                </div>                                                        
                <div class="row mb-3">
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                        <a href="{{ route('perfil.index') }}" class="btn btn-success"><i class="ri-edit-box-line align-bottom"></i> Volver</a>    
                    </div>
                    <div class="col-md-6">
                        <label for="foto" class="form-label">foto</label>
                        <input type="file" class="form-control" id="foto" name="foto" value="{{ $user->foto }}">
                    </div>
                </div>
            </form>
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

    <!--modal para editar perfil -->
        <div class="modal fade" id="editarPerfil{{ $user->id }}" tabindex="-1" aria-labelledby="editarPerfil" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editarPerfilLabel">Editar la informacion de tu perfil</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('perfil.update', $user->id) }}">
                            @csrf
                            @method('PUT')
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nombre completo</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" oninput="limitarCaracteres(this, 255)">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Correo</label>
                                    <input type="text" class="form-control" id="email" name="email" value="{{ $user->email }}" oninput="limitarCaracteres(this, 255)">
                                </div>
                                <div class="mb-3">
                                    <label for="descripcion" class="form-label">Descripcion</label>
                                    <input type="text" class="form-control" id="descripcion" name="descripcion" value="{{ $user->descripcion }}" oninput="limitarCaracteres(this, 500)">
                                </div>
                                <div class="mb-3">
                                    <label for="telefono" class="form-label">Teléfono</label>
                                    <input type="text" class="form-control" id="telefono" name="telefono" value="{{ $user->telefono }}" oninput="limitarCaracteres(this, 30)">
                                </div>
                                                        
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </form>                
                    </div>
                </div>
            </div>
        </div>    
@endsection