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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Master Menu</a></li>
                                <li class="breadcrumb-item active">Laporan Barang Keluar</li>
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
                                    <form action="{{ route('export_laporanbk') }}" method="GET">
                                        <div class="text-sm-end">
                                            <button type="button" class="btn btn-success mb-2 me-1"><i
                                                    class="mdi mdi-cog-outline"></i></button>
                                            <button type="button" class="btn btn-light mb-2 me-1">Import</button>
                                            <button type="submit"
                                                class="btn btn-light mb-2">Export</button>
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
                                        <button type="button" class="btn btn-primary"
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
                                                    {{ number_format($item->total_bayar, 0, ',', '.') }}
                                                </td>
                                                <td id="dibayar" class="rata-kanan">
                                                    {{ number_format($item->dibayar, 0, ',', '.') }}
                                                </td>
                                                <td id="kembalian" class="rata-kanan">
                                                    {{ number_format($item->kembalian, 0, ',', '.') }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
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

        function printResi(kode) {
            var printWindow = window.open('{{ route('cetak.resi', ['bk_id' => ':bk_id']) }}'.replace(':bk_id', kode),
                'width=800,height=600');
            printWindow.onload = function() {
                printWindow.print();
            };
        }

        function tampilkanData(kode) {
            const tanggalAwal = document.getElementById('tanggalAwal').value;
            const tanggalAkhir = document.getElementById('tanggalAkhir').value;
            const hasilData = document.getElementById('laporanbarang');
            hasilData.innerHTML = '';

            fetch(`/admin/laporan_bk/get_data?tanggalAwal=${tanggalAwal}&tanggalAkhir=${tanggalAkhir}`)
                .then(response => response.json())
                .then(dataTerfilter => {
                    if (dataTerfilter.length > 0) {
                        let tableHTML = '<table class="table table-centered w-100 dt-responsive nowrap">';
                        tableHTML += '<tbody>';

                        dataTerfilter.forEach(item => {
                            tableHTML += '<tr>';
                            tableHTML += `<td>${item.kode_transaksi}</td>`;
                            tableHTML += `<td>${item.tanggal_tbk}</td>`;
                            tableHTML += `<td>${item.user ? item.user.User_name : 'N/A'}</td>`;
                            tableHTML += `<td>${item.customer}</td>`;
                            tableHTML += `<td class="rata-kanan">${item.diskon_tbk}</td>`;
                            tableHTML += `<td class="rata-kanan">${formatNumber(item.total_bayar)}</td>`;
                            tableHTML += `<td class="rata-kanan">${formatNumber(item.dibayar)}</td>`;
                            tableHTML += `<td class="rata-kanan">${formatNumber(item.kembalian)}</td>`;
                            tableHTML += '</tr>';
                        });

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
    </script>
@endsection
