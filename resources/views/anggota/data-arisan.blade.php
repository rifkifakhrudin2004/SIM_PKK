@extends('layoutsAnggota.template')

@section('content')
<div class="card card-outline card-primary"></div>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Data Arisan</h3>
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
            <table class="table table-bordered table-striped table-hover table-sm">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Anggota</th>
                        <th>Bendahara</th>
                        <th>Tanggal</th>
                        <th>Catatan</th>
                        <th>Setoran</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($arisans as $arisan)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $arisan->anggota->nama_anggota }}</td>
                        <td>{{ $arisan->bendahara->nama_bendahara_pkk }}</td>
                        <td>{{ $arisan->tgl_arisan }}</td>
                        <td>{{ $arisan->catatan_arisan }}</td>
                        <td>{{ $arisan->setoran_arisan }}</td>
                        <td>
                            @if($arisan->status == 'Belum Bayar')
                                <button class="btn btn-light">Belum Bayar</button>
                            @else
                                <button class="btn btn-light">Bayar</button>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
