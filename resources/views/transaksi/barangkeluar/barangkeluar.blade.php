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
                        <h4 class="page-title">Data Barang Keluar</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-2">
                                <div class="row mb-3">
                                    <div class="col-md-4 mb-3">
                                        <label for="no.transaksi" class="form-label">No. Transaksi</label>
                                        <input type="text" id="no.transaksi" name="no.transaksi" class="form-control"
                                            placeholder="Nomor Transaksi">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="customer" class="form-label">Nama Customer</label>
                                        <input type="text" id="customer" name="customer" class="form-control"
                                            placeholder="Nama Customer">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-4 mb-3">
                                        <label for="tanggal" class="form-label">Tanggal</label>
                                        <input type="date" id="tanggal" name="tanggal" class="form-control"
                                            placeholder="Tanggal">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="qrcode" class="form-label">QR Code</label>
                                        <input type="text" id="qrcode" name="qrcode" class="form-control"
                                            placeholder="QR Code">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="" class="form-label"></label>
                                        <div class="text-end">
                                            <div class="app-search dropdown d-none d-lg-block">
                                                <form>
                                                    <div class="input-group">
                                                        <input type="search" class="form-control form-control-sm"
                                                            placeholder="Cari Barang" id="top-search" name="search">
                                                        <span class="mdi mdi-magnify search-icon"></span>
                                                        <button class="input-group-text btn btn-primary btn-sm"
                                                            type="submit">Search</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-centered w-100 dt-responsive nowrap" id="products-datatable">
                                    <thead class="table-light">
                                        <tr>
                                            <th>No </th>
                                            <th>Kode</th>
                                            <th>Barang</th>
                                            <th>Qty</th>
                                            <th>Diskon</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- @foreach ($dtRole as $item) --}}
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td colspan="5">Grand Total</td>
                                            <td>y</td>
                                        </tr>
                                        {{-- @endforeach --}}
                                    </tbody>
                                </table>
                                <div class="row mb-3">
                                    <div class="col-md-2">
                                        <label for="diskon" class="form-label-md-6">Diskon</label>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" name="diskon" id="diskon" class="form-control">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-2">
                                        <label for="totalbayar" class="form-label-md-6">Total Bayar</label>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" name="totalbayar" id="totalbayar" class="form-control">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-2">
                                        <label for="dibayar" class="form-label-md-6">Dibayar</label>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" name="dibayar" id="dibayar" class="form-control">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-2">
                                        <label for="kembalian" class="form-label-md-6">Kembalian</label>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" name="kembalian" id="kembalian" class="form-control">
                                    </div>
                                </div>
                                <div class="mt-3 text-center">
                                    <button class="btn btn-primary" type="submit">Tambah</button>
                                </div>
                            </div>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col -->
            </div><!-- end row -->
        </div> <!-- container -->
    </div>
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        $("#top-search").autocomplete({
            source: function(request, response) {
                $.ajax({
                    url: "/search",
                    dataType: "json",
                    data: {
                        term: request.term
                    },
                    success: function(data) {
                        response(data);
                    }
                });
            },
            minLength: 1, // Minimum karakter yang harus diketik sebelum pencarian dimulai
            select: function(event, ui) {
                // Aksi yang dijalankan saat item dipilih dari autocomplete
                // Misalnya, dapat mengarahkan pengguna ke halaman detail barang yang dipilih
                // dengan mengubah window.location.href
                // Contoh: window.location.href = "/barang/" + ui.item.value;
            }
        });
    });
</script>

@endsection
