@extends('layouts.app')

@section('content')
<style>
    .card-tools .btn-tool:hover {
        color: white;
    }
</style>
<div class="container d-flex flex-column gap-5 p-3">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h3 class="text-bold">Detail Purchase Order</h3>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Daftar Purchase Order</li>
                <li class="breadcrumb-item active">Detail Purchase Order</li>
            </ol>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header bg-info text-white">
                    <h5 class="card-title mb-0">Informasi Konsumen</h5>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <p><strong>PIC :</strong> {{ $purchaseOrder->penawaran->konsumen->pic }}</p>
                    <p><strong>Perusahaan :</strong> {{ $purchaseOrder->penawaran->konsumen->perusahaan }}</p>
                    <p><strong>Alamat :</strong> {{ $purchaseOrder->penawaran->konsumen->alamat }}</p>
                    <p><strong>Nomor Purchase Order :</strong> {{ $purchaseOrder->nomor }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header bg-info text-white">
                    <h5 class="card-title mb-0">Detail Barang</h5>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0">
                            <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>Tanggal</th>
                                    <th>Nama Barang</th>
                                    <th>Kuantitas</th>
                                    <th>Harga per Barang</th>
                                    <th>Total Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($purchaseOrder->detailPurchaseOrder as $index => $detail)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $purchaseOrder->penawaran->tanggal }}</td>
                                    <td>{{ $detail->barang->nama }}</td>
                                    <td>{{ $detail->kuantitas }}</td>
                                    <td>Rp. {{ number_format($detail->harga_per_barang, 2, ',', '.') }}</td>
                                    <td>Rp. {{ number_format($detail->kuantitas * $detail->harga_per_barang, 2, ',', '.') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="5" class="text-right"><strong>Total Keseluruhan</strong></td>
                                    <td><strong>Rp. {{ number_format($purchaseOrder->total_harga, 2, ',', '.') }}</strong></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
