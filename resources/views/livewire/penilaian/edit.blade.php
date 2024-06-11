@extends('layoutsBendaharaPKK.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">SPK/Penilaian/Edit</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('penilaian.update', $alternatif->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="card">
                <div class="card-header">
                    <p class="card-title-cust">Kode : {{ $alternatif->kode }}</p>
                </div>
                <div class="card-body">
                    <p class="p-cust">Nama Anggota : {{ $alternatif->name }}</p>
                    @foreach ($kriterias as $krit)
                        <div class="form-group">
                            <label for="{{ $krit->kode }}">{{ $krit->kode }} - {{ $krit->name }}</label>
                            <select name="nilai[{{ $krit->id }}]" class="form-control" id="{{ $krit->kode }}">
                                <option value="0" disabled selected>Pilih salah satu</option>
                                @foreach ($krit->subkriteria as $sub)
                                    <option value="{{ $sub->bobot }}" @if($nilai[$krit->id] == $sub->bobot) selected @endif>{{ $sub->name }}</option>
                                @endforeach
                            </select>
                            @error('nilai.' . $krit->id)
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    @endforeach
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    @if (session('status') === 'saved')
                        <span class="ml-3 text-success">Tersimpan.</span>
                    @endif
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

<style>
    .p-cust {
        display: inline-block; /* Membuat elemen p menyesuaikan ukuran dengan teks di dalamnya */
        border-radius: 5px; /* Memperbulat sudut border */
        padding: 10px; /* Memberi jarak antara teks dan border */
        font-weight: bold; /* Memperkuat teks */
        background-color: rgb(0, 122, 96); 
        color: white;/* Mengisi border dengan warna abu-abu muda */
    }
    .card-title-cust {
        display: inline-block; /* Membuat elemen p menyesuaikan ukuran dengan teks di dalamnya */
        border-radius: 5px; /* Memperbulat sudut border */
        padding: 10px; /* Memberi jarak antara teks dan border */
        font-weight: bold; /* Memperkuat teks */
        background-color: rgb(0, 95, 75); 
        color: white;/* Mengisi border dengan warna abu-abu muda */
    }
</style>