@extends('user.index')

@section('title')
    <title>Buka Jasa</title>
@endsection

@section('content')

    <div class="text-center mt-2 mb-4">
        <h3 class="shadow-sm p-3 mb-5 bg-body rounded">Buka Jasa Titip Sekarang</h3>
    </div>
    <form action="/ewallet_update/{{ $customer->id }}" method="POST">
        @csrf
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-4">
                <div class="footer-content">
                    <div class="footer-head">
                        <div class="footer-logo ">
                            <h2>Akun Ewallet untuk Refund jika transaksi jasa gagal</h2>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end single footer -->

            <div class="col-md-4">
                <div class="footer-content">
                    <p class="fw-bold">Jenis E-Wallet</p>
                    <select class="form-control" name="jenis_ewallet" value="{{ $customer->jenis_ewallet }}">
                        <option
                            value="{{ $customer->jenis_ewallet === 'Dana' ? 'Dana' : 'Ovo' }}">
                            {{ $customer->jenis_ewallet === 'Dana' ? 'Dana' : 'Ovo' }}
                        </option>
                        <option
                            value="{{ $customer->jenis_ewallet === 'Dana' ? 'Ovo' : 'Dana' }}">
                            {{ $customer->jenis_ewallet === 'Dana' ? 'Ovo' : 'Dana' }}
                        </option>
                    </select>

                    <p class="fw-bold mt-3">Nomor Ewallet</p>
                    <div class="form-group">
                <input type="text" name="nomor_ewallet" class="form-control" placeholder="0812345678" value="{{ $customer->nomor_ewallet }}" required>
                    </div>

                    <button type="submit" class="btn btn-primary mt-5">Konfirmasi</button>
                </div>
            </div>
        </div>
    </div>
@endsection