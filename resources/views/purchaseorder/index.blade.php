@extends('layouts.app')

@section('content')
<div class="container d-flex flex-column gap-5 p-3">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h3 class="text-bold">Tahap Purchase Order</h3>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Tahap Purchase Order</li>
            </ol>
        </div>
    </div>

    <div class="row mb-1" style="min-height: 200px;">
        <div class="col-12 card card-outline">
            <div class="card-body" style="overflow: auto">
                <table id="purchaseOrderTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nomor Purchase Order</th>
                            <th scope="col">Nomor Penawaran</th>
                            <th scope="col">Tanggal Purchase Order</th>
                            <th scope="col">Total Harga</th>
                            <th scope="col">Jenis Purchase Order</th>
                            <th scope="col">Status Purchase Order</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($purchaseOrders as $index => $purchaseOrder)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $purchaseOrder->nomor }}</td>
                            <td>{{ $purchaseOrder->penawaran ? $purchaseOrder->penawaran->nomor : 'Tidak Ada' }}</td>
                            <td>{{ $purchaseOrder->tanggal }}</td>
                            <td>Rp.{{ number_format($purchaseOrder->total_harga, 0, ',', '.') }}</td>
                            <td>{{ $purchaseOrder->jenis }}</td>
                            <td id="status-{{ $purchaseOrder->id }}">{{ $purchaseOrder->status }}</td>
                            <td class="NoPrint col-md-1">
                                <div class="dropdown">
                                    <button type="button" class="btn btn-sm btn-outline-info dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                        <i class="fas fa-cog"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-up">
                                        <a class="dropdown-item" href="{{ route('purchaseorder.edit', $purchaseOrder->id) }}"><i class="fas fa-edit"></i> Edit</a>
                                        <form action="{{ route('purchaseorder.destroy', $purchaseOrder->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="dropdown-item" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fas fa-trash"></i> Hapus</button>
                                        </form>
                                        <a class="dropdown-item" href="{{ route('purchaseorder.show', $purchaseOrder->id) }}"><i class="fas fa-info"></i> Detail</a>
                                        <a class="dropdown-item" href="{{ route('purchaseorder.createSuratJalan', $purchaseOrder->id) }}"><i class="fas fa-check"></i> Buat Surat Jalan</a>
                                        <a class="dropdown-item" href="{{ route('purchaseorder.unduh', $purchaseOrder->id) }}"><i class="fas fa-download"></i> Unduh</a>
                                        
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
        $('#purchaseOrderTable').DataTable();
    });
</script>
@endpush
