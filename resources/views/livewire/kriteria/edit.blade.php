

@extends('layoutsBendaharaPKK.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">SPK/Kriteria/Edit</h3>
    </div>
    <div class="mt-6 mx-6">
		<div class="card card-primary">
			<div class="card-header">
				<h3 class="card-title">Ubah Kriteria</h3>
			</div>
			<form action="{{ route('kriteria.update', $kriteria->id) }}" method="POST">
				@csrf
				@method('PUT')
				<div class="card-body">
					<div class="form-group">
						<label for="kode">Kode Kriteria</label>
						<input type="text" class="form-control @error('kriteria.kode') is-invalid @enderror" id="kode" name="kode" value="{{ old('kode', $kriteria->kode) }}" autofocus>
						@error('kriteria.kode')
							<span class="error invalid-feedback">{{ $message }}</span>
						@enderror
					</div>
					<div class="form-group">
						<label for="name">Nama Kriteria</label>
						<input type="text" class="form-control @error('kriteria.name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $kriteria->name) }}">
						@error('kriteria.name')
							<span class="error invalid-feedback">{{ $message }}</span>
						@enderror
					</div>
					<div class="form-group">
						<label for="type">Jenis Kriteria</label>
						<select class="form-control @error('kriteria.type') is-invalid @enderror" id="type" name="type">
							<option value="1" {{ old('type', $kriteria->type) == 1 ? 'selected' : '' }}>Benefit</option>
							<option value="0" {{ old('type', $kriteria->type) == 0 ? 'selected' : '' }}>Cost</option>
						</select>
						@error('kriteria.type')
							<span class="error invalid-feedback">{{ $message }}</span>
						@enderror
					</div>
				</div>
				<div class="card-footer">
					<button type="submit" class="btn btn-primary">Simpan</button>
					@if (session('status') === 'saved')
						<span class="ml-3 text-success">Tersimpan.</span>
					@endif
				</div>
			</form>
		</div>
	</div>
</div>
@endsection