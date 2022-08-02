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
                                <img style="width: 50%;" src="https://bootdey.com/img/Content/avatar/avatar2.png" class="rounded" alt="avatar" >
                            </div>
                            <label>Hi, {{ Auth()->user()->customer->name }}</label>
                        </div>
                    </div>
                    <div class="card-body" style=" padding:0">
                        <a type="button" class="btn btn-outline-secondary" style="width:100%; border-radius:0 0"
                            href="/orderan">Pesanan
                            Customer</a>
                        <a type="button" class="btn btn-outline-secondary" style="width:100%; border-radius:0 0"
                            href="/history-orderan">Pengiriman Pesanan</a>
                        <a type="button" class="btn btn-outline-secondary" style="width:100%; border-radius:0 0"
                            href="/tagihan">Data Tagihan</a>
                    </div>
                </div>
            </div>
            <div class="col-9 col-md-8 col-lg-8 position-relative" style="height: 100%">
                <h4>Daftar Pesanan Yang Harus Dikirim</h4>
                <form class="d-flex col-6 mb-3" role="search" method="post" action="/history-orderan/cari-idpesanan">
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
                        <li>
                            <div class="badge badge-danger fs-6">Catat No Resi saat pengiriman paket. Jika nomor resi paket tidak sesuai, tagihan tidak akan dikirim</div>
                        </li>

                        @forelse($payment as $payment)
                            @csrf
                            @if ($payment->status === 'settlement')
                                <div class="pri_table_list shadow-sm p-3 mb-5 bg-body rounded mt-3 " style="border: rounded">
                                    <div class="form-group">
                                        <li class="fw-bold">IDPesanan : {{ $payment->order->id }}</li>
                                        @if ($payment->status === 'pending')
                                            <li class="fw-bold">Pembayaran ({{ $payment->created_at }}) &nbsp; <span
                                                    class="badge badge-warning">{{ $payment->status }}</span> &nbsp;
                                                PaymentID/{{ $payment->payment_id }} </li>
                                        @else
                                            <li class="fw-bold">Pembayaran ({{ $payment->created_at }}) &nbsp; <span
                                                    class="badge badge-success">{{ $payment->status }} (lunas)</span>
                                                &nbsp;
                                                PaymentID/{{ $payment->payment_id }} </li>
                                        @endif

                                        <li class="fw-bold">Data Customer : {{ $payment->customer->name }}
                                            ({{ $payment->customer->no_hp }})
                                        </li>
                                        <li class="fw-bold">Alamat Pengiriman : Rumah. {{ $payment->customer->alamat }}
                                        </li>
                                        <li class="fw-bold">Pesanan : {{ $payment->order->pesanan }}
                                            ({{ $payment->order->jumlah }}
                                            {{ $payment->order->satuan }}) - {{ $payment->order->deskripsi }}</li>
                                        <li class="fw-bold">Kurir Pengiriman : {{ $payment->order->kurir }} </li>
                                        <li class="fw-bold">Nomor Resi Pengiriman : {{ $payment->order->resi_paket }} &nbsp;&nbsp;&nbsp;
                                        @if ($payment->order->resi_paket === null)
                                        <form action="/resi_paket/{{ $payment->id }}" method="GET">
                                            @csrf
                                            <button type="submit" >Tambahkan No Resi Paket</button>
                                        </form>
                                        @endif

                                        </li>
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
