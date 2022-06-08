@extends('user.index')

@section('title')
    <title>Order Page</title>
@endsection

@section('content')
    <div class="mt-3 mb-3">
        <div class="row mx-auto">
            <div class="col-2">
                <div class="card ">
                    <div class="card-header">
                        Cari Info Jastiper
                    </div>
                    <div class="card-body">
                        <p class="card-text">Tujuan Kota Jastiper</p>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <p class="card-text">Kota Jastiper</p>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <a href="#" class="btn btn-primary mt-3">Cari</a>
                    </div>
                </div>
            </div>
            <div class="col-10" style="height: 100%">
                <div class="row">
                    @for ($i = 0; $i < 100; $i++)
                        <div class="col-4">
                            <div class="card mb-3">
                                <div class="card-header">
                                    Nama Kota {{ $i + 1 }}
                                </div>
                                <div class="card-body">
                                    <p class="card-text">Nama Jastiper</p>
                                    <p class="card-text">Harga Jasa</p>
                                    <p class="card-text">Batas tanggal pemesanan</p>
                                    <p class="card-text">Tanggal pengiriman</p>
                                    <p class="card-text">Bayar Full/COD</p>
                                    <a href="#" class="btn btn-primary">Pesan</a>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>
@endsection
