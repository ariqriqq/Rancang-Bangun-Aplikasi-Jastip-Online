@extends('user.index')

@section('title')
    <title>Pesanan Saya - Jastipol</title>
@endsection

@section('content')
    <form action="/update_uang_muka/{{ $order->id }}" method="post">
        @csrf
        <div class="container">
            <div class="row mt-5 mb-5">
                <div class="col-md-4 ">
                    <div class="footer-content">
                        <div class="footer-head">
                            <div class="footer-logo ">
                                <h2>Informasi Pembayaran</h2>
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
                        <p class="fw-bold">Pembayaran Uang Muka</p>
                        <div class="form-group">
                            <input type="text" class="form-control" name="uang_muka"
                                value="Rp{{ $order->jasa->harga_jasa+$kode }}" required disabled>
                        </div>
                        <p class="fw-bold">Metode Pembayaran</p>
                        <div class="form-group">
                            <input type="text" class="form-control" value="{{ $order->metode_pembayaran }}" required disabled>
                        </div>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal"
                            data-bs-target="#staticBackdrop">
                            Bayar Sekarang
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Total Pembayaran</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Pembayaran uang muka sesuai data pembayaran yang ditampilkan dengan kode uniknya.
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Konfirmasi</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
