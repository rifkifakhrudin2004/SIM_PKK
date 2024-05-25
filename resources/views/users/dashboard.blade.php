@extends('layoutsUser.template')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Admin Dashboard</h3>
        </div>
        <div class="card-body">
            Selamat datang di area Admin.
        </div>
    </div>
    <div class="col-md-9">
        <div class="card-header">
            Tampilan {{ (Auth::user()->level_id == 4) ? 'admin' : '' }}
        </div>
        <div class="card-body">
            <h1 style="font-size: 1.5rem; margin-left: 10px;">Login Sebagai:</h1>
            <h2 style="font-size: 1.25rem; margin-left: 20px;">
                @if(Auth::user()->level_id == 1)
                    Anggota: {{ Auth::user()->nama }}
                @elseif(Auth::user()->level_id == 2)
                    Bendahara: {{ Auth::user()->nama }}
                @elseif(Auth::user()->level_id == 3)
                    Ketua: {{ Auth::user()->nama }}
                @elseif(Auth::user()->level_id == 4)
                    Admin: {{ Auth::user()->nama }}    
                @else
                    Anda tidak terdaftar
                @endif
            </h2>
            <a href="{{ route('logout') }}" class="btn btn-primary" style="margin-top: 20px;">Logout</a>
        </div>
    </div>
    {{-- ISI DASHBOARD --}}
    <!-- Main content -->
    <section class="content">

        <div class="container-fluid">
            <!-- Title for the section -->
            <h4>Data User</h4>
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>150</h3>
                            <p>Kelola Pengguna</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>53<sup style="font-size: 20px">%</sup></h3>
                            <p>Validasi Konten</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
        </div>
    </section>
    



   
@endsection
