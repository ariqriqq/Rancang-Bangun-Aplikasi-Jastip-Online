@extends('admin.index')

@section('title')
    <title>Admin - Jastipol</title>
@endsection


@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Data Tagihan Pembayaran</h1>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Data Tagihan Pembayaran pada Jastiper</h4>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <tr>
                                        <th>Nama Jastiper</th>
                                        <th>IDPesanan</th>
                                        <th>Resi Paket</th>
                                        <th>IDPembayaran</th>
                                        <th>Uang Pesanan</th>
                                        <th>Uang Jasa</th>
                                        <th>Rekening</th>
                                        <th>Ewallet</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>

                                    @forelse($payment as $payment)
                                        @csrf
                                        <tr>
                                            <td class="font-weight-600">{{ $payment->jastiper->nama_jastiper }}</td>
                                            <td class="font-weight-600">{{ $payment->order_id }} </td>
                                            <td class="font-weight-600">{{ $payment->order->resi_paket }}({{ $payment->order->kurir }}) </td>
                                            <td class="font-weight-600">{{ $payment->payment_id }} </td>
                                            <td class="font-weight-600">{{ $payment->order->total_harga }},00</td>
                                            <td class="font-weight-600">{{ $payment->jasa->harga_jasa }},00</td>
                                            <td class="font-weight-600">{{ $payment->jastiper->nama_rekening }} -
                                                {{ $payment->jastiper->nomor_rekening }}
                                                ({{ $payment->jastiper->jenis_rekening }})
                                            </td>
                                            <td class="font-weight-600">{{ $payment->jastiper->nama_ewallet }} -
                                                {{ $payment->jastiper->nomor_ewallet }}
                                                ({{ $payment->jastiper->jenis_ewallet }}) </td>
                                            @if ($payment->order->resi_paket === null)
                                                <td class="font-weight-600">
                                                    <div class="badge badge-danger">Menunggu resi paket</div>
                                                </td>
                                            @elseif ($payment->order->status_tagihan === null)
                                                <td class="font-weight-600">
                                                    <div class="badge badge-warning">Belum dibayar</div>
                                                </td>
                                                <form action="/payment-confirm/{{ $payment->id }}" method="POST">
                                                    @csrf
                                                    <td>
                                                        <button type="submit" class="btn btn-primary">Bayar</button>

                                                    </td>
                                                </form>
                                            @else
                                                <td class="font-weight-600">
                                                    <div class="badge badge-success">{{ $payment->order->status_tagihan }}
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
