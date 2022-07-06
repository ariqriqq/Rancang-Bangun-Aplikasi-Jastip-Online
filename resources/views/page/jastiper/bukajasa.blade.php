@extends('user.index')

@section('title')
    <title>Buka Jasa</title>
@endsection

@section('content')
    <div class="text-center mt-2 mb-4">
        <h3 class="shadow-sm p-3 mb-5 bg-body rounded">Buka Jasa Titip Sekarang</h3>
    </div>

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
                        <input type="text" name="kota_jastiper" class="form-control" placeholder="Bandung/Jakarta/Indramayu"
                            required>
                    </div>

                    <p class="fw-bold mt-3">Harga Jasa</p>
                    <div class="form-group">
                        <input type="text" name="harga_jasa" class="form-control" placeholder="Harga Jasa*"
                            required>
                    </div>


                    <p class="fw-bold mt-3">Uang Jaminan/Uang Muka</p>
                    <div class="form-group mt-3">
                        <select class="form-control" name="uang_muka">
                            <option selected disabled>Pilih Nominal </option>
                            <option value="Rp10.000">Rp10.000 </option>
                            <option value="Rp20.000">Rp20.000 </option>
                            <option value="Rp25.000">Rp25.000 </option>
                        </select>
                    </div>

                    <p class="fw-bold mt-3">Tanggal Tutup Pemesanan Jasa</p>
                    <div class="form-group">
                        <input type="date" name="tutup_pesanan" class="form-control" placeholder="Harga Jasa*"
                            required>
                    </div>
                    <button type="submit" class="btn btn-primary mt-5">Konfirmasi</button>
                </div>
            </div>
        </div>
    </div>
@endsection
