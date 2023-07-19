@extends('main')
@section('content')
    <div class="container mt-3">
        <h3>Edit Data Barang</h3>
        <div class="content bg-white border">
            <div class="m-5">
                <form action="{{route('kategori.update', $dtkategori->kode_kategori)}}" method="POST" class="mb-3">
                    @csrf
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control" value="{{$dtkategori->nama_kategori}}">
                    </div>

                    <div class="mb-3 text-center">
                        <button class="btn btn-primary" type="submit">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

