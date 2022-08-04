@extends('admin.index')

@section('title')
    <title>Admin - Jastipol</title>
@endsection


@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Pembayaran Uang Muka</h1>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Invoices</h4>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table  table-hover">
                                    <tr>
                                        <th>ID Pesanan</th>
                                        <th>Nama Customer</th>
                                        <th>Nama Jastiper</th>
                                        <th>Metode Pembayaran</th>
                                        <th>No.Hp Customer</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>

                                    @forelse($order as $order)
                                        @csrf
                                        <tr>
                                            <td>{{ $order->id }}</td>
                                            <td class="font-weight-600">{{ $order->customer->name }}</td>
                                            <td class="font-weight-600">{{ $order->jastiper->nama_jastiper }}</td>
                                            <td><img width="200px" src="">{{ $order->metode_pembayaran }} (Rp{{ $order->jasa->harga_jasa }})</td>
                                            <td>{{ $order->customer->no_hp }}</td>
                                            @if ($order->status === 'menunggu uang muka')
                                                <td>
                                                    <div class="badge badge-danger">{{ $order->status }}</div>
                                                </td>

                                            <td>
                                                <form method='POST' action='/validasi-pembayaran/{{ $order->id }}'>
                                                    @csrf
                                                    <button type="submit" class="btn btn-primary">Verifikasi</button>
                                                </form>
                                            </td>
                                            @else
                                                <td>
                                                    <div class="badge badge-success">{{ $order->status }}</div>
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
            </div>
        </section>
    </div>
@endsection
