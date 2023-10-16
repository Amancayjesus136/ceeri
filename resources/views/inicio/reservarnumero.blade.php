@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">VISTA > <span style="color: #BEDA13;">Pasos de Reservar</span></h4>
            <div class="page-title-right">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1"></h4>
                </div>
            </div>
        </div>
    </div>
</div>
<div style="background-color: white; padding: 20px;">
    <form method="post" action="{{ route('numero.editar_numero', $numero->id_numero) }}">
        @csrf
        @method('PUT')

        <div class="row mb-3">
            <div class="col-lg-3">
                <label for="nameInput" class="form-label">Número</label>
            </div>
            <div class="col-lg-9">
                <input type="text" class="form-control" id="nameInput" name="numero" value="{{ $numero->numero }}" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-lg-3">
                <label for="nameInput" class="form-label">Titulo</label>
            </div>
            <div class="col-lg-9">
                <input type="text" class="form-control" id="nameInput" name="titulo_numero" value="{{ $numero->titulo_numero }}" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-lg-3">
                <label for="websiteUrl" class="form-label">Descripción</label>
            </div>
            <div class="col-lg-9">
                <textarea class="form-control" id="descripcion" name="descripcion_numero" rows="4" required>{{ $numero->descripcion_numero }}</textarea>
            </div>
        </div>
        <div class="text-end">
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </form>
</div>

@endsection
