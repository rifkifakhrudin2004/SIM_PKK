@extends('layoutsAnggota.template')

@section('content')
<div class="container">
    <h2>Create Arisan</h2>
    <form action="{{ route('arisan.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="id_anggota">Anggota</label>
            <select name="id_anggota" id="id_anggota" class="form-control" required>
                @foreach($anggota as $member)
                    <option value="{{ $member->id }}">{{ $member->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="id_bendahara">Bendahara</label>
            <select name="id_bendahara" id="id_bendahara" class="form-control" required>
                @foreach($anggota as $member)
                    <option value="{{ $member->id }}">{{ $member->name }}</option>
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