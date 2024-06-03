@extends('layoutsKetuaPKK.template')

@section('content')
<div class="container">
    <h1 class="text-center">Upload Konten</h1>

    <div class="d-flex justify-content-center">
        <div class="upload-container">
            <form action="{{ route('ketuaPKK.upload') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="custom-file">
                    <input type="file" id="file-input" class="custom-file-input" name="file" />
                    <label class="custom-file-label-large" for="file-input">
                        <div class="file-info">
                                <label for="berkas" class="form-label">Pilih Gambar</label>
                                <input type="file" class="form-control" id="berkas" name="berkas">
                        </div>
                        <div class="custom-file-large">
                            <input type="file" id="file-input" class="custom-file-input" name="file" />
                        </div>
                    </label>
                </div>
                <div class="form-group">
                    <label for="description">Deskripsi</label>
                    <textarea class="form-control" id="description" name="description" rows="3" placeholder="Masukkan deskripsi file"></textarea>
                </div>
                <div class="file-info">
                    <p class="file-extensions">Ekstensi (jpg,png)</p>
                    <p class="file-size">Ukuran (Max 10Mb)</p>
                </div>
                <button type="submit" class="btn btn-primary submit-btn">SIMPAN</button>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    const fileInput = document.getElementById('file-input');
    const fileNameElement = document.querySelector('.file-name');

    fileInput.addEventListener('change', () => {
        const fileName = fileInput.files[0] ? fileInput.files[0].name : 'No file chosen';
        fileNameElement.textContent = fileName;
    });
</script>
@endpush