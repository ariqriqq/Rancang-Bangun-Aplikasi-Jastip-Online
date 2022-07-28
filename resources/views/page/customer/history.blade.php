@extends('user.index')

@section('title')
    <title>Status Pembayaran - Jastipol</title>
@endsection

@section('content')
    <div class="mt-5 mb-3 container-fluid">
        <div class="row mx-auto">
            <div class="col-3">
                <div class="card ">
                    <div class="card-header text-center">
                        <div class="form-group text-center">
                            <div class="">
                                <img src="..." class="rounded" alt="...">
                            </div>
                            <label>Hi, {{ Auth()->user()->name }}</label>
                        </div>
                    </div>
                    <div class="card-body" style=" padding:0">
                        <a type="button" class="btn btn-outline-secondary" style="width:100%; border-radius:0 0"
                            href="/myorder">Pesanan
                            Saya</a>
                        <a type="button" class="btn btn-outline-secondary" style="width:100%; border-radius:0 0"
                            href="/riwayat-transaksi">Transaksi</a>
                    </div>
                </div>
            </div>
            <div class="col-9 col-md-8 col-lg-8 position-relative" style="height: 100%">
                <h3>Daftar Transaksi</h3>
                <div class="pri_table_list">
                    <ol>
                        <li>
                            <a type="btn" href="/myorder" class="btn btn-outline-secondary mt-3 mb-3">Menunggu
                                Pembayaran <i class="bi bi-cash-coin"></i></a>
                        </li>
                        @forelse($payment as $payment)
                            @csrf
                            <div class="pri_table_list shadow-sm p-3 mb-5 bg-body rounded mt-3" style="border: rounded">
                                <div class="form-group">
                                    @if ($payment->status === 'pending')
                                    <li class="fw-bold">Belanja ({{ $payment->created_at }}) &nbsp; <span
                                        class="badge text-bg-warning">{{ $payment->status }}</span> &nbsp;
                                    PaymentID/{{ $payment->payment_id }} </li>
                                    @else
                                    <li class="fw-bold">Belanja ({{ $payment->created_at }}) &nbsp; <span
                                        class="badge text-bg-success">{{ $payment->status }}</span> &nbsp;
                                    PaymentID/{{ $payment->payment_id }} </li>
                                    @endif

                                    <li class="fw-bold">Jastiper : {{ $payment->jastiper->nama_jastiper }}</li>
                                    <li class="fw-bold">{{ $payment->order->pesanan }} ({{ $payment->order->jumlah }}
                                        {{ $payment->order->satuan }}) - {{ $payment->order->deskripsi }}</li>

                                </div>
                            </div>
                        @empty
                        @endforelse
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection
