<?php
// Include library FPDF
require('fpdf/fpdf.php');

// Fungsi untuk membuat PDF
function createPDF($kode_barang, $nama_barang, $harga_barang, $nama_klien, $alamat_klien, $jumlah_barang) {
    // Bersihkan output buffer
    ob_clean();

    // Buat objek FPDF baru
    $pdf = new FPDF();

    // Tambahkan halaman baru
    $pdf->AddPage();

    // Atur font
    $pdf->SetFont('Arial', 'B', 16);

    // Tambahkan judul
    $pdf->Cell(0, 10, 'Invoice', 0, 1, 'C');

    // Tambahkan informasi penjualan
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(0, 10, 'Tanggal: ' . date('Y-m-d'), 0, 1);
    $pdf->Cell(0, 10, '----------------------------------', 0, 1);

    // Tambahkan konten ke PDF
    $pdf->Cell(0, 10, 'Kode Barang: ' . $kode_barang, 0, 1);
    $pdf->Cell(0, 10, 'Nama Barang: ' . $nama_barang, 0, 1);
    $pdf->Cell(0, 10, 'Harga Barang: ' . $harga_barang, 0, 1);
    $pdf->Cell(0, 10, 'Nama Klien: ' . $nama_klien, 0, 1);
    $pdf->Cell(0, 10, 'Alamat Klien: ' . $alamat_klien, 0, 1);
    $pdf->Cell(0, 10, 'Jumlah Barang: ' . $jumlah_barang, 0, 1);
    $pdf->Cell(0, 10, '----------------------------------', 0, 1);

    // Hitung total
    $total = $harga_barang * $jumlah_barang;

    // Tampilkan total
    $pdf->Cell(0, 10, 'Total: ' . $total, 0, 1);

    // Simpan PDF ke file
    $pdf->Output('invoice.pdf', 'D');
}

// Contoh pemanggilan fungsi
//createPDF('ABC123', 'Kamera Digital', 5000000, 2);
?>
