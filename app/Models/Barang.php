<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barang';
    protected $fillable = ['nama', 'deskripsi', 'harga', 'stok'];

    public function fotos()
    {
        return $this->hasMany(BarangFoto::class);
    }

    public function penawarans()
    {
        return $this->belongsToMany(Penawaran::class, 'detail_penawarans')->withPivot('kuantitas', 'harga');
    }

    public function detailPenawaran()
    {
        return $this->hasMany(DetailPenawaran::class, 'id_barang');
    }
    public function detailPurchaseOrders()
    {
        return $this->hasMany(DetailPurchaseOrder::class, 'id_barang', 'id');
    }
}
