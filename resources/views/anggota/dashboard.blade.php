@extends('layoutsAnggota.template')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Dashboard Anggota</h3>
    </div>
    <div class="card-body">
        <div class="row align-items-center">
            <div class="col-md-3 text-center">
                <div class="icon-box">
                    <i class="fas fa-user fa-5x"></i>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card-header">
                    Tampilan {{ (Auth::user()->level_id == 1) ? 'anggota' : '' }}
                </div>
                <div class="card-body">
                    <h1 style="font-size: 1.5rem; margin-left: 10px;">Login Sebagai:</h1>
                    <h2 style="font-size: 1.25rem; margin-left: 20px;">
                        @if(Auth::user()->level_id == 1)
                            anggota
                        @elseif(Auth::user()->level_id == 2)
                            bendahara
                        @elseif(Auth::user()->level_id == 3)
                            ketua
                        @else
                            anda tidak terdaftar
                        @endif
                    </h2>
                    <a href="{{ route('logout') }}" class="btn btn-primary" style="margin-top: 20px;">Logout</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
