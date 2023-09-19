@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Dashboard</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                    <li class="breadcrumb-item active">Basic Tables</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

<!-- COLUMNAS -->
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <p class="text-muted mb-4">
                    {{ __("You're logged in!") }}
                </p>
            </div><!-- end card-body -->
        </div><!-- end card -->
    </div><!-- end col -->
</div><!-- end row -->

@endsection