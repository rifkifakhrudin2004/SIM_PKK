

@extends('layoutsBendaharaPKK.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">SPK/Kriteria/Create</h3>
    </div>
    <div class="mt-6 mx-6">
		<div class="card card-primary">
			<div class="card-header">
				<h3 class="card-title">Tambah Kriteria</h3>
			</div>
			<form action="{{ route('kriteria.store') }}" method="POST">
				@csrf
				<div class="card-body">
					<div class="form-group">
						<label for="kode">Kode Kriteria</label>
						<input type="text" class="form-control @error('kode') is-invalid @enderror" id="kode" name="kode" value="{{ old('kode') }}" autofocus>
						@error('kode')
							<span class="error invalid-feedback">{{ $message }}</span>
						@enderror
					</div>
					<div class="form-group">
						<label for="name">Nama Kriteria</label>
						<input type="text" class="form-control @error('nama') is-invalid @enderror" id="name" name="nama" value="{{ old('nama') }}">
						@error('nama')
							<span class="error invalid-feedback">{{ $message }}</span>
						@enderror
					</div>
					<div class="form-group">
						<label for="type">Jenis Kriteria</label>
						<select class="form-control @error('type') is-invalid @enderror" id="type" name="type">
							<option value="1" {{ old('type') == '1' ? 'selected' : '' }}>Benefit</option>
							<option value="0" {{ old('type') == '0' ? 'selected' : '' }}>Cost</option>
						</select>
						@error('type')
							<span class="error invalid-feedback">{{ $message }}</span>
						@enderror
					</div>
				</div>
				<div class="card-footer">
					<button type="submit" class="btn btn-primary">Simpan</button>
					<span class="ml-3 text-success" id="success-message" style="display: none;">Tersimpan.</span>
				</div>
			</form>
		</div>
	</div>
	
	<script>
		document.addEventListener('DOMContentLoaded', function () {
			@if(session('status') === 'saved')
				document.getElementById('success-message').style.display = 'block';
			@endif
		});
	</script>
</div>
@endsection