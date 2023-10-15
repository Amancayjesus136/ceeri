@extends('layouts.admin')
@section('content')
<form method="post" action="{{ route('inicio.editar_reservarcita', $contenido->id) }}">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="titulo">Título:</label>
        <input type="text" class="form-control" id="titulo" name="titulo_reservar" value="{{ $contenido->titulo_reservar }}">
    </div>
    <div class="form-group">
        <label for="descripcion">Descripción:</label>
        <textarea class="form-control" id="descripcion" name="descripcion_reservar">{{ $contenido->descripcion_reservar }}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
</form>
@endsection