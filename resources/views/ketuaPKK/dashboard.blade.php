@extends('layoutsKetuaPKK.template')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Ketua PKK/Dashboard</h3>
    </div>
    <div class="card-body">
        <div class="row align-items-center">
            <div class="col-md-3 text-center">
                <div class="icon-box">
                    <i class="fas fa-user fa-5x"></i>
                </div>
            </div>
            <div class="card-header">
                Tampilan {{ (Auth::user()->level_id == 3) ? 'ketua'}}
            </div>
            <div class="card-body">
                <h1>Login Sebagai: {{ (Auth::user()->level_id == 3) ? 'ketua'}}</h1>
                <a href="{{ route('logout') }}">Logout</a>
            </div>
        </div>
    </div>
</div>
@endsection
