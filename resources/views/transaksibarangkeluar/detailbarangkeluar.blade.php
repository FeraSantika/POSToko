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
                                <li class="breadcrumb-item active">Data Barang Keluar</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Detail Data Barang Keluar</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <form action="" method="POST" id="form_transaksi">
                            <div class="card-body">
                                <div class="row mb-2">
                                    <div class="row mb-3">
                                        <div class="col-md-6 mb-3">
                                            <label for="no.transaksi" class="form-label">No. Transaksi :
                                                {{ $transaksi_bk->kode_transaksi }}</label>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="customer" class="form-label">Nama Customer :
                                                {{ $transaksi_bk->customer }}</label>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6 mb-3">
                                            <label for="tanggal" class="form-label">Tanggal :
                                                {{ $transaksi_bk->tanggal_tbk }}</label>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="kasir" class="form-label">Kasir :
                                                {{ $transaksi_bk->user->User_name }}</label>
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
                                            <th>Diskon</th>
                                            <th>Harga</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($transaksi_bk->list as $bk)
                                            <tr>
                                                <td>
                                                    @foreach ($bk->barang as $barang)
                                                        {{ $barang->kode_barang }}
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @foreach ($bk->barang as $barang)
                                                        {{ $barang->nama_barang }}
                                                    @endforeach
                                                </td>
                                                <td>{{ $bk->jumlah_bk }}</td>
                                                <td>{{ $bk->diskon_bk }}%</td>
                                                <td>{{ number_format($bk->harga_jual, 0, ',', '.') }}</td>
                                                <td class="subtotal" id="total">
                                                    {{ number_format($bk->harga_jual * $bk->jumlah_bk - ($bk->harga_jual * $bk->jumlah_bk * $bk->diskon_bk) / 100, 0, ',', '.') }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="row mb-3 mt-2 m-3">
                                    <div class="col-md-2">
                                        <label for="diskon" class="form-label-md-6">Diskon :
                                            {{ $transaksi_bk->diskon_tbk }}</label>
                                    </div>
                                </div>
                                <div class="row mb-3 m-3">
                                    <div class="col-md-2">
                                        <label for="totalbayar" class="form-label-md-6">Total Bayar :
                                            {{ number_format($transaksi_bk->total_bayar, 0, ',', '.') }}</label>
                                    </div>
                                </div>
                                <div class="row mb-3 m-3">
                                    <div class="col-md-2">
                                        <label for="dibayar" class="form-label-md-6">Dibayar :
                                            {{ number_format($transaksi_bk->dibayar, 0, ',', '.') }}</label>
                                    </div>
                                </div>
                                <div class="row mb-3 m-3">
                                    <div class="col-md-2">
                                        <label for="kembalian" class="form-label-md-6">Kembalian :
                                            {{ number_format($transaksi_bk->kembalian, 0, ',', '.') }}</label>
                                    </div>
                                </div>
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
            return number.toLocaleString('id-ID');
        }

        function updateGrandTotal() {
            let grandTotal = 0;
            $(".subtotal").each(function() {
                const subtotal = $(this).text().replace('.', '')
                grandTotal += parseFloat(subtotal);
            });
            const formattedGrandTotal = formatNumber(grandTotal);
            $("#grandTotal").text(formattedGrandTotal.replace(/,/g, '.'));
            $("#totalbayar").val("Rp " + formattedGrandTotal + ",-");
        }
    </script>
@endsection
