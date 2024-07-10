@extends('layouts.app')

@section('content')
<div class="p-3">
  <div class="card card-warning">
    <div class="card-header">
      <h3 class="card-title">Tambah Barang</h3>
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
        <label for="inputName">Deskripsi</label>
        <input type="text" id="inputName" class="form-control">
      </div>
      <div class="form-group">
        <label for="inputName">Harga</label>
        <input type="number" id="inputName" class="form-control">
      </div>
      <div class="form-group">
        <label for="inputName">Stock</label>
        <input type="number" id="inputName" class="form-control">
      </div>
      <div class="form-group">
        <label for="inputName">Foto</label>
        <input type="image" id="inputName" class="form-control">
      </div>
<div class="row p-3">
  <div class="col-12">
    <a href="/manage-konsumen" class="btn btn-danger">Cancel</a>
    <input type="submit" value="Tambah Konsumen" class="btn btn-warning float-right">
  </div>
</div>

@endsection
