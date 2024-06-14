@extends('layoutsBendaharaPKK.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="container mt-4 mb-4">
        <h1 class="text-center mb-4">Hasil Kocok Arisan</h1>

        @if($winner)
            <div class="alert alert-success text-center gradient-success-bg">
                <h2 class="alert-heading">🎉 Pemenang: {{ $winner->anggota->nama_anggota }} 🎉</h2>
                <hr>
                <p><strong>ID Pembukuan:</strong> {{ $winner->id_arisan }}</p>
                <p><strong>Nominal:</strong> {{ $totalSetoran }}</p>
                <p><strong>Tanggal:</strong> {{ now()->toDateString() }}</p>
                <p><strong>Bendahara:</strong> {{ $winner->bendahara->nama_bendahara_pkk ?? 'N/A' }}</p>
                <hr>
                <p class="mb-0">Selamat kepada {{ $winner->anggota->nama_anggota }}</p>
            </div>
        @else
            <div class="alert alert-warning text-center">
                <h2 class="alert-heading">😔 Tidak ada pemenang yang ditemukan</h2>
                <hr>
                <p class="mb-0">Silakan coba lagi nanti.</p>
            </div>
        @endif
    </div>
</div>
@endsection

<style>
    .gradient-success-bg {
        background: linear-gradient(135deg, #2ff9f9 0%, #f530e1 100%);
        color: #fff;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .alert-heading {
        font-size: 1.5em;
    }

    .alert hr {
        border-top: 1px solid rgba(255, 255, 255, 0.3);
    }
</style>
