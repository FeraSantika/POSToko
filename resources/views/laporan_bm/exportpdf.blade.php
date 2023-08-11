<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Laporan Barang Masuk</title>
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
            @if ($tglAwal && $tglAkhir)
                <p>Rentang Tanggal: {{ $tglAwal }} hingga {{ $tglAkhir }}</p>
            @else
                <p>Rentang Tanggal: Data tanggal tidak diinputkan</p>
            @endif
        </div>
        <h4>Laporan Barang Masuk</h4>
        <div class="table-responsive">
            <table>
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Kategori</th>
                        <th>Terbeli</th>
                    </tr>
                </thead>
                <?php
                $total = 0;
                ?>
                <tbody id="laporanbarang">
                    @foreach ($bm as $kodeBarang => $group)
                        <tr>
                            <td>
                                {{ $loop->iteration }}
                            </td>
                            @foreach ($group->barang as $barang)
                                <td>
                                    {{ $barang->nama_barang }}
                                </td>
                                <td>
                                    {{ $barang->kategori->nama_kategori }}
                                </td>
                            @endforeach
                            <td>
                                {{ $group->jumlahbm }}
                            </td>
                        </tr>
                        <?php
                        $total += $group->jumlahbm;
                        ?>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3">Grand Total : </td>
                        <td id="total">{{ $total }}</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</body>

</html>
