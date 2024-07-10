@extends('layouts.app')

@section('content')
<div class="container d-flex flex-column gap-5 p-3">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h3 class="text-bold">Edit Konsumen</h3>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Daftar Konsumen</li>
                <li class="breadcrumb-item active">Edit Konsumen</li>
            </ol>
        </div>
    </div>

    <div class="row mb-1">
        <div class="col-12 card card-outline">
            <div class="card-body">
                <form action="{{ route('konsumen.update', $konsumen->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="nama">Perusahaan</label>
                        <input type="text" name="perusahaan" class="form-control" value="{{ $konsumen->perusahaan }}" required>
                    </div>

                    <div class="form-group">
                        <label for="nama">PIC</label>
                        <input type="text" name="pic" class="form-control" value="{{ $konsumen->pic }}" required>
                    </div>

                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" name="alamat" class="form-control" value="{{ $konsumen->alamat }}" required>
                    </div>

                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-control" required>
                            <option value="Laki-laki" {{ $konsumen->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="Perempuan" {{ $konsumen->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="pekerjaan">Jabatan</label>
                        <input type="text" name="jabatan" class="form-control" value="{{ $konsumen->jabatan }}" required>
                    </div>

                    <div class="form-group">
                        <label for="no_telp">No Telp</label>
                        <input type="text" name="no_telp" class="form-control" value="{{ $konsumen->no_telp }}" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Update Konsumen</button>
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
        dateFormat: "Y-m-d",
        defaultDate: "{{ $konsumen->tanggal_lahir }}" // Menambahkan value untuk tanggal lahir
    });
</script>
@endpush