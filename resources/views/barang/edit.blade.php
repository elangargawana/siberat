@extends('layouts.app')
@push('css')
@endpush
@section('content')
<div class="container d-flex flex-column gap-5 p-3">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h3 class="text-bold">Edit Barang</h3>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Daftar Barang</li>
                <li class="breadcrumb-item active">Edit Barang</li>
            </ol>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h5 class="card-title m-0">Edit Barang</h5>
                            <div class="card-tools">
                                <a href="{{ route('manage-barang.index') }}" class="btn btn-tool"><i class="fas fa-arrow-alt-circle-left"></i></a>
                            </div>
                        </div>
                        <form action="{{ route('barang.update', $barang->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama">Nama Barang</label>
                                    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ $barang->nama }}" required>
                                    @error('nama')
                                    <div class="invalid-feedback" role="alert">
                                        <span>{{ $message }}</span>
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi</label>
                                    <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" required>{{ $barang->deskripsi }}</textarea>
                                    @error('deskripsi')
                                    <div class="invalid-feedback" role="alert">
                                        <span>{{ $message }}</span>
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="harga">Harga</label>
                                    <input type="number" name="harga" class="form-control @error('harga') is-invalid @enderror" value="{{ $barang->harga }}" required>
                                    @error('harga')
                                    <div class="invalid-feedback" role="alert">
                                        <span>{{ $message }}</span>
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="stok">Stok</label>
                                    <input type="number" name="stok" class="form-control @error('stok') is-invalid @enderror" value="{{ $barang->stok }}" required>
                                    @error('stok')
                                    <div class="invalid-feedback" role="alert">
                                        <span>{{ $message }}</span>
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="foto">Foto Barang</label>
                                    <input type="file" name="foto[]" id="foto" class="form-control @error('foto.*') is-invalid @enderror" multiple>
                                    
                                    @if($barang->fotos->count() > 0)
                                        <div id="image-preview" class="mt-3">
                                            @foreach($barang->fotos as $foto)
                                                <div class="preview-container">
                                                    {{-- <img src="{{ asset('public/storage/uploads' . $foto->path) }}" alt="Foto Barang" style="height: 150px; width: auto;">
                                                    <button type="button" class="btn btn-sm btn-danger mt-2 remove-btn">Remove</button> --}}
                                                </div>
                                            @endforeach
                                        </div>
                                    @else
                                        <div id="image-preview" class="mt-3" style="display: none;"></div>
                                    @endif
                                    
                                    @error('foto.*')
                                        <div class="invalid-feedback" role="alert">
                                            <span>{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>
                                
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Update Barang</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
       $(document).ready(function() {
    $('#foto').on('change', function(e) {
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
                        $(this).parent().remove(); // Remove the preview container when remove button is clicked
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
                        'top': '12px',
                        'left': '138px',
                        'z-index': '1',
                        'cursor': 'pointer',
                        'color': 'red',
                    });

                    // Append remove button to preview container
                    previewContainer.append(removeBtn);

                    // Append preview container to image preview div
                    $('#image-preview').append(previewContainer);
                };
                reader.readAsDataURL(file);
            }
            $('#image-preview').show(); // Show the image preview
        } else {
            $('#image-preview').hide(); // Hide the image preview if no files selected
        }
    });
});
</script>
@endpush
