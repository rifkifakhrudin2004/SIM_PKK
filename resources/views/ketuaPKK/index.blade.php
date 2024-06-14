@extends('layoutsKetuaPKK.template')

@section('content')
<div class="container">
    <h1 class="text-center">Upload Konten</h1>

    <!-- Alert for success message -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row justify-content-center mt-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Upload Gambar</div>

                <div class="card-body">
                    <form action="{{ route('ketuaPKK.upload') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="foto_konten" class="form-label">Pilih Gambar</label>
                            <input type="file" class="form-control" id="foto_konten" name="foto_konten">
                            @error('foto_konten')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="description" name="description" rows="3" placeholder="Masukkan deskripsi file"></textarea>
                        </div>
                        <div class="mb-3">
                            <p>Ekstensi (jpg, png)</p>
                            <p>Ukuran (Max 10Mb)</p>
                        </div>
                        <button type="submit" class="btn btn-primary">SIMPAN</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    const fotoKontenInput = document.getElementById('foto_konten');
    fotoKontenInput.addEventListener('change', function() {
        const fileName = this.files[0] ? this.files[0].name : 'Pilih file';
        this.nextElementSibling.innerText = fileName;
    });
</script>
@endpush
