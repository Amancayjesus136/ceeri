@extends('layouts.admin')
@section('content')
  <style>
    .contenedor {
      display: grid;
      grid-template-columns: repeat(3, 200px);
      grid-template-rows: repeat(2, 200px); 
      gap: 20px;
      justify-content: center;
      align-content: center;
    }

    .cuadro {
      width: 100%;
      height: 100%;
      border: 1px solid black;
      display: flex;
      justify-content: center;
      align-items: center;
      font-size: 24px;
    }
  </style>

  <div class="contenedor">
    <a href="{{ route('lstpsicologia.formulario')}}"><div class="cuadro btn btn-primary">Psicologia</div></a>
    <a href="{{ route('lsttinfantil.formulario')}}"><div class="cuadro btn btn-secondary">Terapia Infantil</div></a>
    <a href="{{ route('lsttocupacional.formulario')}}"><div class="cuadro btn btn-success">Terapia Ocupacional</div></a>
    <a href="{{ route('lsttlenguaje.formulario')}}"><div class="cuadro btn btn-danger">Terapia Lenguaje</div></a>
    <a href="{{ route('lsttfisica.formulario')}}"><div class="cuadro btn btn-warning">Terapia Fisica</div></a>
  </div>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

@endsection