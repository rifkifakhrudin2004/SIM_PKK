<!-- resources/views/subkriteria/edit.blade.php -->

@extends('layoutsBendaharaPKK.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">Edit SubKriteria</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('subkriteria.update', $subkriteria->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Nama SubKriteria:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $subkriteria->name }}" required>
            </div>
            <div class="form-group">
                <label for="bobot">Bobot SubKriteria:</label>
                <input type="number" class="form-control" id="bobot" name="bobot" value="{{ $subkriteria->bobot }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection
