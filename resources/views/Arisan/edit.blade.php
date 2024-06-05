@extends('layoutsBendaharaPKK.template')

@section('content')
        <div class="card card-outline card-primary"></div>
        <div class="container">
            <div class="card">
                <div class="card-header">
                    Edit Arisan
                </div>
                <div class="card-body">
                    <form action="{{ route('arisan.update', $arisan->id_arisan) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="id_anggota">Anggota</label>
            <select name="id_anggota" id="id_anggota" class="form-control" required>
                @foreach($anggota as $member)
                    <option value="{{ $member->id_anggota }}" {{ $arisan->id_anggota == $member->id_anggota ? 'selected' : '' }}>{{ $member->nama_anggota }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="id_bendahara">Bendahara</label>
            <select name="id_bendahara" id="id_bendahara" class="form-control" required>
                @foreach($bendahara as $treasurer)
                    <option value="{{ $treasurer->id_bendahara }}" {{ $arisan->id_bendahara == $treasurer->id_bendahara ? 'selected' : '' }}>{{ $treasurer->nama_bendahara_pkk }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="tgl_arisan">Tanggal Arisan</label>
            <input type="date" name="tgl_arisan" id="tgl_arisan" class="form-control" value="{{ $arisan->tgl_arisan }}" required>
        </div>

        <div class="form-group">
            <label for="catatan_arisan">Catatan Arisan</label>
            <textarea name="catatan_arisan" id="catatan_arisan" class="form-control">{{ $arisan->catatan_arisan }}</textarea>
        </div>
        
        <div class="form-group">
            <label for="setoran_arisan">Setoran Arisan</label>
            <input type="number" name="setoran_arisan" id="setoran_arisan" class="form-control" value="{{ $arisan->setoran_arisan }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection