<!-- resources/views/purchaseorder/detail.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            Detail Purchase Order
        </div>
        <div class="card-body">
            <p><strong>Nomor Purchase Order:</strong> {{ $purchaseOrder->nomor }}</p>
            <p><strong>Tanggal Purchase Order:</strong> {{ $purchaseOrder->tanggal }}</p>
            <p><strong>Jenis Purchase Order:</strong> {{ $purchaseOrder->jenis }}</p>
            <p><strong>Status:</strong> {{ $purchaseOrder->status }}</p>

            <hr>

            <h5>Detail Barang</h5>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Barang</th>
                        <th>Kuantitas</th>
                        <th>Harga per Barang</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($purchaseOrder->penawaran->detailPenawaran as $index => $detail)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $detail->barang->nama }}</td>
                        <td>{{ $detail->kuantitas }}</td>
                        <td>Rp. {{ number_format($detail->harga_per_barang, 0, ',', '.') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <hr>

            <p><strong>Total Harga:</strong> Rp. {{ number_format($purchaseOrder->total_harga, 0, ',', '.') }}</p>

            <a href="{{ route('purchaseorder.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection
