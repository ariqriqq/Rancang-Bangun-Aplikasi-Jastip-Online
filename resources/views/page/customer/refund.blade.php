@extends('user.index')

@section('title')
    <title>Pesanan Customer - Jastipol</title>
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
            <div class="col-9" style="height: 100%">
                <h4>Data Refund Transaksi</h4>
                <div class="mb-3"><a href="/customer" >Pastikan data E-Wallet sudah benar</a></div>

                {{-- <div class="d-flex">
                    <form class="d-flex col-5 mb-3" role="search" method="post" action="/orderan/cari-idpesanan">
                        @method('POST')
                        @csrf
                        <input class="form-control me-2" type="search" name="keyword"
                            placeholder="Cari berdasarkan IDPesanan..." aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                    <div>&nbsp;&nbsp;&nbsp;&nbsp;</div>
                    <form class="d-flex col-5 mb-3" role="search" method="post" action="/orderan/cari-status">
                        @method('POST')
                        @csrf
                        <input class="form-control me-2" type="search" name="keyword"
                            placeholder="Cari berdasarkan Status..." aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div> --}}
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">

                        <tr>
                            <th>IDPesanan</th>
                            <th>Total Refund</th>
                            <th>Status Pesanan</th>
                            <th>Status Refund</th>
                        </tr>
                        @forelse($order as $order)
                            @csrf
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>Rp{{ $order->jasa->harga_jasa }}</td>
                                <td>{{ $order->payment_status }}</td>
                                @if ($order->status_refund === null)
                                    <td>
                                        <div class="badge badge-secondary">Menunggu pembayaran</div>
                                    </td>
                                @else
                                    <td>
                                        <div class="badge badge-success">{{ $order->status_refund }}</div>
                                    </td>
                                @endif
                            </tr>
                        @empty
                        @endforelse
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
