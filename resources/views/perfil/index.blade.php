@extends('layouts.admin')

@section('content')

        @foreach ($perfiles as $perfil)
            <h5>
                {{ $perfil->name }}
            </h5>
            <p>{{ $perfil->email }}</p>
            
        @endforeach
@endsection
