<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PurchaseOrder;
use App\Models\DetailPenawaran;
use App\Models\DetailPurchaseOrder;
use App\Models\Penawaran;
use App\Models\Barang;
use App\Models\SuratJalan;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;

class PurchaseOrderController extends Controller
{
    public function index()
    {
        $purchaseOrders = PurchaseOrder::with('penawaran')->get();
        return view('purchaseorder.index', compact('purchaseOrders'));
    }

    public function edit($id)
    {
        $purchaseOrder = PurchaseOrder::with('penawaran.detailPenawaran')->findOrFail($id);
        $barang = Barang::all();
        return view('purchaseorder.edit', compact('purchaseOrder', 'barang'));
    }

    public function update(Request $request, $id)
{
    
    $request->validate([
        'jenis_purchase_order' => 'required|in:QRIS,Bank Transfer',
        'status' => 'required|in:Pending,Dibatalkan,Sukses',
        'quantity.*' => 'required|numeric|min:1',
        'harga.*' => 'required|numeric|min:0',
    ]);

    $purchaseOrder = PurchaseOrder::findOrFail($id);

    // Update PurchaseOrder attributes
    $purchaseOrder->jenis = $request->jenis_purchase_order;
    $purchaseOrder->status = $request->status;

    // Update Detail Penawaran
    foreach ($request->barang_id as $index => $barang_id) {
        $detailPurchaseOrder = DetailPurchaseOrder::updateOrCreate(
            ['id_purchase_order' => $purchaseOrder->id, 'id_barang' => $barang_id],
            [
                'id_penawaran' => $purchaseOrder->penawaran->id, // pastikan relasinya sudah disetup di model
                'kuantitas' => $request->quantity[$index],
                'harga_per_barang' => str_replace(',', '.', $request->harga[$index]), // sesuaikan format harga
                // tambahkan atribut lain yang perlu disimpan
            ]
        );
    }

    // Update Total Harga
    $totalHarga = array_sum(array_map(function ($qty, $harga) {
        return $qty * $this->cleanCurrencyFormat($harga);
    }, $request->quantity, $request->harga));

    $purchaseOrder->total_harga = $totalHarga;
    $purchaseOrder->save();

    return redirect()->route('purchaseorder.index')->with('success', 'Purchase order berhasil diperbarui.');
}



    public function destroy($id)
    {
        $purchaseOrder = PurchaseOrder::findOrFail($id);
        $purchaseOrder->delete();

        return redirect()->route('purchaseorder.index')->with('success', 'Purchase order berhasil dihapus.');
    }
    public function detail($id)
    {
        $purchaseOrder = PurchaseOrder::with('penawaran.detailPenawaran')->findOrFail($id);
        return view('purchaseorder.detail', compact('purchaseOrder'));
    }
    
    public function updateStatus($id, Request $request)
    {
        $purchaseOrder = PurchaseOrder::findOrFail($id);
        $purchaseOrder->status = 'Sukses';
        $purchaseOrder->save();

        return response()->json(['success' => true, 'status' => 'Sukses']);
    }

    public function show($id)
{
    // Menggunakan with() untuk memuat relasi penawaran dan detailPenawaran
    $purchaseOrder = PurchaseOrder::with('penawaran.detailPenawaran.barang')->findOrFail($id);

    // Menghitung total harga dan total kuantitas dari detail purchase order
    $totalHarga = $purchaseOrder->detailPurchaseOrder->sum(function ($detail) {
        return $detail->kuantitas * $detail->harga_per_barang;
    });

    $totalKuantitas = $purchaseOrder->detailPurchaseOrder->sum('kuantitas');

    return view('purchaseorder.show', compact('purchaseOrder', 'totalHarga', 'totalKuantitas'));
}
public function huft($id)
{
    // Menggunakan with() untuk memuat relasi penawaran dan detailPenawaran
    $purchaseOrder = PurchaseOrder::with('penawaran.detailPenawaran.barang')->findOrFail($id);

    // Menghitung total harga dan total kuantitas dari detail purchase order
    $totalHarga = $purchaseOrder->detailPurchaseOrder->sum(function ($detail) {
        return $detail->kuantitas * $detail->harga_per_barang;
    });

    $totalKuantitas = $purchaseOrder->detailPurchaseOrder->sum('kuantitas');

    return view('purchaseorder.show1', compact('purchaseOrder', 'totalHarga', 'totalKuantitas'));
}
public function show1($id)
{
    // Menggunakan with() untuk memuat relasi penawaran dan detailPenawaran
    $purchaseOrder = PurchaseOrder::with('penawaran.detailPenawaran.barang')->findOrFail($id);

    // Menghitung total harga dan total kuantitas dari detail purchase order
    $totalHarga = $purchaseOrder->detailPurchaseOrder->sum(function ($detail) {
        return $detail->kuantitas * $detail->harga_per_barang;
    });

    $totalKuantitas = $purchaseOrder->detailPurchaseOrder->sum('kuantitas');

    return view('purchaseorder.show', compact('purchaseOrder', 'totalHarga', 'totalKuantitas'));
}


public function createSuratJalan($id)
{
    $purchaseOrder = PurchaseOrder::with('penawaran.detailPenawaran')->findOrFail($id);
    $tanggalWaktu = date('d-m-Y H:i');
    $hashTanggalWaktu = substr(strtoupper(md5($tanggalWaktu)), 0, 7); // Ambil 7 karakter pertama dari hash MD5
    $nomorSJ = 'SJ - ' . $hashTanggalWaktu;

    DB::beginTransaction();

    try {
        $suratJalan = SuratJalan::create([
            'id_purchase_order' => $purchaseOrder->id,
            'nomor' => $nomorSJ,
            'nomor_po' => $purchaseOrder->nomor,
            'tanggal' => now()->format('Y-m-d')
        ]);

        foreach ($purchaseOrder->penawaran->detailPenawaran as $detail) {
            $barang = Barang::find($detail->id_barang);
            if (!$barang) {
                throw new \Exception("Barang with ID {$detail->id_barang} not found.");
            }
            $barang->stok -= $detail->kuantitas;
            $barang->save();
        }

        $purchaseOrder->update(['status' => 'Sukses']);
        DB::commit();

        return redirect()->route('suratjalan.index')->with('success', 'Surat Jalan berhasil dibuat.');
    } catch (\Exception $e) {
        DB::rollback();
        return redirect()->back()->with('error', 'Gagal membuat Surat Jalan: ' . $e->getMessage());
    }
}


    public function unduh($id)
    {
        $purchaseOrder = PurchaseOrder::findOrFail($id);
        $pdf = new Dompdf();
        $html = View::make('purchaseorder.unduh', compact('purchaseOrder'))->render();
        $pdf->loadHtml($html);
        $pdf->render();
        return $pdf->stream('purchase_order_' . $id . '.pdf');
    }

    private function cleanCurrencyFormat($value)
    {
        return str_replace(['Rp', '.', ','], ['', '', '.'], $value);
    }
}
