@extends('main')
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
                                <li class="breadcrumb-item active">Barang</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Barang Masuk</h4>
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
                                    <form  id="exportForm" action="{{ route('exportexcel_laporanbm') }}" method="GET">
                                        <div class="text-sm-end">
                                            <button type="button" class="btn btn-success mb-2 me-1"><i
                                                    class="mdi mdi-cog-outline"></i></button>
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
                                            <td colspan="2">Grand Total : </td>
                                            <td id="total">{{ $total }}</td>
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
        function tampilkanData(kode) {
            const tanggalAwal = document.getElementById('tanggalAwal').value;
            const tanggalAkhir = document.getElementById('tanggalAkhir').value;
            const hasilData = document.getElementById('laporanbarang');
            hasilData.innerHTML = '';
            const totaljualElem = document.getElementById('total');

            fetch(`/admin/laporan_bm/get_data?tanggalAwal=${tanggalAwal}&tanggalAkhir=${tanggalAkhir}`)
                .then(response => response.json())
                .then(dataTerfilter => {
                    if (dataTerfilter.length > 0) {
                        let tableHTML = '<table class="table table-centered w-100 dt-responsive nowrap">';
                        tableHTML += '<tbody>';

                        let totaljual = 0;

                        dataTerfilter.forEach(group => {
                            if (Array.isArray(group.barang)) {
                                group.barang.forEach(barang => {
                                    tableHTML += '<tr>';
                                    tableHTML += `<td>${barang.nama_barang}</td>`;
                                    tableHTML += `<td>${barang.kategori.nama_kategori}</td>`;
                                    tableHTML += `<td>${group.jumlahbm}</td>`;
                                    tableHTML += '</tr>';
                                    totaljual += parseInt(group.jumlahbm);
                                });
                            }
                        });
                        totaljualElem.innerText = totaljual;
                        tableHTML += '</tbody> </table>';
                        hasilData.innerHTML = tableHTML;
                    } else {
                        hasilData.innerHTML = 'Tidak ada data pada rentang tanggal yang dipilih.';
                    }
                })
                .catch(error => {
                    console.error('Error:'.error);
                    hasilData.innerHTML = 'Terjadi kesalahan saat memuat data.';
                });
        }

        function exportPDFWithDates() {
            var tanggalAwal = document.getElementById('tanggalAwal').value;
            var tanggalAkhir = document.getElementById('tanggalAkhir').value;

            var pdfURL = "{{ route('exportpdf_laporanbm') }}" + "?tanggalAwal=" + tanggalAwal + "&tanggalAkhir=" +
                tanggalAkhir;

            window.location.href = pdfURL;
        }
    </script>
@endsection
