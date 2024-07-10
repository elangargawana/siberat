<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuratJalan;
use App\Models\PurchaseOrder;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;

class SuratJalanController extends Controller
{
    public function index()
    {
        $suratJalans = SuratJalan::all(); // Atau Anda bisa mengambil data SuratJalan sesuai kebutuhan aplikasi Anda
        return view('suratjalan.index', ['suratJalans' => $suratJalans]);
    }

    public function create($id)
    {
        // Mengambil data purchase order berdasarkan ID
        $nomor = SuratJalan::generateNomor();
        // Debugging: Memastikan data diambil dengan benar


        return view('suratjalan.create', compact('nomor'));
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

    return view('suratjalan.show', compact('purchaseOrder', 'totalHarga', 'totalKuantitas'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'id_purchase_order' => 'required|exists:purchase_orders,id',
            'nomor' => 'required|string|max:20',
            'tanggal' => 'required|date',
            'alamat_tujuan' => 'required|string',
            'nomor_po' => 'required|string|max:255',
        ]);

        // Membuat Surat Jalan baru
        SuratJalan::create($request->all());

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('suratjalan.index')->with('success', 'Surat Jalan berhasil dibuat.');
    }

    public function edit($id)
    {
        $purchaseOrders = PurchaseOrder::all(); // Ensure this variable is available
        $suratJalan = SuratJalan::findOrFail($id);
        return view('suratjalan.edit', compact('suratJalan', 'purchaseOrders'));
    }
    public function update(Request $request, $id)
    {
        // Validasi data yang dikirimkan
        $request->validate([
            'nomor' => 'required',
            'tanggal' => 'required',
            'alamat_tujuan' => 'required',
            'nomor_po' => 'required',
        ]);

        // Temukan surat jalan berdasarkan ID
        $suratJalan = SuratJalan::findOrFail($id);

        // Update data surat jalan
        $suratJalan->nomor = $request->nomor;
        $suratJalan->tanggal = $request->tanggal;
        $suratJalan->alamat_tujuan = $request->alamat_tujuan;
        $suratJalan->nomor_po = $request->nomor_po;
        $suratJalan->save();

        // Redirect pengguna kembali ke halaman yang sesuai
        return redirect()->route('suratjalan.index')->with('success', 'Surat jalan berhasil diperbarui.');
    }
    public function destroy($id)
    {
        $suratJalan = SuratJalan::findOrFail($id);
        $suratJalan->delete();

        return redirect()->route('suratjalan.index')->with('success', 'Surat jalan berhasil dihapus.');
    }
    public function unduh($id)
    {
        $suratJalan = SuratJalan::findOrFail($id);

        $pdf = FacadePdf::loadView('suratjalan.unduh', compact('suratJalan'));

        return $pdf->download('suratjalan_'.$id.'.pdf');
    }
}
