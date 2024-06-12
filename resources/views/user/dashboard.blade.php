@extends('layoutsUser.template')

@section('content')
    <div class="card mb-4">
        <div class="card-header">
            <h3 class="card-title">Admin Dashboard</h3>
        </div>
        <div class="card-body">
            <div class="row align-items-center">
                <div class="col-md-2 text-center">
                    <div class="icon-box">
                        <img src="{{ asset('adminlte/dist/img/avatar5.png') }}" alt="User Avatar"
                            class="img-fluid rounded-circle" style="max-width: 100px;">
                    </div>
                </div>

                <div class="col-md-10">
                    <h4>NAMA : </h4>
                    <p>STATUS : </p>

                </div>
            </div>
        </div>
    
@endsection