@extends('layouts.app')

@section('content')
<div class="container d-flex flex-column gap-5 p-3">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h3 class="text-bold">Tambah Barang</h3>
        </div>
        <div class="col-sm-6">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Daftar Barang</li>
                    <li class="breadcrumb-item active">Tambah Barang</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form id="barangForm" action="{{ route('manage-barang.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="nama">Nama Barang</label>
                            <input type="text" name="nama" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea name="deskripsi" class="form-control" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <input type="text" name="harga" id="harga" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="stok">Stok</label>
                            <input type="number" name="stok" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="foto">Foto Barang</label>
                            <small class="form-text text-muted">Dapat memilih lebih dari 1 barang</small>
                            <div class="custom-file">
                                <input type="file" name="foto[]" id="image-uploader" class="custom-file-input" multiple>
                                <label class="custom-file-label" for="image-uploader">Pilih file...</label>
                            </div>
                            <div id="image-preview" class="mt-3"></div>
                        </div>

                        <button type="submit" class="btn btn-primary mt-3">Tambah Barang</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#image-uploader').on('change', function() {
            $('#image-preview').html('');
            const files = this.files;
            if (files.length > 0) {
                for (let i = 0; i < files.length; i++) {
                    const file = files[i];
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        // Create image element
                        const img = $('<img>').attr('src', e.target.result).css({
                            'width': '150px',
                            'height': 'auto',
                            'margin': '10px',
                        });

                        // Create remove button
                        const removeBtn = $('<div>').addClass('cancel-btn').html('<i class="fa fa-times-circle"></i>').click(function() {
                            $(this).parent().remove();
                        });

                        // Create preview container
                        const previewContainer = $('<div>').addClass('preview-container').css({
                            'display': 'grid',
                            'grid-template-columns': 'repeat(auto-fit, minmax(150px, 1fr))',
                            'gap': '10px',
                            'position': 'relative',
                        }).append(img);

                        // Style remove button
                        removeBtn.css({
                            'position': 'absolute',
                            'top': '10px',
                            'left': '140px',
                            'z-index': '1',
                            'cursor': 'pointer',
                        });

                        // Append remove button to preview container
                        previewContainer.append(removeBtn);

                        // Append preview container to image preview div
                        $('#image-preview').append(previewContainer);
                    };
                    reader.readAsDataURL(file);
                }
            }
        });
    });
</script>

<script>
    function formatCurrency(value) {
        return 'Rp.' + parseFloat(value.replace(/[^0-9]/g, '')).toLocaleString('id-ID');
    }

    document.addEventListener('DOMContentLoaded', function() {
        const hargaInput = document.getElementById('harga');

        hargaInput.addEventListener('input', function(e) {
            let value = e.target.value.replace(/[^0-9]/g, '');
            if (value) {
                e.target.value = formatCurrency(value);
            } else {
                e.target.value = '';
            }
        });

        document.getElementById('barangForm').addEventListener('submit', function() {
            hargaInput.value = hargaInput.value.replace(/[^0-9]/g, '');
        });
    });
</script>
@endpush
