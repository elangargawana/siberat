@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Buat Surat Jalan</h2>
    <form action="{{ route('suratjalan.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nomor">Nomor</label>
            <input type="text" class="form-control" id="nomor" name="nomor" value="{{ old('nomor') }}" readonly>
        </div>
        <div class="form-group">
            <label for="id_purchase_order">ID Purchase Order</label>
            <input type="text" class="form-control" id="id_purchase_order" name="id_purchase_order" value="{{ old('id_purchase_order') }}" readonly>
        </div>
        <div class="form-group">
            <label for="tanggal">Tanggal</label>
            <input type="text" class="form-control" id="tanggal" name="tanggal" value="{{ old('tanggal') }}" readonly>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat Tujuan</label>
            <input type="text" class="form-control" id="alamat" name="alamat" value="{{ old('alamat') }}" readonly>
        </div>
        <div class="form-group">
            <label for="nomor_po">Nomor PO</label>
            <input type="text" class="form-control" id="nomor_po" name="nomor_po" value="{{ old('nomor_po') }}" readonly>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
    </div>
    @endsection
