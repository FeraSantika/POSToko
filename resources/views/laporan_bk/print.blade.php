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
                                            <h2 class="card-title text-primary mb-0">Nama Toko</h2>
                                        </div>
                                        <div class="mt-3 mb-3">
                                            <h4 class="card-text mt-3"></h4>
                                        </div>
                                        <h4 class="text-center">Laporan Barang Keluar</h4>
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-centered mb-0"
                                                id="products-datatable">
                                                <thead>
                                                    <tr>
                                                        <th>Nama Barang</th>
                                                        <th>Kategori</th>
                                                        <th>Terjual</th>
                                                    </tr>
                                                </thead>
                                                <?php
                                                $total = 0;
                                                ?>
                                                <tbody>
                                                    @foreach ($bk as $kodeBarang => $group)
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
                                                                {{ $group->jumlahbk }}
                                                            </td>
                                                        </tr>
                                                        <?php
                                                        $total += $group->jumlahbk;
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
