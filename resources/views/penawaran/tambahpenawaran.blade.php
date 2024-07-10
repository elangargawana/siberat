@extends('layouts.app')

@section('content')
<div class="container d-flex flex-column gap-5 p-3">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="text-bold"></h1>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Daftar Penawaran</li>
        <li class="breadcrumb-item active">Tambah Penawaran</li>
      </ol>
    </div>
  </div>
</div>

<div class="p-3">
  <div class="card card-primary">
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
        <label for="inputName">Tanggal</label>
        <input type="date" id="inputName" class="form-control">
      </div>
      <div class="form-group">
        <label for="inputName">Nama</label>
        <input type="text" id="inputName" class="form-control">
      </div>
      <div class="form-group">
        <label for="inputStatus">Status</label>
        <select id="inputStatus" class="form-control custom-select">
          <option selected disabled>Select one</option>
          <option>Belum Diproses</option>
          <option>Sedang Diproses</option>
          <option>Sudah Diproses</option>
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
                  <th scope="col">Nama Barang</th>
                  <th scope="col">Harga Barang Satuan</th>
                  <th scope="col">Jumlah Barang</th>
                  <th scope="col">Aksi</th> <!-- Tambah kolom untuk aksi -->
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td><input type="text" class="form-control" name="nama_barang[]"></td>
                  <td><input type="text" class="form-control" name="harga_satuan[]" disabled></td>
                  <td><input type="number" class="form-control" name="jumlah_barang[]"></td>
                  <td><button type="button" class="btn btn-danger delete-row"><i class="fa fa-trash"></i></button></td> <!-- Tombol hapus -->
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <button type="button" class="btn btn-success" id="addRow">Tambah Baris</button>
      </div>
      <div class="form-group">
        <label for="inputProjectLeader">Total Harga</label>
        <input type="text" id="inputProjectLeader" class="form-control" disabled>
      </div>
    </div>
  </div>
</div>
<div class="row p-3">
  <div class="col-12">
    <a href="#" class="btn btn-secondary">Cancel</a>
    <input type="submit" value="Buat Penawaran" class="btn btn-success float-right">
  </div>
</div>

@endsection

@push('js')
<script>
  // Function to add new row to the table
  document.getElementById('addRow').addEventListener('click', function() {
    const tableBody = document.querySelector('#barangTable tbody');
    const newRow = document.createElement('tr');
    newRow.innerHTML = `
      <th scope="row">${tableBody.children.length + 1}</th>
      <td><input type="text" class="form-control" name="nama_barang[]"></td>
      <td><input type="text" class="form-control" name="harga_satuan[]" disabled></td>
      <td><input type="number" class="form-control" name="jumlah_barang[]"></td>
      <td><button type="button" class="btn btn-danger delete-row"><i class="fa fa-trash"></i></button></td> <!-- Tombol hapus -->
    `;
    tableBody.appendChild(newRow);
  });

  // Function to delete row from the table
  document.querySelector('#barangTable').addEventListener('click', function(e) {
    if (e.target.classList.contains('delete-row')) {
      e.target.closest('tr').remove();
      // Update row numbers
      const rows = document.querySelectorAll('#barangTable tbody tr');
      rows.forEach((row, index) => {
        row.querySelector('th').textContent = index + 1;
      });
    }
  });
</script>
@endpush