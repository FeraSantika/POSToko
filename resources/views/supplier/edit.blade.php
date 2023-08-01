@extends('main')
@section('content')
    <div class="container mt-3">
        <h3>Edit Data Supplier</h3>
        <div class="content bg-white border">
            <div class="m-5">
                <form action="{{route('supplier.update', $dtSupplier->kode_supplier )}}" method="POST" class="mb-3" enctype="multipart/form-data" id="form-id"
                    name="form-edit-user">
                    @csrf

                    <div class="row mb-3">
                        <div class="col-md-2">
                            <label for="nama" class="form-label-md-6">Nama</label>
                        </div>
                        <div class="col-md-10">
                            <input type="text" name="nama" id="nama" class="form-control"
                                value="{{ $dtSupplier->nama_supplier }}">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-2">
                            <label for="alamat" class="form-label-md-6">Alamat</label>
                        </div>
                        <div class="col-md-10">
                            <input type="text" name="alamat" id="alamat" class="form-control"
                                value="{{ $dtSupplier->alamat_supplier }}">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-2">
                            <label for="telp" class="form-label-md-6">Telp</label>
                        </div>
                        <div class="col-md-10">
                            <input type="text" name="telp" id="telp" class="form-control"
                                value="{{ $dtSupplier->telp_supplier }}">
                        </div>
                    </div>

                    <div class="mt-3 text-center">
                        <button class="btn btn-primary" type="submit">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
{{-- @section('script')
    <script>
        var passwordInput = document.getElementsByName('password');
        var currentPasswordInput = document.getElementsByName('current_password')[0];

        passwordInput.addEventListener('focus', function() {
            this.value = '';
            this.removeEventListener('focus', arguments.callee);
        });

        document.getElementsByName('form-edit-user').addEventListener('submit', function(event) {
            var passwordValue = passwordInput.value;

            if (passwordValue === '') {
                passwordInput.value = currentPasswordInput.value;
            } else {
                currentPasswordInput.value = passwordValue;
            }

            event.preventDefault();
        });
    </script>
@endsection --}}
