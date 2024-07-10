<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratJalan extends Model
{
    use HasFactory;
    protected $table = 'surat_jalan';

    protected $fillable = [
        'id_purchase_order', 'nomor', 'tanggal', 'alamat_tujuan', 'nomor_po'
    ];

    public function purchaseOrder()
    {
        return $this->belongsTo(PurchaseOrder::class, 'id_purchase_order');
    }

    public static function generateNomor()
    {
        $date = (new \DateTime())->format('dmY');
        $latest = self::whereDate('created_at', today())->count();
        $nextNumber = str_pad($latest + 1, 3, '0', STR_PAD_LEFT);
        return "SJ{$nextNumber} - {$date}";
    }


    public function edit($id)
    {
        $purchaseOrders = PurchaseOrder::all(); // Ensure this variable is available
        $suratJalan = SuratJalan::findOrFail($id);
        return view('suratjalan.edit', compact('suratJalan', 'purchaseOrders'));
    }
}
