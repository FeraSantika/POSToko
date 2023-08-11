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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Transaksi</a></li>
                                <li class="breadcrumb-item active">Transaksi Barang Keluar</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Transaksi Barang Keluar</h4>
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
                                    <a href="{{ route('transaksibk.create') }}" class="btn btn-danger mb-2"><i
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
                                            <th>Nama Kasir</th>
                                            <th>Customer</th>
                                            <th>Diskon</th>
                                            <th>Jumlah Bayar</th>
                                            <th>Dibayar</th>
                                            <th>Kembalian</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
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
                                                    {{ number_format($item->diskon_tbk, 0, ',', '.') }}
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
                                                <td>
                                                    <button type="button" class="btn btn-primary"
                                                        data-transaksi-id="{{ $item->kode_transaksi }}"
                                                        onclick="printResi('{{ $item->kode_transaksi }}')"><i
                                                            class="uil-print"></i></button>
                                                    <a href="{{ route('detail_bk', $item->kode_transaksi) }}"
                                                        type="button" class="btn btn-success"
                                                        data-transaksi-id="{{ $item->kode_transaksi }}"
                                                        onclick="">Lihat Detail</a>
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
    </script>
@endsection
