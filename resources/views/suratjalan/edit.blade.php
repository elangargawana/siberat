@extends('layouts.app')

@section('content')
<div class="container d-flex flex-column gap-5 p-3">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h3 class="text-bold">Tahap Surat Jalan</h3>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Tahap Surat Jalan</li>
            </ol>
        </div>
    </div>

    <form action="{{ route('suratjalan.update', $suratJalan->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nomor">Nomor Surat Jalan:</label>
            <input type="text" class="form-control" id="nomor" name="nomor" value="{{ $suratJalan->nomor }}">
        </div>

        <div class="form-group">
            <label for="tanggal">Tanggal:</label>
            <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ $suratJalan->tanggal }}">
        </div>

        <div class="form-group">
            <label for="alamat_tujuan">Alamat Tujuan:</label>
            <textarea class="form-control" id="alamat_tujuan" name="alamat_tujuan" rows="3">{{ $suratJalan->alamat_tujuan }}</textarea>
        </div>

        <div class="form-group">
            <label for="nomor_po">Nomor Purchase Order:</label>
            <input type="text" class="form-control" id="nomor_po" name="nomor_po" value="{{ $suratJalan->nomor_po }}">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('suratjalan.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection