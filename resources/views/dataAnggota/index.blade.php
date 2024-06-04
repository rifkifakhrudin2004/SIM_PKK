@extends('layoutsBendaharaPKK.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ $page->title }}</h3>
        <div class="card-tools">
            <a class="btn btn-sm btn-primary mt-1" href="{{ url('dataAnggota/create') }}">Tambah</a>
        </div>
    </div>
    <div class="card-body">
        @if(session('success'))
        <div class="alert alert-success"> {{ session('success') }} </div>
        @endif
        @if(session('error'))
        <div class="alert alert-danger"> {{ session('error') }} </div>
        @endif
        <table class="table table-bordered table-striped table-hover table-sm" id="table_anggota">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Anggota</th>
                    <th>Nomor Telepon</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@endsection

@push('css')
@endpush

@push('js')
<script>
    $(document).ready(function() {
        var dataAnggota = $('#table_anggota').DataTable({
            serverSide: true,
            ajax: {
                "url": "{{ url('dataAnggota/list') }}",
                "dataType": "json",
                "type": "POST",
                "data": function (d) {
                    // Filter data jika diperlukan, saat ini tidak ada filter yang digunakan
                }
            },
            columns: [
                {
                    data: "DT_RowIndex",
                    className: "text-center",
                    orderable: false,
                    searchable: false
                },
                {
                    data: "nama_anggota",
                    className: "",
                    orderable: true,
                    searchable: true
                },
                {
                    data: "notelp_anggota",
                    className: "",
                    orderable: true,
                    searchable: true
                },
                {
                    data: "alamat_anggota",
                    className: "",
                    orderable: true,
                    searchable: true
                },
                {
                    data: "aksi",
                    className: "",
                    orderable: false,
                    searchable: false
                }
            ]
        });

        // Hapus event listener untuk filter karena tidak ada filter yang digunakan
    });
</script>
@endpush
