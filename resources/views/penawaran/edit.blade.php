@extends('layouts.app')

@section('content')
<div class="container d-flex flex-column gap-5 p-3">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h3 class="text-bold">Edit Penawaran</h3>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Daftar Penawaran</li>
                <li class="breadcrumb-item active">Edit Penawaran</li>
            </ol>
        </div>
    </div>
    <div class="row mb-1">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form id="editPenawaranForm" method="POST" action="{{ route('penawaran.update', $penawaran->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="tanggal">Tanggal</label>
                            <div>
                                <input id="tanggal" type="date" class="form-control" name="tanggal" value="{{ $penawaran->tanggal }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="nomor">Nomor Seri</label>
                            <div>
                                <input id="nomor" type="text" class="form-control" name="nomor" value="{{ $penawaran->nomor }}" required readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="id_konsumen">Konsumen</label>
                            <div>
                                <select id="id_konsumen" name="id_konsumen" class="form-control" required>
                                    <option value="">Pilih Konsumen</option>
                                    @foreach($konsumen as $k)
                                    <option value="{{ $k->id }}" {{ $k->id == $penawaran->id_konsumen ? 'selected' : '' }}>{{ $k->perusahaan }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="card-body p-0 mb-3">
                            <label>Barang</label>
                            <div class="table-responsive">
                                <table class="table table-bordered mb-0">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>#</th>
                                            <th>Tanggal</th>
                                            <th>Nama Barang</th>
                                            <th>Kuantitas</th>
                                            <th>Harga per Barang</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody id="dynamicTable">
                                        @foreach($penawaran->detailPenawaran as $index => $detail)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $penawaran->tanggal }}</td>
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
                                                <input type="text" name="harga[]" class="form-control harga-per-barang" value="Rp. {{ number_format($detail->harga_per_barang, 0, ',', '.') }}" required readonly>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-danger delete-row"><i class="fa fa-trash"></i></button>
                                            </td>
                                            <input type="hidden" name="detail_id[]" value="{{ $detail->id }}">
                                        </tr>
                                        @endforeach
                                    </tbody>

                                </table>
                            </div>
                            <button type="button" class="btn btn-success mt-2" id="addRow">Tambah Barang</button>
                        </div>

                        <div class="form-group">
                            <label for="total_harga">Total Harga</label>
                            <div>
                                <input id="total_harga" type="text" class="form-control" name="total_harga" value="{{ 'Rp. '.number_format($penawaran->total_harga, 2, ',', '.') }}" required readonly>
                            </div>
                        </div>

                        <div>
                            <div>
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>
                                <a href="{{ route('penawaran.index') }}" class="btn btn-secondary">
                                    Cancel
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Function to handle currency formatting
        function formatCurrency(value) {
            return 'Rp. ' + parseFloat(value).toLocaleString('id-ID', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            });
        }

        // Function to clean currency format
        function cleanCurrencyFormat(value) {
            return value.replace(/[^0-9,]+/g, '').replace(',', '.');
        }

        // Update total harga based on changes in inputs
        function updateTotalHarga() {
            let total = 0;
            document.querySelectorAll('#dynamicTable tr').forEach(row => {
                const harga = parseFloat(cleanCurrencyFormat(row.querySelector('.harga-per-barang').value)) || 0;
                const quantity = parseFloat(row.querySelector('.quantity-input').value) || 0;
                total += harga * quantity;
            });
            document.getElementById('total_harga').value = formatCurrency(total);
        }

        // Event listener to add new row
        document.getElementById('addRow').addEventListener('click', function() {
            const tbody = document.getElementById('dynamicTable');
            const index = tbody.querySelectorAll('tr').length + 1;

            const row = `
                <tr>
                    <td>${index}</td>
                    <td>{{ $penawaran->tanggal }}</td>
                    <td>
                        <select name="new_barang_id[]" class="form-control barang-select" required>
                            <option value="">Pilih Barang</option>
                            @foreach($barang as $b)
                            <option value="{{ $b->id }}" data-harga="{{ $b->harga }}">{{ $b->nama }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <input type="number" name="new_quantity[]" class="form-control quantity-input" required>
                    </td>
                    <td>
                        <input type="text" name="new_harga[]" class="form-control harga-per-barang" required>
                    </td>
                    <td>
                        <button type="button" class="btn btn-danger delete-row"><i class="fa fa-trash"></i></button>
                    </td>
                </tr>
            `;

            tbody.insertAdjacentHTML('beforeend', row);
        });

        // Event listener for dynamically added rows
        document.getElementById('dynamicTable').addEventListener('change', function(e) {
            if (e.target.matches('.barang-select')) {
                const selectedOption = e.target.options[e.target.selectedIndex];
                const harga = selectedOption.getAttribute('data-harga');
                const hargaInput = e.target.closest('tr').querySelector('.harga-per-barang');
                hargaInput.value = harga;
                updateTotalHarga();
            }
            if (e.target.matches('.harga-per-barang, .quantity-input')) {
                updateTotalHarga();
            }
        });

        document.getElementById('dynamicTable').addEventListener('click', function(e) {
            if (e.target.matches('.delete-row')) {
                e.target.closest('tr').remove();
                updateTotalHarga();
            }
        });

        // Submit form handler to clean currency format before submitting
        document.getElementById('editPenawaranForm').addEventListener('submit', function(e) {
            document.querySelectorAll('.harga-per-barang, .quantity-input, #total_harga').forEach(input => {
                input.value = cleanCurrencyFormat(input.value);
            });
        });

        // Initialize total harga on page load
        updateTotalHarga();
    });
</script>

@endsection