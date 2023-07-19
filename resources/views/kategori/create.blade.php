@extends('main')
@section('content')
    <div class="container mt-3">
        <h3>Tambah Data Kategori Barang</h3>
        <div class="content bg-white border">
            <div class="m-5">
                <form action="{{ route('kategori.store') }}" method="POST" class="mb-3">
                    @csrf
                    <div class="mb-3">
                        <label for="simpleinput" class="form-label">Nama Kategori</label>
                        <input type="text" name="nama" id="nama" class="form-control">
                    </div>

                    <div class="mb-3 text-center">
                        <button class="btn btn-primary" type="submit">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

