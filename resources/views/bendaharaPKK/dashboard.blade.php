@extends('layoutsBendaharaPKK.template')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Bendahara Dashboard</h3>
    </div>
    <div class="card-body">
        <div class="row align-items-center">
            <div class="col-md-2 text-center">
                <div class="icon-box">
                    <img src="{{ asset('adminlte/dist/img/avatar2.png') }}" alt="User Avatar"
                    class="img-fluid rounded-circle" style="max-width: 100px;">
                </div>
            </div>
            <div class="col-md-10">
                <h4>NAMA : {{ Auth::user()->nama }}</h4>
                <p>STATUS : {{ Auth::user()->status }}</p>
            </div>
        </div>
    </div>
</div>

{{-- CHART --}}
<section class="content">
    <div class="container-fluid">
        <!-- GOOGLE LOOKER STUDIO REPORT -->
        <div class="row">
            <div class="col-md-6">
                <div class="card card-orange">
                    <div class="card-header">

                        <h3 class="card-title">Visualisasi Sisa Pinjaman Anggota</h3>
                    </div>
                    <div class="card-body">
                        <iframe width="100%" height="400"
                            src="https://lookerstudio.google.com/embed/reporting/20953f78-d485-4f2c-a8f5-7466ee1d2b04/page/mMc2D"

                        <h3 class="card-title">VISUALISI</h3>
                    </div>
                    <div class="card-body">
                        <iframe width="100%" height="400"
                            src="https://lookerstudio.google.com/embed/reporting/36c2c5de-a043-41c8-846e-620fca8d7757/page/EOc0D"

                            frameborder="0" style="border:0" allowfullscreen>
                        </iframe>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card card-olive">
                    <div class="card-header">

                        <h3 class="card-title">Visualisasi Perangkingan SPK</h3>
                    </div>
                    <div class="card-body">
                        <iframe width="100%" height="400"
                            src="https://lookerstudio.google.com/embed/reporting/57aadf39-3cec-4aac-9f82-1be4cb1a6066/page/vGc2D"

                        <h3 class="card-title">Google Looker Studio Report</h3>
                    </div>
                    <div class="card-body">
                        <iframe width="100%" height="400"
                            src="https://lookerstudio.google.com/embed/reporting/36c2c5de-a043-41c8-846e-620fca8d7757/page/EOc0D"

                            frameborder="0" style="border:0" allowfullscreen>
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

