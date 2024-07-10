@extends('layouts.app')

@section('content')
<div class="container d-flex flex-column gap-5 p-3">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h3 class="text-bold">Daftar Penawaran</h3>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Daftar Penawaran</li>
            </ol>
        </div>
    </div>

    <div class="row mb-1">
        <div class=""></div>
        <div class="col-8 col-md-4 card card-outline">
            <div class="card-header">
                <h5 class="m-0 text-bold">Tambah Surat Penawaran</h5>
            </div>
            <div class="card-body" style="gap: 10px;">
                <a class="btn btn-info text-bold col-sm-12 col-md d-flex flex-column align-items-center" href="{{ route('penawaran.create') }}"><i class="fas fa-tags"></i>Surat Penawaran Baru</a>
            </div>
        </div>
    </div>

    <div class="row mb-1" style="min-height: 200px;">
        <div class="col-12 card card-outline">
            <div class="card-body" style="overflow: auto">
                <table id="penawaranTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">No Seri</th>
                            <th scope="col">Konsumen</th>
                            <th scope="col">Status</th>
                            <th scope="col">Total Harga</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($penawarans as $index => $penawaran)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $penawaran->tanggal }}</td>
                            <td>{{ $penawaran->nomor }}</td>
                            <td>{{ $penawaran->konsumen ? $penawaran->konsumen->perusahaan : 'Tidak Ada' }}</td>
                            <td>{{ $penawaran->status }}</td>
                            <td>Rp. {{ number_format($penawaran->total_harga, 2, ',', '.') }}</td>
                            <td class="NoPrint col-md-1">
                                <div class="dropdown">
                                    <button type="button" class="btn btn-sm btn-outline-info dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                        <i class="fas fa-cog"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-up">
                                        <a class="dropdown-item" href="{{ route('penawaran.edit', $penawaran->id) }}"><i class="fas fa-edit"></i>Edit</a>
                                        <a class="dropdown-item" href="{{ route('penawaran.show', $penawaran->id) }}"><i class="fas fa-info"></i> Detail</a>
                                        <form action="{{ route('penawaran.destroy', $penawaran->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="dropdown-item" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fas fa-trash"></i> Dibatalkan</button>
                                        </form>
                                        <a class="dropdown-item" href="{{ route('penawaran.konfirmasi', $penawaran->id) }}"><i class="fas fa-check"></i> Konfirmasi</a>
                                        <a class="dropdown-item" href="{{ route('penawaran.unduh', $penawaran->id) }}"><i class="fas fa-download"></i> Unduh</a>
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
        $('#penawaranTable').DataTable({});
    });
</script>
@endpush