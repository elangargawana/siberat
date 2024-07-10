<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPenawaran extends Model
{
    use HasFactory;
    protected $table = 'detail_penawaran'; // Pastikan nama tabel yang benar

    protected $fillable = [
        'id_penawaran',
        'id_barang',
        'kuantitas',
        'harga_per_barang',
    ];

    public function penawaran()
    {
        return $this->belongsTo(Penawaran::class, 'id_penawaran');
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_barang');
    }
}

