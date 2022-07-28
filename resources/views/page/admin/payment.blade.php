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
                                <table class="table table-striped">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Status</th>
                                        <th>Total Pembayaran</th>
                                        <th>ID Pesanan</th>
                                        <th>Action</th>

                                    </tr>
                                    @forelse($payment as $payment)
                                        @csrf
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td class="font-weight-600">{{ $payment->name }}</td>
                                            <td class="font-weight-600">{{ $payment->status }}</td>
                                            <td class="font-weight-600">{{ $payment->gross_amount }}</td>
                                            <td class="font-weight-600">{{ $payment->payment_id }} </td>

                                            <form method='POST' action='/payment-update/{{ $payment->id }}'>
                                        @csrf
                                            @if ($payment->status === 'pending')
                                                <td>
                                                    <button type="submit" class="btn btn-primary">Verifikasi</button>
                                                </td>
                                            @endif
                                            </form>
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
