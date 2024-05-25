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

    {{-- ISI DASHBOARD --}}
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Judul untuk bagian ini -->
            <h4>Data Pengguna</h4>
            <!-- Kotak-kotak kecil (Stat box) -->
            <div class="row">
                <div class="col-lg-6 col-12">
                    <!-- kotak kecil -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>150</h3>
                            <p>Kelola Pengguna</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="{{ url('/users') }}" class="small-box-footer">More Info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-6 col-12">
                    <!-- kotak kecil -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>53<sup style="font-size: 20px">%</sup></h3>
                            <p>Validasi Konten</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="{{ url('/user/konten') }}" class="small-box-footer">More Info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
        </div>
    </section>
    



   
@endsection
