<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    use HasFactory;

    protected $table = 'purchase_order'; // Sesuaikan nama tabel dengan yang sebenarnya

    protected $fillable = ['nomor', 'tanggal', 'jenis', 'status', 'id_penawaran', 'total_harga'];

    public function suratJalan()
    {
        return $this->hasOne(SuratJalan::class, 'id_purchase_order');
    }

    public function penawaran()
    {
        return $this->belongsTo(Penawaran::class, 'id_penawaran');
    }
    public function detailPurchaseOrder()
    {
        return $this->hasMany(DetailPurchaseOrder::class, 'id_purchase_order');
    }
}
