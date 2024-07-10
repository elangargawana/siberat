<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ActionPenawaran extends Controller
{
    private function cleanCurrencyFormat($value)
    {
        // Hapus "Rp." dan koma, lalu ubah titik menjadi koma
        return str_replace(',', '', str_replace('.', '', str_replace('Rp.', '', $value)));
    }

    public function tambahPenawaran(Request $request)
    {
        // Validasi data yang diterima
        $request->validate([
            'tanggal' => 'required|date',
            'id_konsumen' => 'required',
            'id_barang' => 'required|array',
            'quantity' => 'required|array',
            'harga' => 'required|array',
            'nomor' => 'required',
            'total_harga' => 'required'
        ]);

        // Membersihkan format harga total_harga
        $total_harga = $this->cleanCurrencyFormat($request->total_harga);

        // Buat objek penawaran dengan status default "Pending"
        $penawaran = DB::table('penawaran')->insertGetId([
            'tanggal' => $request->tanggal,
            'id_konsumen' => $request->id_konsumen,
            'nomor' => $request->nomor,
            'status' => 'Pending', // Atur status default menjadi "Pending"
            'total_harga' => $total_harga
        ]);

        $id_penawaran = $penawaran;

        // Simpan data detail penawaran
        $id_barang = $request->id_barang;
        $harga    = $request->harga;
        $quantity = $request->quantity;

        foreach ($id_barang as $key => $value) {
            // Membersihkan format harga per barang
            $cleaned_harga = $this->cleanCurrencyFormat($harga[$key]);

            DB::table('detail_penawaran')->insert([
                'id_penawaran' => $id_penawaran,
                'id_barang' => $id_barang[$key],
                'harga_per_barang' => $cleaned_harga,
                'kuantitas' => $quantity[$key]
            ]);
        }

        // Redirect ke halaman index penawaran dengan pesan sukses
        toastr()->success('Penawaran berhasil ditambahkan');
        return redirect()->route('penawaran.index');
    }
}
