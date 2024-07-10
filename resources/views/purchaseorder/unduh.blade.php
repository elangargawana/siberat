<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Invoice</title>

    <style>
        /* Styles for invoice */
        body {
            font-family: 'Times New Roman', Times, serif;
            font-size: 14px;
            line-height: 1.5;
            color: #000;
            margin: 0;
            padding: 0;
        }

        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #ddd;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
            border-collapse: collapse;
        }

        .invoice-box table th,
        .invoice-box table td {
            padding: 8px;
            vertical-align: top;
            border: 1px solid #ddd;
        }

        .invoice-box table th {
            background-color: #f2f2f2;
            font-weight: bold;
            text-align: center;
        }

        .invoice-box table td {
            text-align: center;
        }

        .invoice-box table tr.heading td {
            background: #f9f9f9;
            font-weight: bold;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td {
            font-weight: bold;
            border-top: 2px solid #ddd;
        }

        .invoice-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .invoice-header h1 {
            margin: 0;
            font-size: 36px;
            line-height: 36px;
            color: #333;
        }

        .invoice-header p {
            margin: 5px 0;
            font-size: 14px;
        }

        .invoice-to {
            margin-bottom: 20px;
        }

        .invoice-to p {
            margin: 5px 0;
        }

        .invoice-table {
            margin-bottom: 20px;
        }

        .invoice-total {
            text-align: right;
        }

        .invoice-footer {
            text-align: right;
            margin-top: 20px;
            font-size: 12px;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="invoice-box">
        <div class="invoice-header">
            <h1>INVOICE</h1>
            <p>Nomor Purchase Order: {{ $purchaseOrder->nomor }}</p>
            <p>Tanggal: {{ $purchaseOrder->created_at->format('d F, Y') }}</p>
        </div>

        <div class="invoice-to">
            <p>Kepada:</p>
            <p>Penerima: {{ $purchaseOrder->penawaran->konsumen->pic }} {{ $purchaseOrder->penawaran->konsumen->perusahaan }}</p>
            <p>Alamat: {{ $purchaseOrder->penawaran->konsumen->alamat }}</p>
            <p>Nomor Telepon: {{ $purchaseOrder->penawaran->konsumen->no_telp }}</p>
        </div>

        <table class="invoice-table">
            <thead>
                <tr class="heading">
                    <th>Barang</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($purchaseOrder->penawaran->detailPenawaran as $detail)
                <tr class="item">
                    <td>{{ $detail->barang->nama }}</td>
                    <td>{{ $detail->kuantitas }}</td>
                    <td>Rp.{{ number_format($detail->harga_per_barang, 2) }}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr class="total">
                    <td colspan="2">Total</td>
                    <td>Rp.{{ number_format($purchaseOrder->penawaran->total_harga, 2) }}</td>
                </tr>
            </tfoot>
        </table>

        <div class="invoice-total">
            <p>Nama Bank: Siberat</p>
            <p>Nomor Rekening: 0123 4567 8901</p>
        </div>

        <div class="invoice-footer">
            <p>&copy; 2024 Siberat. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
