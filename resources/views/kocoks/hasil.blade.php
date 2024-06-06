@extends('layoutsBendaharaPKK.template')

@section('content')
<div class="card card-outline card-primary">
    
<div class="container">
    <h1>Hasil Kocok Arisan</h1>

    @if($winner)
        <div class="alert alert-success">
            <h2>Pemenang: {{ $winner->anggota->nama_anggota }}</h2>
            <p>ID Pembukuan: {{ $winner->id_arisan }}</p>
            <p>Nominal: {{ $totalSetoran }}</p>
            <p>Tanggal: {{ now()->toDateString() }}</p>
            <p>Bendahara: {{ $winner->bendahara->nama_bendahara_pkk ?? 'N/A' }}</p>
        </div>
    @else
        <div class="alert alert-warning">
            <p>Tidak ada pemenang yang ditemukan.</p>
        </div>
    @endif
</div>
@endsection
