@extends('user.index')

@section('title')
    <title>Pesanan Saya - Jastipol</title>
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
                <h4>Pesanan Saya</h4>
                <div class="d-flex">
                    <form class="d-flex col-5 mb-3" role="search" method="post" action="/myorder/cari-idpesanan">
                        @method('POST')
                        @csrf
                        <input class="form-control me-2" type="search" name="keyword"
                            placeholder="Cari berdasarkan IDPesanan..." aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                    <div>&nbsp;&nbsp;&nbsp;&nbsp;</div>
                    <form class="d-flex col-5 mb-3" role="search" method="post" action="/myorder/cari-jastiper">
                        @method('POST')
                        @csrf
                        <input class="form-control me-2" type="search" name="keyword"
                            placeholder="Cari berdasarkan nama Jastiper..." aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <tr>
                            <th>IDPesanan</th>
                            <th>Tanggal</th>
                            <th>Pesanan</th>
                            <th>Status Uang Muka</th>
                            <th>Nama Jastiper</th>
                            <th>Kota</th>
                            <th>Expedisi</th>
                            <th>Uang Muka</th>
                            <th>Total Harga Pesanan</th>
                            <th>Status Pesanan</th>
                            <th></th>
                        </tr>

                        @forelse($order as $order)
                            @csrf
                            <tr>
                                @if ($order->payment_status != 'Lunas')
                                    {{-- <td>{{ $loop->iteration }}</td> --}}
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->created_at }}</td>
                                    <td>{{ $order->pesanan }} ({{ $order->jumlah }} {{ $order->satuan }}) -
                                        {{ $order->deskripsi }}</td>
                                    @if ($order->status === 'menunggu uang muka')
                                        <td>
                                            <div class="badge badge-danger">{{ $order->status }}</div>
                                        </td>
                                    @else
                                        <td>
                                            <div class="badge badge-success">{{ $order->status }}</div>
                                        </td>
                                    @endif

                                    <td>{{ $order->jastiper->nama_jastiper }}</td>
                                    <td>{{ $order->jasa->kota_jasa }} </td>
                                    <td>{{ $order->kurir }}</td>
                                    @if ($order->uang_muka === null)
                                        <td>Belum Dibayar - {{ $order->metode_pembayaran }} </td>
                                    @else
                                        <td>Rp{{ $order->uang_muka }} - {{ $order->metode_pembayaran }}</td>
                                    @endif
                                    <td>Rp{{ $order->total_harga }}</td>

                                    @if ($order->status === 'menunggu uang muka')
                                        @if ($order->uang_muka === null)
                                            <form action="/uang_muka/{{ $order->id }}" method="get">
                                                @csrf

                                                <td>
                                                    <button type="submit" class="btn btn-primary">
                                                        <i class="">Bayar Uang Muka</i>
                                                    </button>
                                                </td>
                                            </form>
                                        @else
                                            <td>Menunggu konfirmasi</td>
                                            <td></td>
                                        @endif
                                    @elseif ($order->payment_status === 'Ditolak')
                                        <td>
                                            <div class='badge badge-danger'>Pesanan Ditolak</div>
                                            <a href="/refund">Refund Pembayaran</a>
                                        </td>
                                    @elseif ($order->total_harga === null)
                                        <td>
                                            Pesanan sedang dicari - Menunggu total harga
                                        </td>
                                    @elseif ($order->payment_status === null)
                                        <td>
                                            <form action="/payment/{{ $order->id }}" method="GET">
                                                @csrf
                                                <button class="btn btn-secondary mb-1" type="submit">Pay!</button>
                                            </form>
                                        </td>
                                        <td></td>
                                    @endif

                                    @if ($order->uang_muka === null)
                                        <td class="">
                                            <form action="{{ route('orderan.destroy', $order->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger" type="submit"><i
                                                        class="fa-solid fa-trash-can"></i></button>
                                            </form>
                                        </td>
                                    @endif
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
