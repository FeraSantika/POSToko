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
                        <form action="{{ route('transaksi.store') }}" method="POST" id="form_transaksi">
                            <div class="card-body">
                                <div class="row mb-2">
                                    <div class="row mb-3">
                                        <div class="col-md-4 mb-3">
                                            <label for="no.transaksi" class="form-label">No. Transaksi</label>
                                            <input type="text" id="notransaksi" name="notransaksi" class="form-control"
                                                placeholder="Nomor Transaksi" value="{{ $transactionCode }}">
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
                                            <label for="search" class="form-label"> Cari Barang</label>
                                            <div class="col-md-8 mb-3">
                                                <div class="input-group">
                                                    <input type="text" class="typeahead form-control" name="search"
                                                        id="search" placeholder="Cari Barang">
                                                    <button class="input-group-text btn btn-primary btn-sm" type="button"
                                                        id="add">Add</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-centered w-100 dt-responsive nowrap">
                                    <thead class="table-light">
                                        <tr>
                                            {{-- <th>No </th> --}}
                                            <th>Kode</th>
                                            <th>Barang</th>
                                            <th>Qty</th>
                                            <th>Diskon</th>
                                            <th>Total</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="barangList">
                                        @foreach ($listbarang as $item)
                                            <tr id="{{ $item->list_id }}">
                                                <td>{{ $item->kode_barang }}</td>
                                                <td>{{ $item->barang->nama_barang }}</td>
                                                <td>{{ $item->jumlah_bk }}</td>
                                                <td>{{ $item->diskon_bk }}</td>
                                                <td>{{ $item->harga_jual * $item->jumlah_bk }}</td>
                                                <td>
                                                    <a href="" class="action-icon">
                                                        <i class="mdi mdi-square-edit-outline"></i>
                                                    </a>
                                                    <form id="delete-form-{{ $item->kode_barang }}"
                                                        action="{{ route('list.destroy', $item->kode_barang) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <a href="javascript:void(0);" class="action-icon"
                                                            id="btn-delete-post"
                                                            onclick="event.preventDefault(); if (confirm('Apakah Anda yakin ingin menghapus?'))
                                                            document.getElementById('delete-form-{{ $item->kode_barang }}').submit();">
                                                            <i class="mdi mdi-delete"></i>
                                                        </a>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        {{-- <tr>
                                        <td colspan="5">Grand Total</td>
                                        <td></td>
                                    </tr> --}}
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
                                    <button class="btn btn-primary" type="submit" id="simpan">Simpan</button>
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
        $(document).ready(function() {
            var path = "{{ route('autocomplete') }}";
            var nourut = 1;
            $("#search").autocomplete({
                source: function(request, response) {
                    $.ajax({
                        url: path,
                        type: 'GET',
                        dataType: "json",
                        data: {
                            search: request.term
                        },
                        success: function(data) {
                            response(data);
                            console.log(data);
                        }
                    });
                },
                select: function(event, ui) {
                    $('#search').val(ui.item.label);
                    console.log(ui.item);
                    return false;
                }
            });

            var path3 = "{{ route('insertlist') }}";
            $('#add').click(function(e) {
                e.preventDefault();
                let kodetransaksi = $('#notransaksi').val();
                let qrcode = $('#qrcode').val();
                let search = $('#search').val();
                let token = $("meta[name='csrf-token']").attr("content");

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: path3,
                    type: "POST",
                    cache: false,
                    data: {
                        "kode_transaksi": kodetransaksi,
                        "kode_barang": qrcode,
                        "search": search,
                        "_token": token
                    },

                    success: function(response) {
                        let post = `
                    <tr id="${response.data.kode}">
                        <td>${response.data.kode}</td>
                        <td>${response.data.nama}</td>
                        <td>
                            <input type="text" name="qty" id="qty" class="form-control" value="${response.data.qty}">
                        </td>
                        <td>${response.data.diskon}</td>
                        <td>${response.data.jumlah}</td>
                        <td>
                            <a href="javascript:void(0);" class="action-icon">
                                <i class="mdi mdi-square-edit-outline"></i>
                            </a>
                            <a href="javascript:void(0);" class="action-icon" id="btn-delete-post"
                            onclick="event.preventDefault(); if (confirm('Apakah Anda yakin ingin menghapus?'))
                            document.getElementById('delete-form-${response.data.kode}').submit();">
                                <i class="mdi mdi-delete"></i>
                            </a>
                        </td>
                    </tr>
                `;
                        //append to table
                        $('#barangList').append(post);
                        nourut++;
                        console.log('berhasil');
                    }
                })
            })

            $('body').on('click', '#btn-delete-post', function(e) {
                e.preventDefault();
                let kode = $(this).data('qrcode');
                let token = $("meta[name='csrf-token']").attr("content");
                $.ajax({
                    url: "/admin/transaksi/list/destroy/" + kode,
                    type: "DELETE",
                    cache: false,
                    data: {
                        "kode-barang": kode,
                        "_token": token
                    },
                    success: function(response) {
                        console.log('Berhasil hapus data');
                        //remove post on table
                        $(`#${response.data.kode}`).remove();
                    }
                });
            })


            var path2 = "{{ route('transaksi.store') }}";
            $('#simpan').click(function(e) {
                e.preventDefault();
                // var daftarData = []
                // var daftarBaris = $('#barangList').children("tr");
                // daftarBaris.each((index, element) => {
                // var daftarTD = $(element).children("td");
                // var qty = daftarTD.get(3).children[0].value
                // var kodebarang = daftarTD.get(1).innerText
                // var data = {
                //     "qty": qty,
                //     "kode_barang": kodebarang,
                // }
                //     daftarData.push(data);
                // })

                // let customer = $('#customer').val();
                // let notransaksi = $('#notransaksi').val();
                // let tanggal = $('#tanggal').val();
                // let diskon = $('#diskon').val();
                // let totalbayar = $('#totalbayar').val();
                // let dibayar = $('#dibayar').val();
                // let kembalian = $('#kembalian').val();
                // let token = $("meta[name='csrf-token']").attr("content");

                // let datadikirim = {
                //     "kode_transaksi": notransaksi,
                //     "customer": customer,
                //     "tanggal_tbk": tanggal,
                //     "diskon_tbk": diskon,
                //     "total_bayar": totalbayar,
                //     "dibayar": dibayar,
                //     "kembalian": kembalian,
                //     "daftar_barang": daftarData,
                // "_token": token
                // };

                // console.log(datadikirim);

                // {
                //     "kode_transaksi": no.transaksi,
                //     "customer": customer,
                //     "tanggal_tbk": tanggal,
                //     "diskon_tbk": diskon,
                //     "total_bayar": totalbayar,
                //     "dibayar": dibayar,
                //     "kembalian": kembalian,
                //     "_token": token
                // },

                // success: function(response) {
                //     console.log('berhasil');
                // $('#customer').val('');
                // $('#notransaksi').val('');
                // $('#tanggal').val('');
                // $('#qrcode').val('');
                // $('#diskon').val('');
                // $('#totalbayar').val('');
                // $('#dibayar').val('');
                // $('#kembalian').val('');
                // }
            })
        })
    </script>
@endsection
