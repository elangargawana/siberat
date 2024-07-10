@extends('layouts.app')

@section('content')
<div class="container d-flex flex-column gap-5 p-3">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h3 class="text-bold">Daftar Barang</h3>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Daftar Barang</li>
            </ol>
        </div>
    </div>

    <div class="row mb-1">
        <div class="col-8 col-md-3 card card-outline">
            <div class="card-header">
                <h5 class="m-0 text-bold">Tambah Barang</h5>
            </div>
            <div class="card-body">
                <a class="btn btn-info text-bold col-sm-12 col-md d-flex flex-column align-items-center" href="{{ route('manage-barang.create') }}"><i class="fas fa-tags"></i>Tambah Barang</a>
            </div>
        </div>
    </div>

    <!-- Tabel Daftar Barang -->
    <div class="row mb-1">
        <div class="col-12 card card-outline">
            <div class="card-body" style="overflow: auto">
                <table id="dataTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Stok</th>
                            <th scope="col">Foto</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $number = 1 @endphp
                        @foreach($barang as $item)
                        <tr>
                            <th scope="row">{{ $number++ }}</th>
                            <td>{{ $item->nama }}</td>
                            <!-- Menyesuaikan lebar kolom deskripsi -->
                            <td style="width: 30%;">{{ $item->deskripsi }}</td>
                            <td class="harga">{{ $item->harga }}</td>
                            <td>{{ $item->stok }}</td>
                            <td>
                                @foreach($item->fotos as $foto)
                                <img src="{{ asset('storage/uploads/' . $foto->path) }}" alt="Foto Barang" style="height: 150px; width: auto; margin-bottom: 10px;">
                                @endforeach
                            </td>
                            <!-- Menyesuaikan lebar kolom aksi -->
                            <td style="width: 100px;" class="NoPrint col-md-4">
                                <!-- Dropdown untuk Aksi -->
                                <div class="dropdown">
                                    <button type="button" class="btn btn-sm btn-outline-info dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                        <i class="fas fa-cog"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-up">
                                        <a class="dropdown-item" href="{{ route('manage-barang.edit', $item->id) }}">Edit</a>
                                        <form action="{{ route('manage-barang.destroy', $item->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="dropdown-item" onclick="return confirm('Apakah Anda yakin ingin menghapus barang ini?')">Hapus</button>
                                        </form>
                                        <!-- Tambahkan aksi lainnya sesuai kebutuhan -->
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
        $('#dataTable').DataTable();

        function formatCurrency(value) {
            return 'Rp.' + parseFloat(value).toLocaleString('id-ID', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            });
        }

        $('#dataTable tbody .harga').each(function() {
            const originalValue = $(this).text();
            $(this).text(formatCurrency(originalValue));
        });
    });
</script>
@endpush