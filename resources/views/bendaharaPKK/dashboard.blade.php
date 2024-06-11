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
                    <img src="{{ asset('adminlte/dist/img/avatar5.png') }}" alt="User Avatar"
                    class="img-fluid rounded-circle" style="max-width: 100px;">
                </div>
            </div>
            <div class="col-md-9">
                <h4>NAMA : {{ Auth::user()->nama }}</h4>
                <p>STATUS : {{ Auth::user()->status }}</p>
            </div>
        </div>
    </div>
</div>



{{-- CHART --}}

</section>

@endsection

