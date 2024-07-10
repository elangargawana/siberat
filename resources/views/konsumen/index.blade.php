@extends('layouts.app')

@section('content')
<div class="container d-flex flex-column gap-5 p-3">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h3 class="text-bold">Daftar Konsumen</h3>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Daftar Konsumen</li>
            </ol>
        </div>
    </div>

    <div class="row mb-1">
        <div class="col-8 col-md-3 card card-outline">
            <div class="card-header">
                <h5 class="m-0 text-bold">Tambah Konsumen</h5>
            </div>
            <div class="card-body">
                <a class="btn btn-info text-bold col-sm-12 col-md d-flex flex-column align-items-center" href="{{ route('konsumen.create') }}"><i class="fas fa-user-plus"></i>Tambah Konsumen</a>
            </div>
        </div>
    </div>

    <!-- Tabel Daftar Konsumen -->
    <div class="row mb-1">
        <div class="col-12 card card-outline">
            <div class="card-body" style="overflow: auto">
                <table id="konsumenTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Perusahaan</th>
                            <th scope="col">PIC</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">Jabatan</th>
                            <th scope="col">No Telp</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($konsumen as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item->perusahaan }}</td>
                            <td>{{ $item->pic }}</td>
                            <td>{{ $item->alamat }}</td>
                            <td>{{ $item->jenis_kelamin }}</td>
                            <td>{{ $item->jabatan }}</td>
                            <td>{{ $item->no_telp }}</td>
                            <td style="width: 100px;" class="NoPrint col-md-4">
                                <div class="dropdown">
                                    <button type="button" class="btn btn-sm btn-outline-info dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                        <i class="fas fa-cog"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-up">
                                        <a class="dropdown-item" href="{{ route('konsumen.edit', $item->id) }}">Edit</a>
                                        <form action="{{ route('konsumen.destroy', $item->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="dropdown-item" onclick="return confirm('Apakah Anda yakin ingin menghapus konsumen ini?')">Hapus</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#konsumenTable').DataTable();
    });
</script>
@endpush