@extends('layoutsBendaharaPKK.template')

@section('content')

<div class="card card-outline card-primary"></div>
<div class="container">
            <div class="card">
                <div class="card-header">
                    Tambah Arisan
                </div>
                <div class="card-body">
                    <form action="{{ route('arisan.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="id_anggota">Anggota</label>
            <select name="id_anggota" id="id_anggota" class="form-control" required>
                <option value="" disabled selected>Select Anggota</option>
                @foreach($anggota as $member)
                    <option value="{{ $member->id_anggota }}">{{ $member->nama_anggota }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="id_bendahara">Bendahara</label>
            <select name="id_bendahara" id="id_bendahara" class="form-control" required>
                <option value="" disabled selected>Select Bendahara</option>
                @foreach($bendahara as $treasurer)
                    <option value="{{ $treasurer->id_bendahara }}">{{ $treasurer->nama_bendahara_pkk }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="tgl_arisan">Tanggal Arisan</label>
            <input type="date" name="tgl_arisan" id="tgl_arisan" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="catatan_arisan">Catatan Arisan</label>
            <textarea name="catatan_arisan" id="catatan_arisan" class="form-control"></textarea>
        </div>
        
        <div class="form-group">
            <label for="setoran_arisan">Setoran Arisan</label>
            <input type="number" name="setoran_arisan" id="setoran_arisan" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection