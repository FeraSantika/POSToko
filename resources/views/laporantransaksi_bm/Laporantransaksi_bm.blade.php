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
                                <li class="breadcrumb-item active">Laporan Transaksi Barang Masuk</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Transaksi Barang Masuk</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form id="exportForm" action="{{ route('exportexcel_laporantbm') }}" method="GET">
                                <div class="row mb-2">
                                    <div class="col-sm-5"></div>
                                    <div class="col-sm-7">
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
                                            <input type="date" id="tanggalAwal" name="tanggalAwal" class="form-control">
                                        </div>
                                        <div class="col md-2"></div>
                                        <div class="col-md-2">
                                            <label for="tanggalAkhir" class="form-label form-inline">Tanggal Akhir :</label>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="date" id="tanggalAkhir" name="tanggalAkhir"
                                                class="form-control">
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
                                            <th>Supplier</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>

                                    <?php
                                    $grandTotal = 0;
                                    ?>

                                    <tbody id="laporanbarangmasuk">
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
                                                    Rp {{ number_format($item->harga_total, 0, ',', '.') }}
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
                                                Rp {{ number_format($grandTotal, 0, ',', '.') }}</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col -->
            </div>
            <!-- end row -->
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
            const hasilData = document.getElementById('laporanbarangmasuk');
            hasilData.innerHTML = '';

            fetch(`/admin/laporan_tbm/get_data?tanggalAwal=${tanggalAwal}&tanggalAkhir=${tanggalAkhir}`)
                .then(response => response.json())
                .then(dataTerfilter => {
                    if (dataTerfilter.length > 0) {
                        let tableHTML = '<table class="table table-centered w-100 dt-responsive nowrap">';
                        tableHTML += '<tbody>';

                        let grandTotal = 0;

                        dataTerfilter.forEach(item => {
                            tableHTML += '<tr>';
                            tableHTML += `<td>${item.kode_transaksi}</td>`;
                            tableHTML += `<td>${item.tanggal_tbm}</td>`;
                            tableHTML += `<td>${item.supplier ? item.supplier.nama_supplier : 'N/A'}</td>`;
                            tableHTML += `<td>${formatNumber(item.harga_total)}</td>`;
                            tableHTML += '</tr>';

                            grandTotal += item.harga_total;
                        });

                        const grandTotalElem = document.getElementById('grandTotal');
                        grandTotalElem.innerText = formatNumber(grandTotal);

                        tableHTML += '</tbody> </table>';
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

            var pdfURL = "{{ route('exportpdf_laporantbm') }}" + "?tanggalAwal=" + tanggalAwal + "&tanggalAkhir=" +
                tanggalAkhir;

            window.location.href = pdfURL;
        }
    </script>
@endsection
