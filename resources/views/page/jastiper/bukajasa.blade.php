@extends('user.index')

@section('title')
    <title>Buka Jasa</title>
@endsection

@section('content')
    <div class="text-center mt-2 mb-4">
        <h3 class="shadow-sm p-3 mb-5 bg-body rounded">Buka Jasa Titip Sekarang</h3>
    </div>
    <form action="{{ route('bukajasa.store') }}"method="POST" enctype="multipart/form-data">
        @csrf
        <div class="container mt-5 mb-5">
            <div class="row">
                <div class="col-md-4">
                    <div class="footer-content">
                        <div class="footer-head">
                            <div class="footer-logo ">
                                <h2>Informasi Jasa</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end single footer -->

                <div class="col-md-4">
                    <div class="footer-content">
                        <p class="fw-bold">Kota Jastiper</p>
                        <div class="form-group">
                            <input type="text" name="kota_jasa" class="form-control" placeholder="Kota - Provinsi"
                                required>
                        </div>

                        <p class="fw-bold mt-3">Harga Jasa</p>
                        <div class="form-group">
                            <input type="text" name="harga_jasa" class="form-control" placeholder="10000 (tanpa Rp)"
                                required>
                        </div>

                        <p class="fw-bold mt-3">Tanggal Tutup Pemesanan Jasa</p>
                        <div class="form-group">
                            <input type="date" name="tanggal_tutup" class="form-control" placeholder="Harga Jasa*"
                                required>
                        </div>
                        <button type="submit" class="btn btn-primary mt-5">Konfirmasi</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
