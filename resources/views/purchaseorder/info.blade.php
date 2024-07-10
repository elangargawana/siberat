@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Detail Purchase Order</div>

                <div class="card-body">
                    <p><strong>ID:</strong> {{ $detailPurchaseOrder->id }}</p>
                    <p><strong>ID Purchase Order:</strong> {{ $detailPurchaseOrder->purchaseOrder->id }}</p>
                    <p><strong>Nomor Purchase Order:</strong> {{ $detailPurchaseOrder->purchaseOrder->nomor }}</p>
                    <p><strong>ID Penawaran:</strong> {{ $detailPurchaseOrder->penawaran->id }}</p>
                    <p><strong>Kuantitas:</strong> {{ $detailPurchaseOrder->kuantitas }}</p>
                    <p><strong>Harga per Barang:</strong> Rp.{{ number_format($detailPurchaseOrder->harga_per_barang, 2) }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
