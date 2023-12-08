@extends('layouts.admin')
{{-- resources/views/perfil/index.blade.php --}}

@section('content')
<!DOCTYPE html>
<html lang="en">
<body>
@if(session('successEdit'))
                <div id="successAlertEdit" class="alert alert-success alert-dismissible bg-success text-white alert-label-icon fade show" role="alert">
                    <i class="ri-notification-off-line label-icon"></i><strong>Éxito</strong> - Su perfil ha sido editado correctamente
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
@endif
@if ($user)
    <div class="row">
        <div class="col-xl-4">
            <img src="assets/images/tfisica/img3.png" alt="" style="width: 320px; height: 420px; margin-right: 40px;">
        </div>
        <div class="col-xl-7">
            <div class="card">
                <div class="card-body">
                    <h1>{{ $user->name }}</h1> <br>
                    <h3>Email: {{ $user->email }}</h3> <br>
                    <h5>informacion <br></h5>
                    <div class="text-muted" style="font-size: 15px;">
                       {{ $user->descripcion }}
                    </div> <br>
                    <h5>telefono: {{ $user->telefono }}</h5> <br>
                    <td>
                        <a href="#" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editarPerfil{{ $user->id }}">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                    </td>
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
</body>
</html>
        
@endsection
