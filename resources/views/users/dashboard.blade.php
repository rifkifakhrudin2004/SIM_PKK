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
