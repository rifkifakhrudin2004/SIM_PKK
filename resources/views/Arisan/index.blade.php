@extends('layoutsBendaharaPKK.template')

@section('content')

<div class="card card-outline card-primary">
    <div class="container">
    <div class="card-header">
        <h3 class="card-title">Data Arisan</h3>
        <div class="card-tools">
            <a href="{{ route('arisan.create') }}" class="btn btn-primary">Tambah</a>
        </div>
    </div>
    <div class="container">
    <form method="GET" action="{{ route('arisan.index') }}">
        <div class="row">
            <div class="col-md-4">
                <select name="year" class="form-control">
                    <option value="">Select Year</option>
                    @for ($year = date('Y'); $year >= 2000; $year--)
                        <option value="{{ $year }}" {{ request('year') == $year ? 'selected' : '' }}>
                            {{ $year }}
                        </option>
                    @endfor
                </select>
            </div>
            <div class="col-md-4">
                <select name="month" class="form-control">
                    <option value="">Select Month</option>
                    @foreach (range(1, 12) as $month)
                        <option value="{{ $month }}" {{ request('month') == $month ? 'selected' : '' }}>
                            {{ date('F', mktime(0, 0, 0, $month, 10)) }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary">Filter</button>
            </div>
        </div>
    </form>
</div>
    <div class="card-body">
        @if(session('success'))
        <div class="alert alert-success"> {{ session('success') }} </div>
        @endif
        @if(session('error'))
        <div class="alert alert-danger"> {{ session('error') }} </div>
        @endif
        <table class="table table-bordered table-striped table-hover table-sm" id="table_arisan">
        <thead>
            <tr>
                <th>ID</th>
                <th>Anggota</th>
                <th>Bendahara</th>
                <th>Tanggal Arisan</th>
                <th>Setoran Arisan</th>
                <th>Catatan Arisan</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($arisans as $arisan)
                <tr>
                    <td>{{ $arisan->id_arisan }}</td>
                    <td>{{ $arisan->anggota->nama_anggota }}</td>
                    <td>{{ $arisan->bendahara->nama_bendahara_pkk }}</td>
                    <td>{{ $arisan->tgl_arisan }}</td>
                    <td>{{ $arisan->setoran_arisan }}</td>
                    <td>{{ $arisan->catatan_arisan }}</td>
                    <td>
                        <form action="{{ route('arisan.updateStatus', $arisan->id_arisan) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('PATCH')
                            <select name="status" onchange="this.form.submit()">
                                <option value="Belum Bayar" {{ $arisan->status == 'Belum Bayar' ? 'selected' : '' }}>Belum Bayar</option>
                                <option value="Bayar" {{ $arisan->status == 'Bayar' ? 'selected' : '' }}>Bayar</option>
                            </select>
                        </form>
                    </td>
                    <td>
                        <a href="{{ route('arisan.show', $arisan->id_arisan) }}" class="btn btn-info">Show</a>
                        <a href="{{ route('arisan.edit', $arisan->id_arisan) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('arisan.destroy', $arisan->id_arisan) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection