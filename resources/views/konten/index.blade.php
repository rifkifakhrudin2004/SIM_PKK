@extends('layouts.app')

@section('subtitle', 'Kategori')
@section('content_header_title', 'Home')
@section('content_header_subtitle', 'User')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            Manage Konten
        </div>
        <div class="card-body">
            {!! $dataTable->table(['class' => 'table table-bordered table-striped']) !!}
        </div>
    </div>
</div>
@endsection

@push('scripts')
{!! $dataTable->scripts() !!}
@endpush
