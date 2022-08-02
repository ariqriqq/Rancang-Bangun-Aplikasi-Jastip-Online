@extends('admin.index')

@section('title')
    <title>Jastiper - Jastipol</title>
@endsection


@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Data Pembayaran</h1>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Data Pembayaran dengan Midtrans</h4>
                            <div class="card-header-action">
                                <a href="#" class="btn btn-danger">View More <i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <tr>
                                        <th>IDPesanan</th>
                                        <th>Nama Customer</th>
                                        <th>Status</th>
                                        <th>Total Pembayaran</th>
                                        <th>IDPembayaran</th>
                                        <th>Action</th>

                                    </tr>
                                    @forelse($payment as $payment)
                                        @csrf
                                        <tr>
                                            <td class="font-weight-600">{{ $payment->order_id }}</td>
                                            <td class="font-weight-600">{{ $payment->name }}</td>
                                            @if ($payment->status === 'settlement')
                                            <td class="font-weight-600">
                                                <div class="badge badge-success">{{ $payment->status }}</div>
                                             </td>
                                            @else
                                            <td class="font-weight-600">
                                                <div class="badge badge-warning">{{ $payment->status }}</div>
                                             </td>
                                            @endif

                                            <td class="font-weight-600">{{ $payment->gross_amount }}</td>
                                            <td class="font-weight-600">{{ $payment->payment_id }} </td>

                                            @if ($payment->status === 'pending')
                                                <form method='POST' action='/payment-update/{{ $payment->id }}'>
                                                    @csrf
                                                    <td>
                                                        <button type="submit" class="btn btn-primary">Verifikasi</button>
                                                    </td>
                                                </form>
                                            @elseif ($payment->order->payment_status === null)
                                                <form method='POST' action='/payment-update/{{ $payment->id }}'>
                                                    @csrf
                                                    <td>
                                                        <button type="submit" class="btn btn-primary">Konfirmasi</button>
                                                    </td>
                                                </form>
                                            @else
                                                <form action="/payment-confirm/{{ $payment->id }}" method="post">
                                                    @csrf
                                                    <td>
                                                        <a href="/payment_data/{{ $payment->id }}"class="btn btn-primary">Lihat
                                                            Tagihan</a>
                                                    </td>
                                                </form>
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
