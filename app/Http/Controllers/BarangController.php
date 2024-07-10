<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\BarangFoto;
use Illuminate\Support\Facades\Storage;
use App\Models\Penawaran; 

class BarangController extends Controller
{
    // Method untuk menampilkan daftar barang
    public function index()
    {
        $barang = Barang::all();
        return view('barang.index', compact('barang'));
    }

    // Method untuk menampilkan form create
    public function create()
    {
        return view('barang.create');
    }

    // Method untuk menyimpan barang baru
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
            'foto.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $barang = Barang::create($validatedData);

        // Handle multiple file uploads
        if ($request->hasFile('foto')) {
            foreach ($request->file('foto') as $file) {
                $path = $file->store('public/uploads');
                $foto = new BarangFoto();
                $foto->barang_id = $barang->id;
                $foto->path = $file->hashName();
                $foto->save();
            }
        }

        return redirect()->route('manage-barang.index')->with('success', 'Barang berhasil ditambahkan');
    }

    // Method untuk menampilkan form edit
    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        return view('barang.edit', compact('barang'));
    }

    // Method untuk mengupdate barang
    public function update(Request $request, $id)
{
    $validatedData = $request->validate([
        'nama' => 'required|string|max:255',
        'deskripsi' => 'required|string',
        'harga' => 'required|numeric',
        'stok' => 'required|numeric',
        'foto.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $barang = Barang::findOrFail($id);
    $barang->update($validatedData);

    // Handle photo updates
    if ($request->hasFile('foto')) {
        // Delete existing photos if needed
        $barang->fotos()->delete();

        // Upload new photos
        foreach ($request->file('foto') as $file) {
            $path = $file->store('public/uploads');
            $foto = new BarangFoto();
            $foto->barang_id = $barang->id;
            $foto->path = $file->hashName(); // or use $path if you want full path
            $foto->save();
        }
    }

    return redirect()->route('manage-barang.index')->with('success', 'Barang berhasil diperbarui');
}

public function destroy($id)
{
    $barang = Barang::findOrFail($id);
    
    // Delete associated photos
    $fotos = $barang->fotos;
    foreach ($fotos as $foto) {
        $filePath = storage_path('app/public/' . $foto->path);
        if (file_exists($filePath)) {
            unlink($filePath);
        }
        $foto->delete();
    }

    // Delete associated detail_purchase_order
    $detailPurchaseOrders = $barang->detailPurchaseOrders;
    foreach ($detailPurchaseOrders as $detailPurchaseOrder) {
        $detailPurchaseOrder->delete();
    }

    $barang->delete();

    return redirect()->route('manage-barang.index')->with('success', 'Barang berhasil dihapus');
}


}
