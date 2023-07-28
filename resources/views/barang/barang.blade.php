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
                    <h4 class="page-title">Barang</h4>
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
                                <a href="{{route('barang.create')}}" class="btn btn-danger mb-2"><i
                                        class="mdi mdi-plus-circle me-2"></i> Add Barang</a>
                            </div>
                            <div class="col-sm-7">
                                <div class="text-sm-end">
                                    <button type="button" class="btn btn-success mb-2 me-1"><i
                                            class="mdi mdi-cog-outline"></i></button>
                                    <button type="button" class="btn btn-light mb-2 me-1">Import</button>
                                    <button type="button" class="btn btn-light mb-2">Export</button>
                                </div>
                            </div><!-- end col-->
                        </div>

                        <div class="table-responsive">
                            <table class="table table-centered w-100 dt-responsive nowrap" id="products-datatable">
                                <thead class="table-light">
                                    <tr>
                                        <th>Nama Barang</th>
                                        <th>Kategori</th>
                                        <th>Harga Jual</th>
                                        <th>Diskon</th>
                                        <th>Stok</th>
                                        <th style="width: 95px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dtbarang as $item)
                                    <tr>
                                        <td>
                                            {{$item->nama_barang}}
                                        </td>
                                        <td>
                                            {{$item->kategori->nama_kategori}}
                                        </td>
                                        <td>
                                            {{$item->harga_jual}}
                                        </td>
                                        <td>
                                            {{$item->diskon_barang}}%
                                        </td>
                                        <td>
                                            {{$item->stok_barang}}
                                        </td>
                                        <td class="table-action">
                                            <a href="{{ route('barang.edit', $item->kode_barang)}}" class="action-icon">
                                                <i class="mdi mdi-square-edit-outline"></i>
                                            </a>
                                            <form id="delete-form-{{$item->kode_barang}}" action="{{route('barang.destroy', $item->kode_barang)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <a href="javascript:void(0);" class="action-icon"
                                                    onclick="event.preventDefault(); if (confirm('Apakah Anda yakin ingin menghapus?')) document.getElementById('delete-form-{{$item->kode_barang}}').submit();">
                                                    <i class="mdi mdi-delete"></i>
                                                </a>
                                            </form>
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
