<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from coderthemes.com/hyper_2/saas/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 04 Jul 2023 09:23:48 GMT -->

<head>
    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('style')
    @include('layouts.header')
</head>

<body>
    <!-- Begin page -->
    <div class="wrapper">
        <div class="content-page">


            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">
                    <div class="resi-container">
                        <div class="col-md-4">
                            <div class="card border-primary border">
                                <div class="card-body">
                                    <div class="container mt-3">
                                        <div class="d-flex align-items-center mb-3">
                                            <img src="{{ asset('assets/images/logo-sm.png') }}" width="100px"
                                                class="me-3">
                                            <h5 class="card-title text-primary mb-0">Nama Toko</h5>
                                        </div>
                                        <div class="mt-3 mb-3">
                                            <h4 class="card-text mt-3">{{ $transaksibk->kode_transaksi }}</h4>
                                        </div>
                                        <p><b>Kasir</b>: {{ $transaksibk->user->User_name }}</p>
                                        <p><b>Customer</b>: {{ $transaksibk->customer }}</p>
                                        <p><b>Tanggal</b>: {{ $transaksibk->tanggal_tbk }}</p>
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-centered mb-0"
                                                id="products-datatable">
                                                <thead>
                                                    <tr>
                                                        <th>Nama Barang</th>
                                                        <th>Kode Barang</th>
                                                        <th>Harga</th>
                                                        <th>Qty</th>
                                                        <th>Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($transaksibk->list as $bk)
                                                        <tr>
                                                            <td>
                                                                @foreach ($bk->barang as $dtbarang)
                                                                    {{ $dtbarang->nama_barang }}
                                                                @endforeach
                                                            </td>
                                                            <td>{{ $bk->kode_barang }}</td>
                                                            <td>{{ $bk->harga_jual }}</td>
                                                            <td>{{ $bk->jumlah_bk }}</td>
                                                            <td>{{ number_format($bk->harga_jual * $bk->jumlah_bk, 0, ',', '.') }}
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                                {{-- <tbody>
                                            <tr>
                                                <td colspan="4">Grand Total</td>
                                                <td id="grandTotal" colspan="2"></td>
                                            </tr>
                                        </tbody> --}}
                                            </table>

                                            <div class="mt-3 mr-5 mb-3">
                                                <table class="table table-centered mb-0">
                                                    <tbody>
                                                        <tr>
                                                            <td>Diskon</td>
                                                            <td>:</td>
                                                            <td>{{ $transaksibk->diskon_tbk }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Total Bayar</td>
                                                            <td>:</td>
                                                            <td>{{ $transaksibk->total_bayar }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Dibayar</td>
                                                            <td>:</td>
                                                            <td>{{ $transaksibk->dibayar }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Kembalian</td>
                                                            <td>:</td>
                                                            <td> {{ $transaksibk->kembalian }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="mt-5 d-flex justify-content-center align-items-center">
                                                <h5 class="card-title text-primary">Barang yang sudah dibeli tidak dapat
                                                    ditukar
                                                    kembali</h5>
                                            </div>
                                        </div> <!-- end card-body-->
                                    </div> <!-- end card-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.themesettings')
</body>
