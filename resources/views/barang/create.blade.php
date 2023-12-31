@extends('main')
@section('content')
    <div class="container mt-3">
        <h3>Tambah Data Barang</h3>
        <div class="content bg-white border">
            <div class="m-5">
                <form action="{{ route('barang.store') }}" method="POST" class="mb-3">
                    @csrf
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control">
                    </div>

                    <div class="mb-3" id="hidden_div">
                        <label for="kategori" class="form-label">Kategori</label>
                        <div class="col-md-12 {{ $errors->has('kategori') ? 'has-error' : '' }}">
                            <select name="kategori" id="kategori" class="form-control">
                                @foreach ($dtkategori as $item)
                                    <option value="{{ $item->kode_kategori }}">{{ $item->nama_kategori }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="hargajual" class="form-label">Harga Jual</label>
                        <input type="text" name="hargajual" id="hargajual" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="diskon" class="form-label">Diskon</label>
                        <input type="text" name="diskon" id="diskon" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="stok" class="form-label">Stok</label>
                        <input type="text" name="stok" id="stok" class="form-control">
                    </div>

                    <div class="mb-3 text-center">
                        <button class="btn btn-primary" type="submit">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
