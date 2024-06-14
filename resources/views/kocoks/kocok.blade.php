@extends('layoutsBendaharaPKK.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="container text-center mt-4 mb-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="jumbotron gradient-bg py-5">
                    <h1 class="display-8">Klik tombol di bawah untuk mendapatkan hasil</h1>
                    <a href="{{ route('hasil') }}" class="btn btn-primary btn-lg mt-3">Start</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<style>
    .gradient-bg {
        background: linear-gradient(135deg, #1411cb 0%, #f13be5 100%);
        color: #fff;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        font-family: 'Poppins', sans-serif;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #004085;
    }
</style>
