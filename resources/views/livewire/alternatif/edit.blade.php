@extends('layoutsBendaharaPKK.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">LP</h3>
    </div>
    <div class="mt-6 mx-6">
		<div class="card card-primary">
			<div class="card-header">
				<h3 class="card-title">Ubah Alternatif</h3>
			</div>
			<form action="{{ route('alternatif.update', $alternatif->id) }}" method="POST">
				@csrf
				@method('PUT')
				<div class="card-body">
					<div class="form-group">
						<label for="kode">Kode Anggota</label>
						<input type="text" class="form-control @error('alternatif.kode') is-invalid @enderror" id="kode" name="kode" value="{{ old('kode', $alternatif->kode) }}" autofocus>
						@error('alternatif.kode')
							<span class="error invalid-feedback">{{ $message }}</span>
						@enderror
					</div>
					<div class="form-group">
						<label for="name">Nama Anggota</label>
						<input type="text" class="form-control @error('alternatif.name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $alternatif->name) }}">
						@error('alternatif.name')
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