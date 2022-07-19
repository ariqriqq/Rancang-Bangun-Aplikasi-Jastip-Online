@extends('user.index')

@section('title')
    <title>Pesanan Saya - Jastipol</title>
@endsection

@section('content')
    <form action="/orderan" method="POST">
        @csrf
        <div class="container">
            <div class="row mt-5 mb-5">
                <div class="col-md-4 ">
                    <div class="footer-content">
                        <div class="footer-head">
                            <div class="footer-logo ">
                                <h2>Informasi Jasa</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end single footer -->

                <div class="col-md-4 ">
                    <div class="footer-content">
                        <p class="fw-bold">Pesanan</p>
                        <div class="form-group">
                            <input type="text" name="kota_jastiper" class="form-control" value="{{ $data->pesanan }}"
                                required disabled>
                        </div>

                        <p class="fw-bold mt-3">Total Harga</p>
                        <div class="form-group">
                            <input type="text" name="no_hp_jastiper" class="form-control" value="" required
                                disabled>
                        </div>


                    </div>
                </div>
                <div class="col-md-4">
                    <div class="footer-content">
                        <div class="footer-head">
                            <p class="fw-bold">Nama Jastiper</p>

                            <input type="text" name="nama_ewallet" class="form-control" value="" required disabled>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
