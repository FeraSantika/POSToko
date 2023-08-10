<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Laporan Transaksi Barang Keluar</title>
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
        <h4>Laporan Transaksi Barang Keluar</h4>
        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>Kode Transaksi</th>
                        <th>Tanggal</th>
                        <th>Nama Kasir</th>
                        <th>Customer</th>
                        <th>Diskon</th>
                        <th>Jumlah Bayar</th>
                        <th>Dibayar</th>
                        <th>Kembalian</th>
                    </tr>
                </thead>

                <?php
                $totalTotalBayar = 0;
                $totalDibayar = 0;
                $totalKembalian = 0;
                ?>

                <tbody>
                    @foreach ($dtbarangkeluar as $item)
                        <tr>
                            <td>
                                {{ $item->kode_transaksi }}
                            </td>
                            <td>
                                {{ $item->tanggal_tbk }}
                            </td>
                            <td>
                                @if ($item->user)
                                    {{ $item->user->User_name }}
                                @else
                                    N/A
                                @endif
                            </td>
                            <td>
                                {{ $item->customer }}
                            </td>
                            <td id="diskon_tbk" class="rata-kanan">
                                {{ $item->diskon_tbk }}
                            </td>
                            <td id="total_bayar" class="rata-kanan">
                                Rp {{ number_format($item->total_bayar, 0, ',', '.') }}
                            </td>
                            <td id="dibayar" class="rata-kanan">
                                Rp {{ number_format($item->dibayar, 0, ',', '.') }}
                            </td>
                            <td id="kembalian" class="rata-kanan">
                                Rp {{ number_format($item->kembalian, 0, ',', '.') }}
                            </td>
                        </tr>

                        <?php
                        $totalTotalBayar = $item->total_bayar;
                        $totalDibayar = $item->dibayar;
                        $totalKembalian = $item->kembalian;
                        ?>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="5"> Grand Total : </td>
                        <td id="totalTotalBayar" class="rata-kanan">
                            Rp {{ number_format($totalTotalBayar, 0, ',', '.') }}</td>
                        <td id="totalDibayar" class="rata-kanan">
                            Rp {{ number_format($totalDibayar, 0, ',', '.') }}</td>
                        <td id="totalKembalian" class="rata-kanan">
                            Rp {{ number_format($totalKembalian, 0, ',', '.') }}</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</body>

</html>
