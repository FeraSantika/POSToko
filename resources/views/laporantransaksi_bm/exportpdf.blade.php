<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Laporan Transaksi Barang Masuk</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
            margin: 0;
            padding: 0;
        }

        .container {
            margin: 20px;
        }

        .card-title {
            font-size: 20px;
        }

        h4 {
            text-align: center;
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }

        tfoot td {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="d-flex align-items-center mb-3">
            <h3 class="card-title text-primary">Nama Toko</h3>
        </div>
        <h4>Laporan Transaksi Barang Masuk</h4>
        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>Kode Transaksi</th>
                        <th>Tanggal</th>
                        <th>Supplier</th>
                        <th>Total</th>
                    </tr>
                </thead>

                <?php
                $grandTotal = 0;
                ?>

                <tbody>
                    @foreach ($dtbarangmasuk as $item)
                        <tr>
                            <td>
                                {{ $item->kode_transaksi }}
                            </td>
                            <td>
                                {{ $item->tanggal_tbm }}
                            </td>
                            <td>
                                {{ $item->supplier->nama_supplier }}
                            </td>
                            <td>
                                Rp. {{ number_format($item->harga_total, 0, ',', '.') }}
                            </td>
                        </tr>

                        <?php
                        $grandTotal += $item->harga_total;
                        ?>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3"> Grand Total : </td>
                        <td id="grandTotal">
                            Rp. {{ number_format($grandTotal, 0, ',', '.') }}</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</body>

</html>
