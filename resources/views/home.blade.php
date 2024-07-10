@extends('layouts.app')

@section('content')
<div class="container d-flex flex-column gap-5 p-3">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="text-bold">Dashboard</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- Kotak untuk Stok Barang -->
            <div class="col-lg-4 col-md-6 col-sm-12"> <!-- Ukuran untuk tiga kotak dalam satu baris -->
                <div class="small-box bg-warning" style="height: 200px;">
                    <div class="inner">
                        <h3>Barang</h3>
                        <p>Detail tentang Stok Barang</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-boxes"></i>
                    </div>
                    <a href="/manage-barang" class="small-box-footer">Lihat Detail <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12"> <!-- Ukuran untuk tiga kotak dalam satu baris -->
                <div class="small-box bg-danger" style="height: 200px;">
                    <div class="inner">
                        <h3>Konsumen</h3>
                        <p>Detail Konsumen</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user"></i>
                    </div>
                    <a href="/manage-purchaseorder" class="small-box-footer">Lihat Detail <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- Kotak untuk Penawaran -->
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="small-box bg-success" style="height: 200px;">
                    <div class="inner">
                        <h3>Penawaran</h3>
                        <p>Detail tentang Penawaran</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-tags"></i>
                    </div>
                    <a href="/manage-penawaran" class="small-box-footer">Lihat Detail <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12"> <!-- Ukuran untuk tiga kotak dalam satu baris -->
                <div class="small-box bg-yellow" style="height: 200px;">
                    <div class="inner">
                        <h3>Purchase Order</h3>
                        <p>Detail Purchase Order</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-credit-card"></i>
                    </div>
                    <a href="/manage-purchaseorder" class="small-box-footer">Lihat Detail <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12"> <!-- Ukuran untuk tiga kotak dalam satu baris -->
                <div class="small-box bg-red" style="height: 200px;">
                    <div class="inner">
                        <h3>Surat Jalan</h3>
                        <p>Detail Surat Jalan</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-truck"></i>
                    </div>
                    <a href="/suratjalan" class="small-box-footer">Lihat Detail <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
@push('js')<script>
    $('.toast').toast('show')
</script>
<script>
    $('.toast').toast('show')
</script>
@endpush