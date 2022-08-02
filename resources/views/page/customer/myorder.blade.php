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
                                <img style="width: 50%;" src="https://bootdey.com/img/Content/avatar/avatar2.png" class="rounded" alt="avatar" >
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
                            <th>Uang Muka (Harga Jasa)</th>
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
                                    <td>Rp{{ $order->jasa->harga_jasa }} - {{ $order->metode_pembayaran }} </td>
                                    <td>Rp{{ $order->total_harga }}</td>

                                    @if ($order->status === 'menunggu uang muka')
                                        <td>Menunggu Uang Muka</td>
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
                                    @endif

                                    @if ($order->status === 'menunggu uang muka')
                                        <td class="">
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#staticBackdrop">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </button>
                                            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
                                                data-bs-keyboard="false" tabindex="-1"
                                                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="staticBackdropLabel">Hapus Pesanan
                                                            </h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Apakah anda yakin akan menghapus pesanan ini?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <form action="{{ route('orderan.destroy', $order->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button class="btn btn-danger" type="submit">Hapus</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
