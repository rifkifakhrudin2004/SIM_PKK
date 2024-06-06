@extends('layoutsBendaharaPKK.template')

@section('content')
<div class="container">
    <h1>Add Arisan History</h1>

    <form method="POST" action="{{ route('history.store') }}">
        @csrf
        <div class="form-group">
            <label for="id_pembukuan">ID Pembukuan</label>
            <input type="number" name="id_pembukuan" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="nama_pemenang">Nama Pemenang</label>
            <input type="text" name="nama_pemenang" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="tanggal">Tanggal</label>
            <input type="date" name="tanggal" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="nominal">Nominal</label>
            <input type="number" step="0.01" name="nominal" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="nama_bendahara">Nama Bendahara (optional)</label>
            <input type="text" name="nama_bendahara" class="form-control">
        </div>
        <div class="form-group">
            <label for="total_uang">Total Uang</label>
            <input type="number" step="0.01" name="total_uang" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
