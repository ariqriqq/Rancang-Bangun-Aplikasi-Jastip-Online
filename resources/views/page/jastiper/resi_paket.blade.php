@extends('user.index')

@section('title')
    <title>Pesanan Saya - Jastipol</title>
@endsection

@section('content')
    <form action="/update_resi_paket/{{ $payment->id }}" method="post">
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
                        <p class="fw-bold">ID Pesanan</p>
                        <div class="form-group">
                            <input type="text" class="form-control" value="{{ $payment->order->id }}" required disabled>
                        </div>
                        <p class="fw-bold">Kurir Expedisi</p>
                        <div class="form-group">
                            <input type="text" class="form-control" value="{{ $payment->order->kurir }}" required
                                disabled>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" value="{{ $payment->jasa_id }}" required hidden>
                        </div>

                        <p class="fw-bold">No Resi Paket</p>
                        <div class="form-group">
                            <input type="text" name="resi_paket" class="form-control"
                                value="{{ $payment->order->resi_paket }}"
                                placeholder="Tulis sesuai no resi pengiriman paket" required>
                        </div>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal"
                            data-bs-target="#staticBackdrop">
                            Konfirmasi
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
                                        No resi pengiriman paket tidak dapat diubah setelah dikonfirmasi, apakah data yang
                                        diisi
                                        sudah benar?
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
