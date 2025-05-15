<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Struk Pembelian</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto+Mono&display=swap');

        body {
            font-family: 'Roboto Mono', monospace, 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            background: #f2f4f7;
            color: #333;
            -webkit-print-color-adjust: exact;
        }
        .receipt-container {
            max-width: 380px;
            background: #fff;
            margin: 30px auto;
            padding: 25px 30px;
            border-radius: 10px;
            box-shadow: 0 6px 18px rgba(0,0,0,0.12);
            border: 1px solid #ddd;
        }
        .header {
            text-align: center;
            border-bottom: 2px dashed #bbb;
            padding-bottom: 15px;
            margin-bottom: 20px;
        }
        .header h2 {
            margin: 0;
            font-size: 26px;
            color: #2c3e50;
            letter-spacing: 2px;
        }
        .header small {
            display: block;
            margin-top: 5px;
            color: #7f8c8d;
            font-weight: 600;
            font-size: 13px;
            letter-spacing: 1px;
        }
        .info {
            font-size: 14px;
            margin-bottom: 20px;
            color: #4a4a4a;
        }
        .info b {
            display: inline-block;
            width: 90px;
            font-weight: 600;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
            margin-bottom: 20px;
        }
        thead th {
            border-bottom: 2px solid #bbb;
            padding-bottom: 8px;
            color: #34495e;
            font-weight: 700;
        }
        tbody td {
            padding: 8px 4px;
            border-bottom: 1px solid #eee;
        }
        tbody tr:last-child td {
            border-bottom: none;
        }
        td.qty, td.price, td.subtotal {
            text-align: right;
            font-variant-numeric: tabular-nums;
        }
        tfoot td {
            padding-top: 12px;
            font-weight: 700;
            border-top: 2px dashed #999;
            font-size: 16px;
            color: #2c3e50;
            text-align: right;
        }
        tfoot td:first-child {
            text-align: left;
        }
        .footer {
            text-align: center;
            font-size: 13px;
            color: #7f8c8d;
            border-top: 2px dashed #bbb;
            padding-top: 15px;
            font-style: italic;
        }

        @media print {
            body {
                background: white;
            }
            .receipt-container {
                box-shadow: none;
                border: none;
                margin: 0;
                max-width: 100%;
                border-radius: 0;
                padding: 15px;
            }
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
                <th class="price">Harga</th>
                <th class="qty">Qty</th>
                <th class="subtotal">Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transaksi->transaksiDetail as $detail)
            <tr>
                <td>{{ $detail->produk->name }}</td>
                <td class="price">{{ 'Rp ' . number_format($detail->produk->harga, 0, ',', '.') }}</td>
                <td class="qty">{{ $detail->qty }}</td>
                <td class="subtotal">{{ 'Rp ' . number_format($detail->subtotal, 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3">Total</td>
                <td>Rp {{ number_format($transaksi->total, 0, ',', '.') }}</td>
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
