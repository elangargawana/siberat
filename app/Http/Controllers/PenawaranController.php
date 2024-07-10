<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Penawaran;
use App\Models\DetailPenawaran;
use App\Models\DetailPurchaseOrder;
use App\Models\PurchaseOrder;
use App\Models\Konsumen;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

class PenawaranController extends Controller
{
    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'nomor' => 'required|string',
            'id_konsumen' => 'required|integer',
            'quantity' => 'required|array',
            'harga' => 'required|array',
            'quantity.*' => 'required|integer|min:1',
            'harga.*' => 'required|numeric|min:0',
            'detail_id' => 'array',
            'barang_id' => 'array',
            'new_barang_id' => 'array',
            'new_quantity' => 'array',
            'new_harga' => 'array',
        ]);

        $penawaran = Penawaran::findOrFail($id);
        $penawaran->tanggal = $request->input('tanggal');
        $penawaran->nomor = $request->input('nomor');
        $penawaran->id_konsumen = $request->input('id_konsumen');
        $penawaran->save();

        // Delete removed details
        $existingDetailIds = $penawaran->detailPenawaran->pluck('id')->toArray();
        $requestDetailIds = $request->input('detail_id', []);
        $deletedDetailIds = array_diff($existingDetailIds, $requestDetailIds);

        foreach ($deletedDetailIds as $detail_id) {
            $detail = DetailPenawaran::findOrFail($detail_id);
            $detail->delete();
        }

        // Update existing details
        foreach ($request->input('detail_id', []) as $index => $detail_id) {
            $detail = DetailPenawaran::findOrFail($detail_id);
            $detail->id_barang = $request->input('barang_id')[$index];
            $detail->kuantitas = $request->input('quantity')[$index];
            $detail->harga_per_barang = $request->input('harga')[$index];
            $detail->save();
        }

        // Add new details
        if ($request->has('new_barang_id')) {
            foreach ($request->input('new_barang_id', []) as $index => $new_barang_id) {
                $detail = new DetailPenawaran();
                $detail->id_penawaran = $penawaran->id;
                $detail->id_barang = $new_barang_id;
                $detail->kuantitas = $request->input('new_quantity')[$index];
                $detail->harga_per_barang = $request->input('new_harga')[$index];
                $detail->save();
            }
        }

        // Calculate the total price
        $total_harga = DetailPenawaran::where('id_penawaran', $penawaran->id)->sum(DB::raw('kuantitas * harga_per_barang'));
        $penawaran->total_harga = $total_harga;
        $penawaran->save();

        return redirect()->route('penawaran.index')->with('success', 'Penawaran berhasil diperbarui');
    }

    public function index()
    {
        $penawarans = Penawaran::all();
        $purchaseOrders = PurchaseOrder::all();
        return view('penawaran.index', compact('penawarans', 'purchaseOrders'));
    }

    public function create()
    {
        $penawaran = Penawaran::all();
        $konsumen = Konsumen::all();
        $barang = Barang::all();
        $nomor_seri = $this->generateNomorSeri();
        return view('penawaran.create', compact('konsumen', 'barang', 'nomor_seri', 'penawaran'));
    }

    public function edit($id)
    {
        $penawaran = Penawaran::with('detailPenawaran')->findOrFail($id);
        $konsumen = Konsumen::all();
        $barang = Barang::all();

        $totalHarga = $penawaran->detailPenawaran->sum(function ($detail) {
            return $detail->kuantitas * $detail->harga_per_barang;
        });

        return view('penawaran.edit', compact('penawaran', 'konsumen', 'barang', 'totalHarga'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'id_konsumen' => 'required|exists:konsumen,id',
            'id_barang' => 'required|array',
            'id_barang.*' => 'exists:barang,id',
            'quantity' => 'required|array',
            'quantity.*' => 'integer|min:1',
            'harga' => 'required|array',
            'harga.*' => 'numeric|min:0',
            'nomor' => 'required|string'
        ]);

        $penawaran = Penawaran::create([
            'tanggal' => $request->tanggal,
            'id_konsumen' => $request->id_konsumen,
            'nomor' => $request->nomor,
            'status' => 'Pending',
        ]);

        foreach ($request->id_barang as $key => $id_barang) {
            DetailPenawaran::create([
                'id_penawaran' => $penawaran->id,
                'barang_id' => $id_barang,
                'harga' => $request->harga[$key],
                'quantity' => $request->quantity[$key]
            ]);
        }

        $penawaran->save();
        return redirect()->route('penawaran.index')->with('success', 'Penawaran berhasil dihapus.');
    }

    public function konfirmasi($id)
{
    $penawaran = Penawaran::with('detailPenawaran')->findOrFail($id);
    $penawaran->status = 'Sukses';
    $penawaran->save();

    $total_harga = $penawaran->detailPenawaran->sum(function ($detail) {
        return $detail->kuantitas * $detail->harga_per_barang;
    });

    $tanggalWaktu = date('d-m-Y H:i');
    $hashTanggalWaktu = strtoupper(md5($tanggalWaktu));
    $hashTanggalWaktu = substr($hashTanggalWaktu, 0, 7);
    $nomorPO = 'PO - ' . $hashTanggalWaktu;

    $purchaseOrder = PurchaseOrder::create([
        'id_penawaran' => $penawaran->id,
        'tanggal' => $penawaran->tanggal,
        'nomor' => $nomorPO,
        'total_harga' => $total_harga,
        'status' => 'Pending',
        'jenis' => ''
    ]);

    foreach ($penawaran->detailPenawaran as $detail) {
        DetailPurchaseOrder::create([
            'id_purchase_order' => $purchaseOrder->id,
            'id_penawaran' => $penawaran->id,
            'id_barang' => $detail->id_barang,
            'kuantitas' => $detail->kuantitas,
            'harga_per_barang' => $detail->harga_per_barang
        ]);
    }

    return redirect()->route('purchaseorder.index')->with('success', 'Penawaran berhasil dikonfirmasi.');
}


    public function show($id)
    {
        $penawaran = Penawaran::with('detailPenawaran')->findOrFail($id);
        $details = $penawaran->detailPenawaran;

        $total_harga = $details->sum(function ($detail) {
            return $detail->kuantitas * $detail->harga_per_barang;
        });

        return view('penawaran.detail', compact('penawaran', 'details', 'total_harga'));
    }

    public function destroy($id)
    {
        $penawaran = Penawaran::findOrFail($id);
        $penawaran->detailPenawaran()->delete();
        $penawaran->delete();

        return redirect()->route('penawaran.index')->with('success', 'Penawaran berhasil dihapus.');
    }

    private function generateNomorSeri()
    {
        $tanggalWaktu = date('d-m-Y H:i:s');
        $hashTanggalWaktu = strtoupper(md5($tanggalWaktu));
        $hashTanggalWaktu = substr($hashTanggalWaktu, 0, 7);
        $nomorSeri = 'PE - ' . $hashTanggalWaktu;

        return $nomorSeri;
    }

    public function unduh($id)
    {
        $penawaran = Penawaran::findOrFail($id);
        $pdf = PDF::loadView('penawaran.unduh', compact('penawaran'));

        return $pdf->download('penawaran_' . $id . '.pdf');
    }
}
