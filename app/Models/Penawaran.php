<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penawaran extends Model
{
    protected $table = 'penawaran';
    protected $fillable = ['tanggal', 'id_konsumen', 'nomor', 'total_harga', 'status'];

    // Definisikan relasi dengan tabel DetailPenawaran
    public function detailPenawaran()
    {
        return $this->hasMany(DetailPenawaran::class, 'id_penawaran');
    }

    public function purchaseOrders()
    {
        return $this->hasMany(PurchaseOrder::class, 'id_penawaran');
    }
    // Definisikan relasi dengan tabel Konsumen
    public function konsumen()
    {
        return $this->belongsTo(Konsumen::class, 'id_konsumen');
    }
    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_barang');
    }
}
