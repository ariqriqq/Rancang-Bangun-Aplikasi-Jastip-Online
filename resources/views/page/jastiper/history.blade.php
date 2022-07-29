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
                            href="/orderan">Pesanan
                            Customer</a>
                        <a type="button" class="btn btn-outline-secondary" style="width:100%; border-radius:0 0"
                            href="/history-orderan">Pengiriman Pesanan</a>
                    </div>
                </div>
            </div>
            <div class="col-9 col-md-8 col-lg-8 position-relative" style="height: 100%">
                <h3>Daftar Pesanan Yang Harus Dikirim</h3>
                <form class="d-flex col-5 mb-3" role="search" method="post" action="/history-orderan/cari-idpesanan">
                    @method('POST')
                    @csrf
                    <input class="form-control me-2" type="search" name="keyword"
                        placeholder="Cari berdasarkan IDPesanan..." aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
                <div class="pri_table_list">
                    <ol>
                        <li>
                            <a type="btn" href="/orderan" class="btn btn-outline-secondary mt-3 mb-3">Menunggu
                                Pembayaran <i class="bi bi-cash-coin"></i></a>

                        </li>
                        @forelse($payment as $payment)
                            @csrf
                            @if ($payment->status === 'settlement')
                                <div class="pri_table_list shadow-sm p-3 mb-5 bg-body rounded mt-3" style="border: rounded">
                                    <div class="form-group">
                                        <li class="fw-bold">IDPesanan : {{ $payment->order->id }}</li>
                                        @if ($payment->status === 'pending')
                                            <li class="fw-bold">Pembayaran ({{ $payment->created_at }}) &nbsp; <span
                                                    class="badge text-bg-warning">{{ $payment->status }}</span> &nbsp;
                                                PaymentID/{{ $payment->payment_id }} </li>
                                        @else
                                            <li class="fw-bold">Pembayaran ({{ $payment->created_at }}) &nbsp; <span
                                                    class="badge text-bg-success">{{ $payment->status }} (lunas)</span>
                                                &nbsp;
                                                PaymentID/{{ $payment->payment_id }} </li>
                                        @endif

                                        <li class="fw-bold">Data Customer : {{ $payment->jastiper->nama_jastiper }}
                                            ({{ $payment->customer->no_hp }})
                                        </li>
                                        <li class="fw-bold">Alamat Pengiriman : Rumah. {{ $payment->customer->alamat }}
                                        </li>
                                        <li class="fw-bold">Pesanan : {{ $payment->order->pesanan }}
                                            ({{ $payment->order->jumlah }}
                                            {{ $payment->order->satuan }}) - {{ $payment->order->deskripsi }}</li>
                                        <li class="fw-bold">Kurir Pengiriman : {{ $payment->order->kurir }} </li>
                                    </div>
                                </div>
                            @endif
                        @empty
                        @endforelse
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection
