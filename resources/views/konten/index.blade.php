@extends('layouts.app')

@section('subtitle', 'Konten')
@section('content_header_title', 'Home')
@section('content_header_subtitle', 'Konten')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            Manage Konten
            {{-- <a href="{{ route('user.create') }}" class="btn btn-primary float-right">+ Add User</a> --}}
        </div>
        <div class="card-body">
            {{ $dataTable->table() }}
        </div>
    </div>
</div>
@endsection
@push('scripts')
{{ $dataTable->scripts()}}
@endpush