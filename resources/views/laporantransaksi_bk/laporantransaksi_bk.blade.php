@extends('main')
@section('style')
    <style>
        .rata-kanan {
            text-align: right;
        }
    </style>
@endsection
@section('content')
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Hyper</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Laporan</a></li>
                                <li class="breadcrumb-item active">Laporan Transaksi Barang Keluar</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Laporan Barang Keluar</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-2">
                                <div class="col-sm-5"></div>
                                <div class="col-sm-7">
                                    <form id="exportForm" action="{{ route('exportexcel_laporantbk') }}" method="GET">
                                        <div class="text-sm-end">
                                            {{-- <button type="button" class="btn btn-success mb-2 me-1"><i
                                                    class="mdi mdi-cog-outline"></i></button> --}}
                                            <button type="submit" class="btn btn-light mb-2 me-1"><i class="uil-print"></i>
                                                Excel</button>
                                            <a href="#" class="btn btn-primary mb-2 me-1"
                                                onclick="exportPDFWithDates()"><i class="uil-print"></i>PDF</a>
                                        </div>
                                </div><!-- end col-->
                            </div>
                            <div class="row mb-2">
                                <div class="row mb-3">
                                    <div class="col-md-2">
                                        <label for="tanggalAwal" class="form-label form-inline">Tanggal Awal :</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="date" id="tanggalAwal" name="tanggalAwal" class="form-control"
                                            placeholder="Tanggal">
                                    </div>
                                    <div class="col md-2"></div>
                                    <div class="col-md-2">
                                        <label for="tanggalAkhir" class="form-label form-inline">Tanggal Akhir :</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="date" id="tanggalAkhir" name="tanggalAkhir" class="form-control"
                                            placeholder="Tanggal">
                                    </div>
                                    <div class="col md-2">
                                        <button type="button" class="btn btn-success"
                                            onclick="tampilkanData()">Filter</button>
                                    </div>
                                </div>
                            </div>
                            </form>
                            <div class="table-responsive">
                                <table class="table table-centered w-100 dt-responsive nowrap" id="products-datatable">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Kode Transaksi</th>
                                            <th>Tanggal</th>
                                            <th>Nama Kasir</th>
                                            <th>Customer</th>
                                            <th>Diskon</th>
                                            <th>Jumlah Bayar</th>
                                            <th>Dibayar</th>
                                            <th>Kembalian</th>
                                            <th></th>
                                        </tr>
                                    </thead>

                                    <?php
                                    $totalTotalBayar = 0;
                                    $totalDibayar = 0;
                                    $totalKembalian = 0;
                                    ?>

                                    <tbody id="laporanbarang">
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
                                            $totalTotalBayar += $item->total_bayar;
                                            $totalDibayar += $item->dibayar;
                                            $totalKembalian += $item->kembalian;
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
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col -->
            </div><!-- end row -->
        </div> <!-- container -->
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        function formatNumber(number) {
            return new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR'
            }).format(number);
        }

        function tampilkanData(kode) {
            const tanggalAwal = document.getElementById('tanggalAwal').value;
            const tanggalAkhir = document.getElementById('tanggalAkhir').value;
            const hasilData = document.getElementById('laporanbarang');
            hasilData.innerHTML = '';

            fetch(`/admin/laporan_tbk/get_data?tanggalAwal=${tanggalAwal}&tanggalAkhir=${tanggalAkhir}`)
                .then(response => response.json())
                .then(dataTerfilter => {
                    if (dataTerfilter.length > 0) {
                        let tableHTML = '<table class="table table-centered w-100 dt-responsive nowrap">';
                        tableHTML += '<tbody>';

                        let totalTotalBayar = 0;
                        let totalDibayar = 0;
                        let totalKembalian = 0;

                        dataTerfilter.forEach(item => {
                            tableHTML += '<tr>';
                            tableHTML += `<td>${item.kode_transaksi}</td>`;
                            tableHTML += `<td>${item.tanggal_tbk}</td>`;
                            tableHTML += `<td>${item.user ? item.user.User_name : 'N/A'}</td>`;
                            tableHTML += `<td>${item.customer}</td>`;
                            tableHTML += `<td class="rata-kanan">${item.diskon_tbk}</td>`;
                            tableHTML +=
                                `<td class="rata-kanan">${formatNumber(item.total_bayar)}</td>`;
                            tableHTML +=
                                `<td class="rata-kanan">${formatNumber(item.dibayar)}</td>`;
                            tableHTML +=
                                `<td class="rata-kanan">${formatNumber(item.kembalian)}</td>`;

                            totalTotalBayar += item.total_bayar;
                            totalDibayar += item.dibayar;
                            totalKembalian += item.kembalian;
                        });

                        const totalTotalBayarElem = document.getElementById('totalTotalBayar');
                        const totalDibayarElem = document.getElementById('totalDibayar');
                        const totalKembalianElem = document.getElementById('totalKembalian');

                        totalTotalBayarElem.innerText = formatNumber(totalTotalBayar);
                        totalDibayarElem.innerText = formatNumber(totalDibayar);
                        totalKembalianElem.innerText = formatNumber(totalKembalian);

                        hasilData.innerHTML = tableHTML;
                    } else {
                        hasilData.innerHTML = 'Tidak ada data pada rentang tanggal yang dipilih.';
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    hasilData.innerHTML = 'Terjadi kesalahan saat memuat data.';
                });
        }

        function exportPDFWithDates() {
            var tanggalAwal = document.getElementById('tanggalAwal').value;
            var tanggalAkhir = document.getElementById('tanggalAkhir').value;

            var pdfURL = "{{ route('exportpdf_laporantbk') }}" + "?tanggalAwal=" + tanggalAwal + "&tanggalAkhir=" +
                tanggalAkhir;

            window.location.href = pdfURL;
        }
    </script>
@endsection
