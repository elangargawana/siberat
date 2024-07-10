<!DOCTYPE html>
<html>
<head>
    <title>Surat Penawaran</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            font-size: 14px;
            line-height: 1.5; /* Mengatur line spacing menjadi 1.5 */
            color: #333;
            margin: 40px;
        }
        .container {
            width: 100%;
            margin: auto;
            padding: 20px;
            
        }
        header {
            text-align: center;
        }
        .row {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        #img {
            flex: 1;
        }
        #text-header {
            flex: 2;
        }
        #logo {
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
        h1, h3, h5, h6 {
            text-align: center;
            margin: 5px 0;
        }
        .date {
            text-align: right;
            margin-top: 5px;
            margin-bottom: 20px;
        }
        .perihal {
            margin: 0; /* Menghapus margin atas dan bawah */
        }
        .address {
            margin-top: 20px;
        }
        .address p {
            margin: 0 0 10px;
        }
        h1 {
            font-size: 24px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
            text-align: center;
        }
        .text-right {
            text-align: right;
        }
        .signature {
            margin-top: 50px;
            text-align: right;
        }
        .footer {
            margin-top: 15px;
            text-align: right;
            font-size: 12px;
            color: #666;
        }
        .garis1 {
            border-top: 3px solid black;
            height: 2px;
            border-bottom: 1px solid black;
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <div class="row">
                <div id="text-header" class="col-md-9">
                    <h1 class="nama">PT. SIBERAT BERAT</h1>
                    <h3 class="slogan"><strong>Pusat Penjualan Alat Berat</strong></h3>
                    <h6 class="alamatlogo">Jl. Berat Banget, No. 01, Telepon (0723) 523024</h6>
                    <h5 class="kodeposlogo"><strong>Tembalang 50552</strong></h5>
                </div>
            </div>
        </header>

        <div class="garis1"></div>
        
        <div class="date">
            <p>Semarang, {{ \Carbon\Carbon::now()->format('d F Y') }}</p>
        </div>
        <div class="nomor">
            <p><strong>Nomor:</strong> PE - 8F16941</p>
            <p><strong>Lampiran:</strong> -</p>
            <p><strong>Perihal:</strong> Penawaran Barang</p>
        </div>
        <div class="address">
            <p>Yth. Bapak/Ibu {{ $penawaran->konsumen->pic }} {{ $penawaran->konsumen->perusahaan }}</p>
            <p>{{ $penawaran->konsumen->alamat }}</p>
            <p>di tempat</p>
        </div>
        
        <h1>Surat Penawaran</h1>
        
        <p>Dengan hormat,</p>
        <p>Bersama surat ini, kami dari Siberat ingin mengajukan penawaran beberapa barang kepada Ibu/Bapak {{ $penawaran->konsumen->nama }}. Berikut adalah rincian barang yang kami tawarkan:</p>
        
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Kuantitas</th>
                    <th>Harga Satuan</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($penawaran->detailPenawaran as $index => $detail)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $detail->barang->nama }}</td>
                        <td>{{ $detail->kuantitas }}</td>
                        <td>Rp. {{ number_format($detail->harga_per_barang, 2, ',', '.') }}</td>
                        <td>Rp. {{ number_format($detail->kuantitas * $detail->harga_per_barang, 2, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4" class="text-right"><strong>Total Keseluruhan</strong></td>
                    <td><strong>Rp. {{ number_format($penawaran->total_harga, 2, ',', '.') }}</strong></td>
                </tr>
            </tfoot>
        </table>
        
        <p>Demikian surat penawaran ini kami buat. Kami berharap dapat menjalin kerjasama yang baik dengan Anda. Apabila Bapak/Ibu tertarik dengan penawaran kami, silakan menghubungi kami di nomor telepon atau email yang tertera di bawah ini.</p>
        
        <div class="signature">
            <p>Hormat kami,</p>
            <p><strong>Siberat</strong></p>
        </div>
    </div>
</body>
</html>
