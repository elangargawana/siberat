<?php

namespace App\Http\Controllers;

use App\Models\Konsumen;
use App\Models\Barang;
use Illuminate\Http\Request;

class KonsumenController extends Controller
{
    public function index()
    {
        $konsumen = Konsumen::all();
        return view('konsumen.index', compact('konsumen'));
    }

    public function create()
    {
        return view('konsumen.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'perusahaan' => 'required|string|max:255',
            'pic' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'jenis_kelamin' => 'required|string|in:Laki-laki,Perempuan',
            'jabatan' => 'required|string|max:255',
            'no_telp' => 'required|string|max:20',
        ]);

        Konsumen::create($validatedData);

        return redirect()->route('konsumen.index')
            ->with('success', 'Konsumen berhasil ditambahkan.');
    }
    public function edit($id)
    {
        $konsumen = Konsumen::findOrFail($id);
        return view('konsumen.edit', compact('konsumen'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'perusahaan' => 'required|string|max:255',
            'pic' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'jenis_kelamin' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'no_telp' => 'required|string|max:255',
        ]);

        // Ubah format tanggal lahir sesuai dengan format yang diperlukan
        $tanggal_lahir = date('Y-m-d', strtotime($request->tanggal_lahir));

        $konsumen = Konsumen::findOrFail($id);
        $konsumen->update([
            'perusahaan' => $request->perusahaan,
            'pic' => $request->pic,
            'alamat' => $request->alamat,
            'jenis_kelamin' => $request->jenis_kelamin,
            'jabatan' => $request->jabatan,
            'no_telp' => $request->no_telp,
        ]);

        return redirect()->route('konsumen.index')->with('success', 'Konsumen berhasil diperbarui');
    }

    public function destroy($id)
    {
        $konsumen = Konsumen::findOrFail($id);
        $konsumen->delete();

        return redirect()->route('konsumen.index')->with('success', 'Konsumen berhasil dihapus');
    }
}
