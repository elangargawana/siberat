@extends('layouts.app')

@section('content')
<div class="p-3">
  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Tambah Konsumen</h3>
    </div>
    <div class="card-body">
      <div class="form-group">
        <label for="inputName">Id</label>
        <input type="text" id="inputName" class="form-control">
      </div>
      <div class="form-group">
        <label for="inputName">Nama</label>
        <input type="text" id="inputName" class="form-control">
      </div>
      <div class="form-group">
        <label for="inputName">Tanggal Lahir</label>
        <input type="date" id="inputName" class="form-control">
      </div>
      <div class="form-group">
        <label for="inputName">Alamat</label>
        <input type="text" id="inputName" class="form-control">
      </div>
      <div class="form-group">
        <label for="inputName">Jenis Kelamin</label>
        <input type="text" id="inputName" class="form-control">
      </div>
      <div class="form-group">
        <label for="inputName">Pekerjaan</label>
        <input type="text" id="inputName" class="form-control">
      </div>
      <div class="form-group">
        <label for="inputName">Nomor Telepon</label>
        <input type="number" id="inputName" class="form-control">
      </div>
      <div class="row p-0">
        <div class="col-12">
          <a href="/manage-konsumen" class="btn btn-secondary">Cancel</a>
          <input type="submit" value="Tambah Konsumen" class="btn btn-success float-right">
        </div>
      </div>

      @endsection