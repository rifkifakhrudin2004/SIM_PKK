@extends('layoutsBendaharaPKK.template')

@section('content')

<div class="card card-outline card-primary"></div>
<div class="container">
            <div class="card">
                <div class="card-header">
                    Edit Pembukuan Arisan
                </div>
                <div class="card-body">
                    <form action="{{ route('pembukuan.update', $pembukuan->id_pembukuan) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="id_arisan">ID Arisan</label>
            <input type="number" name="id_arisan" class="form-control" value="{{ $pembukuan->id_arisan }}" required>
        </div>
        <div class="form-group">
            <label for="tanggal">Tanggal</label>
            <input type="date" name="tanggal" class="form-control" value="{{ $pembukuan->tanggal }}" required>
        </div>
        <div class="form-group">
            <label for="pemasukan">Pemasukan</label>
            <input type="number" name="pemasukan" class="form-control" value="{{ $pembukuan->pemasukan }}" required>
        </div>
        <div class="form-group">
            <label for="pengeluaran">Pengeluaran</label>
            <input type="number" name="pengeluaran" class="form-control" value="{{ $pembukuan->pengeluaran }}" required>
        </div>
        <div class="form-group">
            <label for="saldo">Saldo</label>
            <input type="number" name="saldo" class="form-control" value="{{ $pembukuan->saldo }}" required>
        </div>
        <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <textarea name="keterangan" class="form-control">{{ $pembukuan->keterangan }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
