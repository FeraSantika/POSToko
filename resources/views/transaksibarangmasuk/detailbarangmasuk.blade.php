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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Transaksi</a></li>
                                <li class="breadcrumb-item active">Data Barang Masuk</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Detail Data Barang Masuk</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <form action="" method="POST" id="form_transaksi">
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-md-4 mb-3">
                                        <label for="no.transaksi" class="form-label">No. Transaksi :
                                            {{ $transaksi_bm->kode_transaksi }}</label>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-4 mb-3">
                                            <label for="supplier" class="form-label">Nama Supplier :
                                                {{ $transaksi_bm->supplier->nama_supplier }}</label>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for="tanggal" class="form-label">Tanggal :
                                                    {{ $transaksi_bm->tanggal_tbm }}</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-centered w-100 dt-responsive nowrap m-3">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Kode</th>
                                                <th>Barang</th>
                                                <th>Qty</th>
                                                <th>Harga Jual</th>
                                                <th>Harga Beli</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody id="barangList">
                                            @foreach ($transaksi_bm->list as $bm)
                                                <tr>
                                                    <td>
                                                        @foreach ($bm->barang as $barang)
                                                            {{ $barang->kode_barang }}
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        @foreach ($bm->barang as $barang)
                                                            {{ $barang->nama_barang }}
                                                        @endforeach
                                                    </td>
                                                    <td>{{ $bm->jumlah_bm }}</td>
                                                    <td>{{ number_format($bm->harga_jual, 0, ',', '.') }}</td>
                                                    <td>{{ number_format($bm->harga_beli, 0, ',', '.') }}</td>
                                                    <td class="subtotal" id="total">
                                                        {{ number_format($bm->harga_beli * $bm->jumlah_bm, 0, ',', '.') }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tbody>
                                            <tr>
                                                <td colspan="5">Grand Total</td>
                                                <td id="grandTotal" colspan="2">
                                                    {{ number_format($transaksi_bm->harga_total, 0, ',', '.') }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                        </form>
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
            if (number === undefined) {
                return "Invalid Number";
            }
            return number.toLocaleString('id-ID');
        }
    </script>
@endsection
