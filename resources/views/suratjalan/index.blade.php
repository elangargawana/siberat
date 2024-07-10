@extends('layouts.app')

@section('content')
<div class="container d-flex flex-column gap-5 p-3">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h3 class="text-bold">Tahap Surat Jalan</h3>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Tahap Surat Jalan</li>
            </ol>
        </div>
    </div>
    <div class="row mb-1" style="min-height: 200px;">
        <div class="col-12 card card-outline">
            <div class="card-body" style="overflow: auto">
                <table id="suratJalanTable" class="table table-bordered table-striped" style="background-color: #fff;">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col" style="width: 50px;">Nomor Surat Jalan</th>
                            <th scope="col" style="width: 100px;">Tanggal</th>
                            <th scope="col">Alamat Tujuan</th>
                            <th scope="col">Nomor Purchase Order</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($suratJalans as $index => $suratJalan)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $suratJalan->nomor }}</td>
                            <td>{{ $suratJalan->tanggal }}</td>
                            <td>{{ $suratJalan->alamat_tujuan }}</td>
                            <td>{{ $suratJalan->nomor_po }}</td>
                            <td>
                                <div class="dropdown">
                                     <button type="button" class="btn btn-sm btn-outline-info dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                        <i class="fas fa-cog"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="{{ route('purchaseorder.huft', $suratJalan->id_purchase_order) }}"><i class="fas fa-eye"></i> Lihat Detail</a>
                                        <a class="dropdown-item" href="{{ route('suratjalan.edit', $suratJalan->id) }}"><i class="fas fa-edit"></i> Edit</a>
                                        <form action="{{ route('suratjalan.destroy', $suratJalan->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="dropdown-item" onclick="return confirm('Are you sure you want to delete this item?')"><i class="fas fa-trash"></i> Delete</button>
                                        </form>
                                        <a class="dropdown-item" href="{{ route('suratjalan.unduh', $suratJalan->id) }}"><i class="fas fa-download"></i> Unduh</a>
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
        $('#suratJalanTable').DataTable();
    });
</script>
@endpush
