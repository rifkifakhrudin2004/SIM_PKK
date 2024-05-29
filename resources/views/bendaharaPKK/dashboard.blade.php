@extends('layoutsBendaharaPKK.template')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Bendahara Dashboard</h3>
    </div>
    <div class="card-body">
        <div class="row align-items-center">
            <div class="col-md-3 text-center">
                <div class="icon-box">
                    <i class="fas fa-user fa-5x"></i>
                </div>
            </div>
            <div class="col-md-9">
                <h4>NAMA : {{ Auth::user()->nama }}</h4>
                <p>STATUS : {{ Auth::user()->status }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
