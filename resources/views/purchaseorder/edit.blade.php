@extends('layouts.app')

@section('content')
<div class="container d-flex flex-column gap-5 p-3">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h3 class="text-bold">Edit Purchase Order</h3>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Tahap Purchase Order</li>
                <li class="breadcrumb-item active">Edit Purchase Order</li>
            </ol>
        </div>
    </div>
    <div class="row mb-1" style="min-height: 200px;">
        <div class="col-12 card card-outline">
            <div class="card-body" style="overflow: auto">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form action="{{ route('purchaseorder.update', $purchaseOrder->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="nomor" class="form-label">Nomor Purchase Order</label>
                        <input type="text" class="form-control" id="nomor" name="nomor" value="{{ old('nomor', $purchaseOrder->nomor) }}">
                    </div>

                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal Purchase Order</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ old('tanggal', $purchaseOrder->tanggal) }}">
                    </div>

                    <div class="mb-3">
                        <label for="jenis" class="form-label">Jenis Purchase Order</label>
                        <select class="form-control" id="jenis" name="jenis_purchase_order">
                            <option value="" disabled selected>Select Jenis Purchase Order</option>
                            <option value="QRIS" {{ old('jenis', $purchaseOrder->jenis) == 'QRIS' ? 'selected' : '' }}>QRIS</option>
                            <option value="Bank Transfer" {{ old('jenis', $purchaseOrder->jenis) == 'Bank Transfer' ? 'selected' : '' }}>Bank Transfer</option>
                        </select>
                    </div>

                    <div class="card-body p-0 mb-3">
                        <label>Barang</label>
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0">
                                <thead class="thead-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Barang</th>
                                        <th>Kuantitas</th>
                                        <th>Harga per Barang</th>
                                    </tr>
                                </thead>
                                <tbody id="dynamicTable">
                                    @foreach($purchaseOrder->penawaran->detailPenawaran as $index => $detail)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>
                                            <select name="barang_id[]" class="form-control barang-select" required>
                                                @foreach($barang as $b)
                                                <option value="{{ $b->id }}" {{ $b->id == $detail->id_barang ? 'selected' : '' }}>{{ $b->nama }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <input type="number" name="quantity[]" class="form-control quantity-input" value="{{ $detail->kuantitas }}" required>
                                        </td>
                                        <td>
                                            <input type="text" name="harga[]" class="form-control harga-per-barang" value="{{ number_format($detail->harga_per_barang, 0, ',', '.') }}" >
                                        </td>
                                        <input type="hidden" name="detail_id[]" value="{{ $detail->id }}">
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="total_harga">Total Harga</label>
                        <input id="total_harga" type="text" class="form-control" name="total_harga" value="{{ 'Rp. '.number_format($purchaseOrder->total_harga, 2, ',', '.') }}">
                    </div>

                    <!-- Tambahkan bidang 'status' -->
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <input type="text" class="form-control" id="status" name="status" value="{{ old('status', $purchaseOrder->status) }}" readonly>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('purchaseorder.index') }}" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        function formatCurrency(value) {
            return 'Rp. ' + parseFloat(value).toLocaleString('id-ID', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            });
        }

        function cleanCurrencyFormat(value) {
            return value.replace(/[^0-9,]+/g, '').replace(',', '.');
        }

        function updateTotalHarga() {
            let total = 0;
            document.querySelectorAll('#dynamicTable tr').forEach(row => {
                const harga = parseFloat(cleanCurrencyFormat(row.querySelector('.harga-per-barang').value)) || 0;
                const quantity = parseFloat(row.querySelector('.quantity-input').value) || 0;
                total += harga * quantity;
            });
            document.getElementById('total_harga').value = formatCurrency(total);
        }

        document.getElementById('dynamicTable').addEventListener('change', function(e) {
            if (e.target.matches('.harga-per-barang, .quantity-input')) {
                updateTotalHarga();
            }
        });

        document.querySelector('form').addEventListener('submit', function(e) {
            document.querySelectorAll('.harga-per-barang, .quantity-input, #total_harga').forEach(input => {
                input.value = cleanCurrencyFormat(input.value);
            });
        });

        updateTotalHarga();
    });
</script>
@endsection