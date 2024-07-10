<?php
// Include library FPDF
require('fpdf/fpdf.php');

// Fungsi untuk membuat PDF
function createPDF($nama_vendor, $alamat_vendor, $kontak_vendor, $nomor_po, $tanggal_po, $tanggal_pengiriman, $deskripsi_item, $jumlah, $harga_satuan) {
    // Membuat objek FPDF
    $pdf = new FPDF();
    $pdf->AddPage();

    // Menambahkan judul
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(0, 10, 'Purchase Order', 0, 1, 'C');

    // Menambahkan informasi pesanan pembelian
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(0, 10, 'Vendor: ' . $nama_vendor, 0, 1);
    $pdf->Cell(0, 10, 'Alamat: ' . $alamat_vendor, 0, 1);
    $pdf->Cell(0, 10, 'Kontak: ' . $kontak_vendor, 0, 1);
    $pdf->Cell(0, 10, 'Nomor PO: ' . $nomor_po, 0, 1);
    $pdf->Cell(0, 10, 'Tanggal PO: ' . $tanggal_po, 0, 1);
    $pdf->Cell(0, 10, 'Tanggal Pengiriman: ' . $tanggal_pengiriman, 0, 1);

    // Menambahkan detail item pesanan
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(0, 10, 'Detail Item Pesanan', 0, 1);
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(50, 10, 'Deskripsi Item', 1, 0);
    $pdf->Cell(40, 10, 'Jumlah', 1, 0);
    $pdf->Cell(50, 10, 'Harga Satuan', 1, 1);

    // Menambahkan data detail item
    for ($i = 0; $i < count($deskripsi_item); $i++) {
        $pdf->Cell(50, 10, $deskripsi_item[$i], 1, 0);
        $pdf->Cell(40, 10, $jumlah[$i], 1, 0);
        $pdf->Cell(50, 10, $harga_satuan[$i], 1, 1);
    }

    // Simpan file PDF dengan nama yang unik
    $file_name = 'purchase_order_' . date('YmdHis') . '.pdf';
    $pdf->Output('D', $file_name);
}
?>
