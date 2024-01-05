@extends('layouts.master')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Vertical Layouts</h4>

    <!-- Basic Layout -->
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Tambah Produk</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('produk.store') }}">
                        @csrf <!-- Tambahkan token CSRF untuk keamanan formulir -->
                        <div class="mb-3">
                            <label class="form-label" for="nama">Nama Produk</label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="John Doe">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="keterangan">Keterangan</label>
                            <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="ACME Inc.">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="stok">Stok</label>
                            <input type="number" id="stok" name="stok" class="form-control phone-mask" placeholder="658 799 8941">
                        </div>
                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
