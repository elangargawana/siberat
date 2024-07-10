<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use App\Models\Konsumen;

class Konsumen extends Model
{

    protected $table = 'konsumen';
    public function penawaran()
    {
        return $this->hasMany(Penawaran::class, 'id_konsumen');
    }


    use HasFactory;
    protected $fillable = [
        'perusahaan', 'pic', 'alamat', 'jenis_kelamin', 'jabatan', 'no_telp',
    ];
}
