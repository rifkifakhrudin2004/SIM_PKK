<!-- View -->
@extends('layoutsBendaharaPKK.template')

@section('content')
        <div class="card card-outline card-primary"></div>
        <div class="container">
                    <div class="card">
                        <div class="card-header">
                            Tambah Pembukuan Arisan
                        </div>
                        <div class="card-body">
                            @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('pembukuan.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="id_arisan">ID Arisan</label>
            <input type="text" name="id_arisan" id="id_arisan" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="tanggal">Tanggal</label>
            <input type="date" name="tanggal" id="tanggal" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="pemasukan">Pemasukan</label>
            <input type="number" name="pemasukan" id="pemasukan" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="pengeluaran">Pengeluaran</label>
            <input type="number" name="pengeluaran" id="pengeluaran" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="saldo">Saldo</label>
            <input type="number" name="saldo" id="saldo" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <textarea name="keterangan" id="keterangan" class="form-control"></textarea>
        </div>
        
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection
