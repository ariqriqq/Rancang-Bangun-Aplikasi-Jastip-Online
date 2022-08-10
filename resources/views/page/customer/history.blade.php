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
                                <img style="width: 50%;" src="https://bootdey.com/img/Content/avatar/avatar2.png"
                                    class="rounded" alt="avatar">
                            </div>
                            <label>Hi, {{ Auth()->user()->customer->name }}</label>
                        </div>
                    </div>
                    <div class="card-body" style=" padding:0">
                        <a type="button" class="btn btn-outline-secondary" style="width:100%; border-radius:0 0"
                            href="/myorder">Pesanan Saya</a>
                        <a type="button" class="btn btn-outline-secondary" style="width:100%; border-radius:0 0"
                            href="/riwayat-transaksi">Transaksi</a>
                        <a type="button" class="btn btn-outline-secondary" style="width:100%; border-radius:0 0"
                            href="/refund">Data Refund</a>
                    </div>
                </div>
            </div>
            <div class="col-9 col-md-8 col-lg-8 position-relative" style="height: 100%">
                <h3>Data Transaksi</h3>
                <form class="d-flex col-6 mb-3" role="search" method="post" action="/riwayat-transaksi/cari-idpesanan">
                    @method('POST')
                    @csrf
                    <input class="form-control me-2" type="search" name="keyword"
                        placeholder="Cari berdasarkan IDPesanan..." aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
                <div class="pri_table_list">
                    <ol>
                        <li>
                            <a type="btn" href="/myorder" class="btn btn-outline-secondary mt-3 mb-3">Menunggu
                                Pembayaran <i class="bi bi-cash-coin"></i></a>
                        </li>
                        <li>
                            <div class=""><a href="https://cekresi.com/tracking/cek-resi-jne.php" target="_blank">Lacak Paket JNE</a></div>&nbsp;|||&nbsp;
                            <div class=""><a href="https://resi.id/lacak-resi-jnt" target="_blank">Lacak Paket J&T</a></div>&nbsp;|||&nbsp;
                            <div class=""><a href="https://www.sicepat.com/checkAwb" target="_blank">Lacak Paket Sicepat</a></div>
                        </li>
                        @forelse($payment as $payment)
                            @csrf
                            <div class="pri_table_list shadow-sm p-3 mb-5 bg-body rounded mt-3" style="border: rounded">
                                <div class="form-group">
                                    <li class="fw-bold">IDPesanan : {{ $payment->order_id }}</li>
                                    @if ($payment->status === 'pending')
                                        <li class="fw-bold">Belanja ({{ $payment->created_at }}) &nbsp; <span
                                                class="badge badge-warning">{{ $payment->status }}</span> &nbsp;
                                            PaymentID/{{ $payment->payment_id }} </li>
                                    @else
                                        <li class="fw-bold">Belanja ({{ $payment->created_at }}) &nbsp; <span
                                                class="badge badge-success">{{ $payment->status }} / lunas</span> &nbsp;
                                            PaymentID/{{ $payment->payment_id }} </li>
                                    @endif

                                    <li class="fw-bold">Jastiper : {{ $payment->jastiper->nama_jastiper }} -
                                        ({{ $payment->jasa->kota_jasa }})
                                        - {{ $payment->jastiper->no_hp_jastiper }}</li>
                                    <li class="fw-bold">{{ $payment->order->pesanan }} ({{ $payment->order->jumlah }}
                                        {{ $payment->order->satuan }}) - {{ $payment->order->deskripsi }}</li>
                                    <li class="fw-bold">Kurir Pengiriman : {{ $payment->order->kurir }}</li>
                                    @if ($payment->order->resi_paket === null)
                                        <li class="fw-bold">No Resi : Menunggu Pengiriman Paket</li>
                                    @else
                                        <li class="fw-bold">No Resi : {{ $payment->order->resi_paket }} (Paket sudah dikirim)</li>
                                    @endif
                                    <li class="fw-bold">Total Pembayaran : </li>
                                    <li class="fw-bold">&nbsp;&nbsp; Harga Jasa/Uang Muka
                                        Rp{{ $payment->jasa->harga_jasa }}</li>
                                    <li class="fw-bold">&nbsp;&nbsp; Harga Pesanan Rp{{ $payment->order->total_harga }}
                                    </li>

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
