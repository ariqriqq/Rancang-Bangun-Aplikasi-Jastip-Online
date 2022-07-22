@extends('user.index')

@section('title')
    <title>Pesanan Saya - Jastipol</title>
@endsection

@section('content')
    <form action="/update_pembayaran/{{$data->id}}" method="post">
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
                {{-- <form action="{{ route('orderan.orderan_update', $data->id) }}" method="POST">
                    @csrf
                    @method('PUT') --}}
                <div class="col-md-4 ">
                    <div class="footer-content">
                        <p class="fw-bold">Pesanan</p>
                        <div class="form-group">
                            <input type="text"  class="form-control"
                                value="{{ $data->pesanan }} ({{ $data->jumlah }} {{ $data->satuan }})" required
                                disabled>
                        </div>
                        <div class="form-group">
                            <input type="text"  class="form-control"
                                value="{{ $data->jasa_id }}" required
                                hidden>
                        </div>

                        <p class="fw-bold mt-3">Total Harga</p>
                        <div class="form-group">
                            <input type="text" name="total_harga" class="form-control" value="{{ $data->total_harga }}" placeholder="10000 (tanpa Rp)" required>
                        </div>


                    </div>
                </div>
                <div class="col-md-4">
                    <div class="footer-content">
                        <div class="footer-head">
                            <p class="fw-bold">Nama Customer</p>
                            <input type="text"  class="form-control" value=""  required disabled>

                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-5">Konfrimasi</button>
                </div>
            </div>
        </div>
    </form>
@endsection
