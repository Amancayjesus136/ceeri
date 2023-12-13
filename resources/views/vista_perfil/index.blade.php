@extends('layouts.admin')
@section('content')


<div class="container-fluid">
    <div class="profile-foreground position-relative mx-n4 mt-n4">
        <div class="profile-wid-bg">
            <img src="assets/images/profile-bg.jpg" alt="" class="profile-wid-img" />
        </div>
    </div>
    <div class="pt-4 mb-4 mb-lg-3 pb-lg-4 profile-wrapper">
        <div class="row g-4">
            <div class="col-auto">
                <div class="avatar-lg">
                    <img src="{{ asset($user->foto ? 'storage/assets/images/' . $user->foto : 'assets/images/sin-foto.png') }}" alt="user-img" class="img-thumbnail rounded-circle" />
                </div>
            </div>
            <div class="col">
                <div class="p-2"><br>
                    <h3 class="text-white mb-1">{{ $user->name }}</h3>
                    <div class="hstack text-white-50 gap-1">
                        <div class="me-2"><i class="ri-map-pin-user-line me-1 text-white-75 fs-16 align-middle"></i>Vila El Salvador</div>
                        <div>
                            <i class="ri-building-line me-1 text-white-75 fs-16 align-middle"></i>Ceeri
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div>
                <div class="d-flex profile-wrapper">
                    <ul class="nav nav-pills animation-nav profile-nav gap-2 gap-lg-3 flex-grow-1" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link fs-14 active" data-bs-toggle="tab" href="#overview-tab" role="tab">
                                <i class="ri-airplay-fill d-inline-block d-md-none"></i> <span class="d-none d-md-inline-block">Datos</span>
                            </a>
                        </li>
                    </ul>
                    <div class="flex-shrink-0">
                        <a href="{{route('editar.edit')}}" class="btn btn-success"><i class="ri-edit-box-line align-bottom"></i> Editar Pérfil</a>
                    </div>
                </div>
                <div class="tab-content pt-4 text-muted">
                    <div class="tab-pane active" id="overview-tab" role="tabpanel">
                        <div class="row">
                            <div class="col-xxl-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title mb-3">Información</h5>
                                        <div class="table-responsive">
                                            <table class="table table-borderless mb-0">
                                                <tbody>
                                                    <tr>
                                                        <th class="ps-0" scope="row"><i class="ri-user-2-fill"></i> Nombres:</th>
                                                        <td class="text-muted">{{ $user->name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="ps-0" scope="row"><i class="fas fa-envelope"></i> Correo :</th>
                                                        <td class="text-muted">{{ $user->email }}</td>
                                                    </tr>
                                                    @if($user->telefono)
                                                    <tr>
                                                        <th class="ps-0" scope="row"><i class="fas fa-phone"></i> Teléfono :</th>
                                                        <td class="text-muted"> +(51) {{ $user->telefono }}</td>
                                                    </tr>
                                                    @endif
                                                    @if($user->cumpleanos)
                                                    <tr>
                                                        <th class="ps-0" scope="row"><i class="fas fa-birthday-cake"></i> Cumpleaños</th>
                                                        <td class="text-muted">{{ \Carbon\Carbon::parse($user->cumpleanos)->format('d/m/Y') }}</td>
                                                    </tr>
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title mb-4">Redes Sociales</h5>
                                        <div class="d-flex flex-wrap gap-2">
                                            <div>
                                                <a href="javascript:void(0);" class="avatar-xs d-block">
                                                    <span class="avatar-title rounded-circle fs-16 bg-primary text-light">
                                                        <i class="ri-facebook-fill"></i>
                                                    </span>
                                                </a>
                                            </div>
                                            <div>
                                                <a href="javascript:void(0);" class="avatar-xs d-block">
                                                    <span class="avatar-title rounded-circle fs-16 bg-info">
                                                        <i class="ri-twitter-fill"></i>
                                                    </span>
                                                </a>
                                            </div>
                                            <div>
                                                <a href="javascript:void(0);" class="avatar-xs d-block">
                                                    <span class="avatar-title rounded-circle fs-16 bg-success">
                                                        <i class="ri-whatsapp-fill"></i>
                                                    </span>
                                                </a>
                                            </div>
                                            <div>
                                                <a href="javascript:void(0);" class="avatar-xs d-block">
                                                    <span class="avatar-title rounded-circle fs-16 bg-danger">
                                                        <i class="ri-instagram-fill"></i>
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xxl-9">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title mb-3">Acerca de</h5>
                                        @if($user->descripcion)
                                            <p>{{ $user->descripcion }}</p>
                                        @else
                                            <p style="text-align: center;">Sin descripción de usuario</p>
                                        @endif
                                        <div class="row">
                                            <div class="col-6 col-md-4">
                                                <div class="d-flex mt-4">
                                                    <div class="flex-shrink-0 avatar-xs align-self-center me-3">
                                                        <div class="avatar-title bg-light rounded-circle fs-16 text-primary">
                                                            <i class="ri-user-2-fill"></i>
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <p class="mb-1">Designación :</p>
                                                        <h6 class="text-truncate mb-0">Usuario validado correctamente</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-6 col-md-4">
                                                <div class="d-flex mt-4">
                                                    <div class="flex-shrink-0 avatar-xs align-self-center me-3">
                                                        <div class="avatar-title bg-light rounded-circle fs-16 text-primary">
                                                            <i class="ri-global-line"></i>
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <p class="mb-1">Sitio web :</p>
                                                        <a href="http://localhost:8000/" class="fw-semibold">www.ceeri.com.pe</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



