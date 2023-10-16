@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">VISTA > <span style="color: #BEDA13;">Imagen de Ceeri</span></h4>
            <div class="page-title-right">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1"></h4>
                </div>
            </div>
        </div>
    </div>
</div>
<div style="background-color: white; padding: 20px;">
    <form method="post" action="#">
        @csrf
        @method('PUT')
        <div class="row mb-3">
            <div class="col-lg-3">
                <label for="nameInput" class="form-label">Imagen de Ceeri</label>
            </div>
            <div class="col-lg-9">
                <input type="file" class="form-control" id="nameInput" name="imagen_data" value="" required>
            </div>
        </div>
        <div class="text-end">
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </form>
</div>

@endsection
