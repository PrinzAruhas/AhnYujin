<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk Pembelian</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            background: #f8f9fa;
        }
        .receipt-container {
            max-width: 360px;
            background: white;
            margin: 30px auto;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            border-bottom: 1px dashed #ccc;
            padding-bottom: 10px;
            margin-bottom: 15px;
        }
        .header h2 {
            margin: 0;
            font-size: 22px;
        }
        .header small {
            color: #555;
        }
        .info {
            font-size: 14px;
            margin-bottom: 15px;
        }
        .info b {
            display: inline-block;
            width: 80px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
            margin-bottom: 15px;
        }
        th, td {
            padding: 6px;
            text-align: left;
        }
        thead {
            border-bottom: 1px solid #ccc;
        }
        tfoot {
            border-top: 1px dashed #999;
            font-weight: bold;
        }
        .footer {
            text-align: center;
            font-size: 12px;
            color: #666;
            border-top: 1px dashed #ccc;
            padding-top: 10px;
        }
    </style>
</head>
<body>

<div class="receipt-container">
    <div class="header">
        <h2>Struk Pembelian</h2>
        <small>Nomor Transaksi: {{ $transaksi->id }}</small>
    </div>

    <div class="info">
        <div><b>Kasir</b>: {{ $transaksi->kasir_name }}</div>
        <div><b>Tanggal</b>: {{ $transaksi->created_at->format('d-m-Y H:i') }}</div>
    </div>

    <table>
        <thead>
            <tr>
                <th>Produk</th>
                <th>Harga</th>
                <th>Qty</th>
                <th style="text-align: right;">Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transaksi->transaksiDetail as $detail)
            <tr>
                <td>{{ $detail->produk->name }}</td>
                <td>{{ 'Rp ' . number_format($detail->produk->harga, 0, ',', '.') }}</td>
                <td>{{ $detail->qty }}</td>
                <td style="text-align: right;">{{ 'Rp ' . number_format($detail->subtotal, 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3">Total</td>
                <td style="text-align: right;">Rp {{ number_format($transaksi->total, 0, ',', '.') }}</td>
            </tr>
        </tfoot>
    </table>

    <div class="footer">
        Terima kasih atas belanja Anda!<br>
        Semoga harimu menyenangkan 😊
    </div>
</div>

<script>
    window.print();
</script>

</body>
</html>
