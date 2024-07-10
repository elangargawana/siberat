<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPurchaseOrder extends Model

{
    use HasFactory;

    protected $table = 'detail_purchase_order';

    protected $fillable = ['id_purchase_order','id_penawaran', 'id_barang', 'kuantitas', 'harga_per_barang'];
    public function purchaseOrder()
    {
        return $this->belongsTo(PurchaseOrder::class, 'id_purchase_order');
    }

    public function penawaran()
    {
        return $this->belongsTo(Penawaran::class, 'id_penawaran');
    }
    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_barang','id');
    }
}

