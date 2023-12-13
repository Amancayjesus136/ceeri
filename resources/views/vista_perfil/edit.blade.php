@extends('layouts.admin')
@section('content')

<div class="container-fluid">
    <div class="position-relative mx-n4 mt-n4">
        <div class="profile-wid-bg profile-setting-img">
            <img src="assets/images/profile-bg.jpg" class="profile-wid-img" alt="">
            <div class="overlay-content">
                <div class="text-end p-3">
                    <div class="p-0 ms-auto rounded-circle profile-photo-edit">
                        <input id="profile-foreground-img-file-input" type="file" class="profile-foreground-img-file-input">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xxl-3">
            <div class="card mt-n5">
                <div class="card-body p-4">
                    <div class="text-center">
                        <div class="profile-user position-relative d-inline-block mx-auto  mb-4">
                        <img id="user-profile-image" src="{{ asset($user->foto ? 'storage/assets/images/' . $user->foto : 'assets/images/sin-foto.png') }}" class="rounded-circle avatar-xl img-thumbnail user-profile-image" alt="user-profile-image">
                            <form method="POST" action="{{ route('perfiles.update', $user->id) }}" enctype="multipart/form-data" id="perfilForm">
                            @csrf
                            @method('PUT')
                            <input id="profile-img-file-input" name="foto" type="file" class="profile-img-file-input">
                            <label for="profile-img-file-input" class="profile-photo-edit avatar-xs">
                                <span class="avatar-title rounded-circle bg-light text-body">
                                    <i class="ri-camera-fill"></i>
                                </span>
                            </label>
                        </div>

                        <h5 class="fs-16 mb-1">{{ $user->name }}</h5>
                        <p class="text-muted mb-0">Usuario validado correctamente</p>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-4">
                        <div class="flex-grow-1">
                            <h5 class="card-title mb-0">Redes Sociales</h5>
                        </div>
                    </div>
                    <div class="mb-3 d-flex">
                        <div class="avatar-xs d-block flex-shrink-0 me-3">
                            <span class="avatar-title rounded-circle fs-16 bg-primary text-light">
                                <i class="ri-facebook-fill"></i>
                            </span>
                        </div>
                        <input type="any" class="form-control" name="facebook" id="gitUsername" placeholder="Nombre de usuario" value="{{ $user->facebook }}">
                    </div>
                    <div class="mb-3 d-flex">
                        <div class="avatar-xs d-block flex-shrink-0 me-3">
                            <span class="avatar-title rounded-circle fs-16 bg-danger">
                                <i class="ri-instagram-fill"></i>
                            </span>
                        </div>
                        <input type="any" class="form-control" name="instagram" id="pinterestName" placeholder="Nombre de usario" value="{{ $user->instagram }}">
                    </div>
                    <div class="mb-3 d-flex">
                        <div class="avatar-xs d-block flex-shrink-0 me-3">
                            <span class="avatar-title rounded-circle fs-16 bg-success">
                                <i class="ri-whatsapp-fill"></i>
                            </span>
                        </div>
                        <input type="any" class="form-control" name="wsp" id="dribbleName" placeholder="Número de whatsapp" value="{{ $user->wsp }}">
                    </div>
                    <div class="mb-3 d-flex">
                        <div class="avatar-xs d-block flex-shrink-0 me-3">
                            <span class="avatar-title rounded-circle fs-16 bg-info">
                                <i class="ri-twitter-fill"></i>
                            </span>
                        </div>
                        <input type="any" class="form-control" name="twitter" id="websiteInput" placeholder="Nombre de usuario" value="{{ $user->twitter }}">
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xxl-9">
            <div class="card mt-xxl-n5">
                <div class="card-header">
                    <ul class="nav nav-tabs-custom rounded card-header-tabs border-bottom-0" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#personalDetails" role="tab">
                                <i class="fas fa-home"></i> Detalles personales
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#changePassword" role="tab">
                                <i class="far fa-user"></i> Cambiar la contraseña
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card-body p-4">
                    <div class="tab-content">
                        <div class="tab-pane active" id="personalDetails" role="tabpanel">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="firstnameInput" class="form-label">Nombre Completo</label>
                                            <input type="text" class="form-control" name="name" id="firstnameInput" placeholder="Ponga su nombre completo" value="{{ $user->name }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="emailInput" class="form-label">Correo Electrónico</label>
                                            <input type="email" class="form-control" name="email" id="emailInput" placeholder="Introduce tu correo electrónico" value="{{ $user->email }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="phonenumberInput" class="form-label">Teléfono</label>
                                            <input type="text" class="form-control" name="telefono" id="phonenumberInput" placeholder="Ingrese su número telefónico" value="{{ $user->telefono }} ">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="JoiningdatInput" class="form-label">Fecha de cumpleaños</label>
                                            <input type="date" class="form-control" data-provider="" name="cumpleanos" value="{{ $user->cumpleanos }}" id="JoiningdatInput" data-date-format="d M, Y" placeholder="Seleccione fecha" />
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3 pb-2">
                                            <label for="exampleFormControlTextarea" class="form-label">Descripción</label>
                                            <textarea class="form-control" name="descripcion" id="exampleFormControlTextarea" placeholder="Introduce tu descripción" rows="3">{{ $user->descripcion }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                        <div class="hstack gap-2 justify-content-end">
                                            <button type="submit" class="btn btn-primary">Actualizaciones</button>
                                            <a href="{{ route('perfiles.index') }}" class="btn btn-soft-success">Cancelar</a>
                                        </div>
                                    </div>
                            </form>
                        </div>

                        <div class="tab-pane" id="changePassword" role="tabpanel">
                            <form action="javascript:void(0);">
                                <div class="row g-2">
                                    <div class="col-lg-4">
                                        <div>
                                            <label for="oldpasswordInput" class="form-label">Contraseña anterior*</label>
                                            <input type="password" class="form-control" id="oldpasswordInput" placeholder="Contraseña anterior">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div>
                                            <label for="newpasswordInput" class="form-label">Nueva contraseña*</label>
                                            <input type="password" class="form-control" id="newpasswordInput" placeholder="Nueva contraseña">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div>
                                            <label for="confirmpasswordInput" class="form-label">Confirmar Contraseña*</label>
                                            <input type="password" class="form-control" id="confirmpasswordInput" placeholder="Confirmar Contraseña">
                                        </div>
                                    </div>
                                
                                    <div class="col-lg-12">
                                        <div class="text-end">
                                            <button type="submit" class="btn btn-success">Cambiar la contraseña</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('profile-img-file-input').addEventListener('change', function (e) {
            var selectedImage = e.target.files[0];

            if (selectedImage) {
                var imageUrl = URL.createObjectURL(selectedImage);

                document.getElementById('user-profile-image').src = imageUrl;
            }
        });
    });
</script>

@endsection



