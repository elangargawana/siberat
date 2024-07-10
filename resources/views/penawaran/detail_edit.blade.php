@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Detail Penawaran</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('detail.update', $detail->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <label for="barang_id" class="col-md-4 col-form-label text-md-right">Nama Barang</label>

                            <div class="col-md-6">
                                <select id="barang_id" class="form-control" name="barang_id" required disabled>
                                    @foreach($barangs as $barang)
                                    <option value="{{ $barang->id }}" {{ $detail->barang_id == $barang->id ? 'selected' : '' }}>{{ $barang->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="kuantitas" class="col-md-4 col-form-label text-md-right">Kuantitas</label>

                            <div class="col-md-6">
                                <input id="kuantitas" type="number" class="form-control" name="kuantitas" value="{{ $detail->kuantitas }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="harga_per_barang" class="col-md-4 col-form-label text-md-right">Harga per Barang</label>

                            <div class="col-md-6">
                                <input id="harga_per_barang" type="number" class="form-control" name="harga_per_barang" value="{{ $detail->harga_per_barang }}" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Simpan
                                </button>
                                <a href="{{ route('penawaran.show', $detail->id_penawaran) }}" class="btn btn-secondary">
                                    Batal
                                </a>
                            </div>
                        </div>
                    </form>


                </div>


            </div>

        </div>
    </div>
</div>
@endsection