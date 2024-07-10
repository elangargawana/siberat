@extends('layouts.app')

@section('content')
<div class="container d-flex flex-column gap-5 p-3">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h3 class="text-bold">Tambah Konsumen</h3>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Daftar Konsumen</li>
                <li class="breadcrumb-item active">Tambah Konsumen</li>
            </ol>
        </div>
    </div>

    <div class="row mb-1">
        <div class="col-12 card card-outline">
            <div class="card-body">
                <form action="{{ route('konsumen.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Perusahaan</label>
                        <input type="text" name="perusahaan" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="nama">PIC</label>
                        <input type="text" name="pic" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" name="alamat" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-control" required>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="pekerjaan">Jabatan</label>
                        <input type="text" name="jabatan" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="no_telp">No Telp</label>
                        <input type="text" name="no_telp" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Tambah Konsumen</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endpush

@push('js')
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script type="text/javascript">
    flatpickr('#tanggal_lahir', {
        enableTime: false,
        dateFormat: "Y-m-d"
    });
</script>
@endpush