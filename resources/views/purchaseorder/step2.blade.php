@extends('purchaseorder.index')

@section('step')
<div class="container d-flex flex-column gap-5 p-3">
  <div class="row pt-5 mb-3">
    <div class="m-0 p-0 row col d-flex align-items-center justify-content-between">
      <h3>Tahap Surat Jalan</h3>
    </div>
  </div>
  <div class="row mb-1" style="min-height: 200px;">
    <div class="col-12 card card-outline">
      <div class="card-body" style="overflow: auto">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th scope="col">Id</th>
              <th scope="col">Nomor Purchase Order</th>
              <th scope="col">Nomor Surat Jalan</th>
              <th scope="col">Tanggal</th>
              <th scope="col">Alamat Tujuan</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <th scope="row">1</th>
            <td>12345</td>
            <td>12345</td>
            <td>12-3-2024</td>
            <td>Trunojoyo</td>
            <td class="NoPrint col-md-1">
              <div class="row">
                <div class="dropdown mr-2">
                  <button type="button" class="btn btn-sm btn-outline-info dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                    <i class="fas fa-cog"></i>
                  </button>
                  <div class="dropdown-menu dropdown-menu-up">
                    <a class="dropdown-item" href="#"><i class="fas fa-edit"></i> Edit</a>
                    <a class="dropdown-item" href="#"><i class="fas fa-trash"></i> Hapus</a>
                    <a class="dropdown-item" href="#"><i class="fas fa-check"></i> Konfirmasi</a>
                    <a class="dropdown-item" href="#"><i class="fas fa-info-circle"></i> Informasi</a>
                    <a class="dropdown-item" href="#"><i class="fas fa-download"></i> Unduh</a>
                  </div>
                </div>
              </div>
            </td>
            </tr>
          </tbody>
        </table>
        <div class="row p-0 mt-2">
          <div class="col-12">
            <a href="manage-purchaseorder?step=1" class="btn btn-secondary">Kembali</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection