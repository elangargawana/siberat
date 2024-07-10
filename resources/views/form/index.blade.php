<?php
include "koneksi.php";

if(isset($_POST['proses'])){
    // Simpan data ke database
    mysqli_query($koneksi, "INSERT INTO buatform (kode_barang, nama_barang, harga_barang, nama_klien, alamat_klien, jumlah_barang) 
                            VALUES ('$_POST[kode_barang]', '$_POST[nama_barang]', '$_POST[harga_barang]', '$_POST[nama_klien]', '$_POST[alamat_klien]', '$_POST[jumlah_barang]')");

    // Tampilkan pesan konfirmasi
    echo "Data barang baru telah tersimpan";

    // Bersihkan output buffer
    ob_clean();

    // Panggil fungsi untuk membuat PDF
    include "create_pdf.php";
    createPDF($_POST['kode_barang'], $_POST['nama_barang'], $_POST['harga_barang'], $_POST['nama_klien'], $_POST['alamat_klien'], $_POST['jumlah_barang']);
}
?>

<h3>Tambah Barang</h3>

<form action="" method="post">
    <table>
        <tr>
            <td width="120">Kode Barang</td>
            <td><input type="text" name="kode_barang"></td>
        </tr>
        <tr>
            <td>Nama Barang</td>
            <td><input type="text" name="nama_barang"></td>
        </tr>
        <tr>
            <td>Harga</td>
            <td><input type="text" name="harga_barang"></td>
        </tr>
        <tr>
            <td>Nama Klien</td>
            <td><input type="text" name="nama_klien"></td>
        </tr>
        <tr>
            <td>Alamat Klien</td>
            <td><input type="text" name="alamat_klien"></td>
        </tr>
        <tr>
            <td>Jumlah Barang</td>
            <td><input type="text" name="jumlah_barang"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="proses" value="Simpan"></td>
        </tr>
    </table>
</form>
