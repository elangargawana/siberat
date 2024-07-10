<?php

namespace App\Http\Controllers;

use App\Models\DetailPenawaran;
use App\Models\Barang;
use Illuminate\Http\Request;

class DetailPenawaranController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $detail = DetailPenawaran::findOrFail($id);
        $barangs = Barang::all(); // Assuming you have a Barang model to fetch all items
        return view('penawaran.detail_edit', compact('detail', 'barangs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'barang_id' => 'required|exists:barang,id',
            'kuantitas' => 'required|integer|min:1',
            'harga_per_barang' => 'required|numeric|min:0',
        ]);

        $detail = DetailPenawaran::findOrFail($id);
        $detail->update([
            'barang_id' => $request->barang_id,
            'kuantitas' => $request->kuantitas,
            'harga_per_barang' => $request->harga_per_barang,
        ]);

        return redirect()->route('penawaran.show', $detail->id_penawaran)
            ->with('success', 'Detail updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $detail = DetailPenawaran::findOrFail($id);
        $detail->delete();

        return redirect()->route('penawaran.show', $detail->id_penawaran)
            ->with('success', 'Detail deleted successfully.');
    }
}
