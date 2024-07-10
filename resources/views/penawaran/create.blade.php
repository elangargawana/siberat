@extends('layouts.app')

@section('content')
<div class="container d-flex flex-column gap-5 p-3">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h3 class="text-bold">Tambah Penawaran</h3>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Daftar Penawaran</li>
                <li class="breadcrumb-item active">Tambah Penawaran</li>
            </ol>
        </div>
    </div>

    <form id="penawaranForm" action="{{ url('action_penawaran') }}" method="POST">
        @csrf
        <div>
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Buat Penawaran</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" name="tanggal" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="id_konsumen">Konsumen</label>
                        <select name="id_konsumen" class="form-control" required>
                            <option value="">Pilih Konsumen</option>
                            @foreach ($konsumen as $k)
                            <option value="{{ $k->id }}">{{ $k->perusahaan }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="inputBarang">Barang</label>
                        <div class="col-12 card card-outline">
                            <div class="card-body" style="overflow: auto">
                                <table id="barangTable" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col" for="id_barang">Pilih Barang</th>
                                            <th scope="col" for="harga">Harga Barang Satuan</th>
                                            <th scope="col" for="quantity">Jumlah Barang</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>
                                                <div class="form-group">
                                                    <select name="id_barang[0]" class="form-control barang-select" required>
                                                        <option value="">Pilih Barang</option>
                                                        @foreach ($barang as $b)
                                                        <option value="{{ $b->id }}" data-harga="{{ $b->harga }}">{{ $b->nama }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" name="harga[0]" class="form-control harga-input" required readonly>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="number" name="quantity[0]" class="form-control quantity-input" required>
                                                </div>
                                            </td>
                                            <td><button type="button" class="btn btn-danger delete-row"><i class="fa fa-trash"></i></button></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <button type="button" class="btn btn-success" id="addRow">Tambah Baris</button>
                    </div>
                    <div class="form-group">
                        <label for="harga">Total Harga</label>
                        <input type="text" name="total_harga" class="form-control" required id="total-harga-input" readonly>
                    </div>

                    <div class="form-group">
                        <label for="nomor">Nomor Seri</label>
                        <input type="text" name="nomor" class="form-control" value="{{ $nomor_seri }}" required readonly>
                    </div>
                </div>
            </div>
        </div>
        <div class="row p-3">
            <div class="col-12">
                <a href="{{ route('penawaran.index') }}" class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-primary float-right">Simpan</button>
            </div>
        </div>
    </form>
</div>

<script>
    var count_barang = 1;
    document.addEventListener('DOMContentLoaded', function() {
        const barangTable = document.getElementById('barangTable');
        const totalHargaInput = document.getElementById('total-harga-input');

        function formatCurrency(value) {
            return 'Rp.' + parseFloat(value).toLocaleString('id-ID', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            });
        }

        function cleanCurrencyFormat(value) {
            return value.replace(/[^0-9,-]+/g, "").replace(",", ".");
        }

        function updateTotalHarga() {
            let total = 0;
            document.querySelectorAll('#barangTable tbody tr').forEach(row => {
                const harga = parseFloat(cleanCurrencyFormat(row.querySelector('.harga-input').value)) || 0;
                const quantity = parseFloat(row.querySelector('.quantity-input').value) || 0;
                total += harga * quantity;
            });
            totalHargaInput.value = formatCurrency(total);
        }

        barangTable.addEventListener('change', function(e) {
            if (e.target.classList.contains('barang-select')) {
                const selectedOption = e.target.options[e.target.selectedIndex];
                const harga = selectedOption.getAttribute('data-harga');
                const hargaInput = e.target.closest('tr').querySelector('.harga-input');
                hargaInput.value = formatCurrency(harga);
                updateTotalHarga();
            } else if (e.target.classList.contains('quantity-input')) {
                updateTotalHarga();
            }
        });

        document.getElementById('addRow').addEventListener('click', function() {
            const tableBody = document.querySelector('#barangTable tbody');
            const newRow = document.createElement('tr');
            newRow.innerHTML = `
                <th scope="row">${tableBody.children.length + 1}</th>
                <td>
                    <div class="form-group">
                        <select name="id_barang[${count_barang}]" class="form-control barang-select" required>
                            <option value="">Pilih Barang</option>
                            @foreach ($barang as $b)
                            <option value="{{ $b->id }}" data-harga="{{ $b->harga }}">{{ $b->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                </td>
                <td>
                    <div class="form-group">
                        <input type="text" name="harga[${count_barang}]" class="form-control harga-input" required readonly>
                    </div>
                </td>
                <td>
                    <div class="form-group">
                        <input type="number" name="quantity[${count_barang}]" class="form-control quantity-input" required>
                    </div>
                </td>
                <td><button type="button" class="btn btn-danger delete-row"><i class="fa fa-trash"></i></button></td>
            `;
            tableBody.appendChild(newRow);
            count_barang++;
        });

        barangTable.addEventListener('click', function(e) {
            if (e.target.classList.contains('delete-row')) {
                e.target.closest('tr').remove();
                const rows = document.querySelectorAll('#barangTable tbody tr');
                rows.forEach((row, index) => {
                    row.querySelector('th').textContent = index + 1;
                });
                updateTotalHarga();
            }
        });

        // Clean currency format before submitting the form
        document.getElementById('penawaranForm').addEventListener('submit', function(e) {
            const totalHargaInput = document.getElementById('total-harga-input');
            const hargaInputs = document.querySelectorAll('.harga-input');
            // Remove "00" from the harga barang satuan before submitting
            hargaInputs.forEach(function(input) {
                input.value = cleanCurrencyFormat(input.value).replace(/00$/, '');
            });
            // Remove "00" from the total harga before submitting
            totalHargaInput.value = cleanCurrencyFormat(totalHargaInput.value).replace(/00$/, '');
        });

    });
</script>
@endsection