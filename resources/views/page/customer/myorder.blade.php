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
                            href="/pembayaran">Pembayaran</a>
                        <a type="button" class="btn btn-outline-secondary" style="width:100%; border-radius:0 0"
                            href="/history">History Pemesanan</a>
                    </div>
                </div>
            </div>
            <div class="col-9" style="height: 100%">
                <h4>Pesanan Saya</h4>

                <div class="table-responsive">
                    <table class="table table-bordered table-md bg-light text-dark">
                        <tr>
                            <th>No</th>
                            {{-- <th>Id Pesanan</th> --}}
                            <th>Tanggal</th>
                            <th>Pesanan</th>
                            <th>Status</th>
                            <th>Nama Jastiper</th>
                            <th>Kota</th>
                            <th>Expedisi</th>
                            <th>Uang Muka (Harga Jasa)</th>
                            <th>Total Harga Pesanan</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>

                        @forelse($order as $order)
                            @csrf
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $order->created_at }}</td>
                                <td>{{ $order->pesanan }} ({{ $order->jumlah }} {{ $order->satuan }}) -
                                    {{ $order->deskripsi }}</td>
                                <td>{{ $order->status }}</td>
                                <td>{{ $order->jastiper->nama_jastiper }}</td>
                                <td>{{ $order->jasa->kota_jasa }} </td>
                                <td>{{ $order->kurir }}</td>
                                <td>Rp{{ $order->jasa->harga_jasa }} - {{ $order->metode_pembayaran }} </td>
                                <td>Rp{{ $order->total_harga }}</td>
                                <td></td>
                                @if ($order->status==='menunggu uang muka')
                                <td class="">
                                    <form action="{{ route('orderan.destroy', $order->id) }}" method="POST">
                                        @csrf
                                        @method("DELETE")
                                        <button class="btn btn-danger" type="submit">Hapus Pesanan</button>
                                    </form>
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
