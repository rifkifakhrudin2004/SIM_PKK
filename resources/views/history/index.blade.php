@extends('layoutsBendaharaPKK.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="container">
        <h1>Arisan History</h1>

        <form method="GET" action="{{ route('history.index') }}">
            <div class="row mb-3">
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

        <div class="table-responsive">
            <table class="table mt-4 table-striped table-hover table-sm">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Pemenang</th>
                        <th>Tanggal</th>
                        <th>Nominal</th>
                        <th>Nama Bendahara</th>
                        <th>Total Uang</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $counter = 1;
                    @endphp
                    @foreach($histories as $history)
                    <tr>
                        <td>{{ $counter++ }}</td>
                        <td>{{ $history->nama_pemenang }}</td>
                        <td>{{ $history->tanggal }}</td>
                        <td>{{ $history->nominal }}</td>
                        <td>{{ $history->bendahara ? $history->bendahara->nama_bendahara_pkk : 'N/A' }}</td>
                        <td>{{ $history->total_uang }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
