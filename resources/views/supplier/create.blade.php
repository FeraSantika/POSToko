@extends('main')
@section('content')
    <div class="container mt-3">
        <h3>Tambah Data Supplier</h3>
        <div class="content bg-white border">
            <div class="m-5">
                <form action="{{route('supplier.store')}}" method="POST" class="mb-3">
                    @csrf

                    <div class="row mb-3">
                        <div class="col-md-2">
                            <label for="nama" class="form-label-md-6">Nama</label>
                        </div>
                        <div class="col-md-10">
                            <input type="text" name="nama" id="nama" class="form-control">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-2">
                            <label for="alamat" class="form-label-md-6">Alamat</label>
                        </div>
                        <div class="col-md-10">
                            <input type="text" name="alamat" id="alamat" class="form-control">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-2">
                            <label for="telp" class="form-label-md-6">Telp</label>
                        </div>
                        <div class="col-md-10">
                            <input type="text" name="telp" id="telp" class="form-control">
                        </div>
                    </div>

                    <div class="mt-3 text-center">
                        <button class="btn btn-primary" type="submit">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
