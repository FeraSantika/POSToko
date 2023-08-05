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
                                <li class="breadcrumb-item active">Transaksi Barang Masuk</li>
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
                            <div class="row mb-2">
                                <div class="col-sm-5">
                                    <a href="{{ route('transaksibm.create') }}" class="btn btn-danger mb-2"><i
                                            class="mdi mdi-plus-circle me-2"></i> Add Data Transaksi</a>
                                </div>
                                <div class="col-sm-7">
                                </div><!-- end col-->
                            </div>

                            <div class="table-responsive">
                                <table class="table table-centered w-100 dt-responsive nowrap" id="products-datatable">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Kode Transaksi</th>
                                            <th>Tanggal</th>
                                            <th>Supplier</th>
                                            <th>Total</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
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
                                                    {{ number_format($item->harga_total, 0, ',', '.') }}
                                                </td>
                                                <td class="table-action">
                                                    <a href="{{ route('detail_bm', $item->kode_transaksi) }}" type="button"
                                                        class="btn btn-success"
                                                        data-transaksi-id="{{ $item->kode_transaksi }}" onclick="">Lihat
                                                        Detail</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
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
