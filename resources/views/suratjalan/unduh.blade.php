<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Jalan</title>
    <style>
        /* Styles for surat jalan */
        body {
            font-family: 'Times New Roman', Times, serif;
            font-size: 14px;
            line-height: 1.5;
            margin: 0;
            padding: 0;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
            font-family: 'Times New Roman', Times, serif;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        .header {
            text-align: center;
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 20px;
        }

    </style>
</head>
<body>

<div class="header">
    <h1>SURAT JALAN</h1>
    <p>Nomor Surat Jalan: {{ $suratJalan->nomor }}</p>
    <p>Tanggal: {{ $suratJalan->purchaseOrder->created_at->format('d F, Y') }}</p>
</div>

<table>
    <tr>
        <td colspan="2"><b>KEPADA:</b></td>
        <td colspan="2"><b>DARI:</b></td>
    </tr>
    <tr>
        <td colspan="2">{{ optional($suratJalan->purchaseOrder->penawaran->konsumen)->pic }}</td>
        <td colspan="2">SIBERAT</td>
    </tr>
    <tr>
        <td colspan="2">{{ $suratJalan->alamat_tujuan }}</td>
        <td colspan="2">Jl Polines</td>
    </tr>
    <tr>
        <td colspan="2">Nomor Telepon: {{ optional($suratJalan->purchaseOrder->penawaran->konsumen)->no_telp }}</td>
        <td colspan="2">Nomor Telepon: 08122333443 </td>
    </tr>
</table>

<table>
    <tr>
        <th>Nama Barang</th>
        <th>Kuantitas</th>
        <th>Harga per Barang</th>
    </tr>
    @foreach ($suratJalan->purchaseOrder->penawaran->detailPenawaran as $detail)
    <tr>
        <td>{{ $detail->barang->nama }}</td>
        <td>{{ $detail->kuantitas }}</td>
        <td>Rp.{{ number_format($detail->harga_per_barang, 2) }}</td> 
    </tr>
    @endforeach
</table>

<table>
    <tr>
        <td colspan="2" align="right"><b>Total Harga</b></td>
        <td><b>Rp.{{ number_format($suratJalan->purchaseOrder->penawaran->total_harga, 2) }}</b></td>
    </tr>
</table>

<table>
    <tr>
        <td width="25%">Dibuat Oleh:</td>
        <td width="25%">Disetujui Oleh:</td>
        <td width="25%">Dikirim Oleh:</td>
        <td width="25%">Diterima Oleh:</td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
</table>

</body>
</html>
