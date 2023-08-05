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
                                <table class="table table-centered w-100 dt-responsive nowrap m-3">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Kode</th>
                                            <th>Barang</th>
                                            <th>Qty</th>
                                            <th>Diskon</th>
                                            <th>Harga</th>
                                            <th>Total</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="barangList">
                                        {{-- @foreach ($listbarang as $item)
                                            <tr id="list_id{{ $item->list_id }}">
                                                <td>{{ $item->kode_barang }}</td>
                                                <td>{{ $item->barang->nama_barang }}</td>
                                                <td><input type="text" name="qty" id="qty-{{ $item->list_id }}"
                                                        class="form-control" value="{{ $item->jumlah_bk }}"></td>
                                                <td>{{ $item->diskon_bk }}%</td>
                                                <td>{{ number_format($item->harga_jual, 0, ',', '.') }}</td>
                                                <td class="subtotal" id="total-{{ $item->list_id }}">
                                                    {{ number_format($item->harga_jual * $item->jumlah_bk - ($item->harga_jual * $item->jumlah_bk * $item->diskon_bk) / 100, 0, ',', '.') }}
                                                </td>
                                                <td>
                                                    <a href="javascript:void(0);" class="action-icon"
                                                        onclick="edit('{{ $item->list_id }}');">
                                                        <i class="mdi mdi-square-edit-outline"></i>
                                                    </a>
                                                    <a href="javascript:void(0);" class="action-icon"
                                                        onclick="hapus('{{ $item->list_id }}');">
                                                        <i class="mdi mdi-delete"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach --}}
                                    </tbody>
                                    <tbody>
                                        <tr>
                                            <td colspan="5">Grand Total</td>
                                            <td id="grandTotal" colspan="2"></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="row mb-3 mt-2 m-3">
                                    <div class="col-md-2">
                                        <label for="diskon" class="form-label-md-6">Diskon</label>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" name="diskon" id="diskon" class="form-control">
                                    </div>
                                </div>
                                <div class="row mb-3 m-3">
                                    <div class="col-md-2">
                                        <label for="totalbayar" class="form-label-md-6">Total Bayar</label>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" name="totalbayar" id="totalbayar" class="form-control">
                                    </div>
                                </div>
                                <div class="row mb-3 m-3">
                                    <div class="col-md-2">
                                        <label for="dibayar" class="form-label-md-6">Dibayar</label>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" name="dibayar" id="dibayar" class="form-control">
                                    </div>
                                </div>
                                <div class="row mb-3 m-3">
                                    <div class="col-md-2">
                                        <label for="kembalian" class="form-label-md-6">Kembalian</label>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" name="kembalian" id="kembalian" class="form-control">
                                    </div>
                                </div>
                                <div class="mt-5 mb-5 text-center">
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

        updateGrandTotal();

        function updateTotalbayar() {
            var totalBayar = 0;
            var currentDiskon = $('#diskon').val();
            $("#grandTotal").each(function() {
                const grandTotal = $(this).text().replace('.', '');
                totalBayar += parseFloat(grandTotal);
            });
            totalBayar = totalBayar - (totalBayar * (parseFloat(currentDiskon) /
                100));
            const formattedTotalbayar = formatNumber(totalBayar);
            $('#totalbayar').val("Rp " + formattedTotalbayar + ",-");
        }

        $('#diskon').on('input', function() {
            updateGrandTotal();
            updateTotalbayar();
        });

        function updateKembalian() {
            var kembalian = 0;
            var currentDibayar = $('#dibayar').val();
            var totalbayar = $('#totalbayar').val();
            totalbayar = totalbayar.replace('Rp', '').replace('.', '').replace(',- ', '');

            kembalian = parseFloat(currentDibayar) - parseFloat(totalbayar);
            const formattedkembalian = formatNumber(kembalian);
            $('#kembalian').val("Rp " + formattedkembalian + ",-");
        }

        $('#dibayar').on('input', function() {
            updateKembalian();
        });

        $(document).ready(function() {
            var path = "{{ route('autocomplete_bk') }}";
            $("#search").autocomplete({
                source: function(request, response) {
                    $.ajax({
                        url: path,
                        type: 'GET',
                        dataType: "json",
                        data: {
                            cari: request.term
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
        })

        var insertlist = "{{ route('insertlist_bk') }}";
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
                url: insertlist,
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
                    <tr id="list_id${response.data.list_id}">
                        <td>${response.data.kode}</td>
                        <td>${response.data.nama}</td>
                        <td>
                            <input type="text" name="qty" id="qty-${response.data.list_id}" class="form-control" value="${response.data.qty}">
                        </td>
                        <td>${response.data.diskon}%</td>
                        <td id="harga">${formatNumber(response.data.harga)}</td>
                        <td class="subtotal" id="jumlah">${formatNumber(response.data.jumlah)}</td>
                        <td>
                            <a href="javascript:void(0);" class="action-icon" onclick="edit('${response.data.list_id}')">
                                <i class="mdi mdi-square-edit-outline"></i>
                            </a>
                            <a href="javascript:void(0)" onclick="hapus('${response.data.list_id}')" class="action-icon"><i class="mdi mdi-delete"></i></a>
                        </td>
                    </tr>
                `;
                    //append to table
                    $('#barangList').append(post);
                    $('#search').val('');
                    console.log(response.data);
                    updateGrandTotal();
                }
            })
        })

        function hapus(list_id) {
            var url = "{{ route('list_bk.destroy', ':list_id') }}";
            url = url.replace(':list_id', list_id);
            Swal.fire({
                title: "Yakin ingin menghapus data ini?",
                text: "Ketika data terhapus, anda tidak bisa mengembalikan data tersbut!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, Hapus!"
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: url,
                        type: "get",
                        dataType: "JSON",
                        success: function(data) {
                            Swal.fire({
                                toast: true,
                                position: 'top-end',
                                icon: 'success',
                                title: 'Data berhasil dihapus',
                                showConfirmButton: false,
                                timer: 1500
                            });
                            console.log("berhasil hapus data");
                            $("#list_id" + list_id).remove();

                            updateGrandTotal();
                        }
                    })
                }
            })
        }

        function edit(list_id) {
            var url = "{{ route('list_bk.update') }}";
            var currentQty = $('#qty-' + list_id).val();
            var currentJumlah = $('#total-' + list_id).val();
            var newData = {
                'list_id': list_id,
                'qty': currentQty,
                'jumlah': currentJumlah,
                '_token': $("meta[name='csrf-token']").attr("content")
            }
            $.ajax({
                url: url,
                type: "post",
                dataType: "JSON",
                data: newData,
                success: function(response) {
                    Swal.fire({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        title: 'Data berhasil diubah',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    let newRow = `
                        <tr id="list_id${response.data.list_id}">
                            <td>${response.data.kode}</td>
                            <td>${response.data.nama}</td>
                            <td>
                                <input type="text" name="qty" id="qty-${response.data.list_id}" class="form-control" value="${response.data.qty}">
                            </td>
                            <td>${response.data.diskon}%</td>

                            <td id="harga">${formatNumber(response.data.harga)}</td>
                            <td class="subtotal" id="jumlah">${formatNumber(response.data.jumlah)}</td>
                            <td>
                                <a href="javascript:void(0);" class="action-icon" onclick="edit('${response.data.list_id}')">
                                    <i class="mdi mdi-square-edit-outline"></i>
                                </a>
                                <a href="javascript:void(0)" onclick="hapus('${response.data.list_id}')" class="action-icon"><i class="mdi mdi-delete"></i></a>
                            </td>
                        </tr>
                    `;
                    $(`#list_id${response.data.list_id}`).replaceWith(newRow);

                    updateGrandTotal();
                    console.log(response.data);
                }
            });
        }

        var simpan = "{{ route('transaksi.store') }}";
        $('#simpan').click(function(e) {
            e.preventDefault();
            let kodetransaksi = $('#notransaksi').val();
            let tanggal = $('#tanggal').val();
            let customer = $('#customer').val();
            let diskon = $('#diskon').val();
            let totalbayar = $('#totalbayar').val();
            totalbayar = totalbayar.replace('Rp', '').replace('.', '').replace(',- ', '');
            let dibayar = $('#dibayar').val();
            let kembalian = $('#kembalian').val();
            kembalian = kembalian.replace('Rp', '').replace('.', '').replace(',- ', '');
            let token = $("meta[name='csrf-token']").attr("content");

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: simpan,
                type: "POST",
                cache: false,
                data: {
                    "kode_transaksi": kodetransaksi,
                    "tanggal": tanggal,
                    "customer": customer,
                    "diskon": diskon,
                    "total_bayar": parseFloat(totalbayar),
                    "jumlah_uang": dibayar,
                    "kembali": parseFloat(kembalian),
                    "_token": token
                },
                success: function(response) {
                    let newNotransaksi = response.new_kode_transaksi;
                    $('#notransaksi').val(newNotransaksi);
                    $('#tanggal').val('');
                    $('#customer').val('');
                    $('#diskon').val('');
                    $('#totalbayar').val('');
                    $('#dibayar').val('');
                    $('#kembalian').val('');

                    swal.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: 'Data berhasil disimpan.',
                        timer: 1500,
                        showConfirmButton: true,
                    });
                    $('#barangList').empty();
                    updateGrandTotal();
                    console.log(response.data);
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                }
            })
        })
    </script>
@endsection
