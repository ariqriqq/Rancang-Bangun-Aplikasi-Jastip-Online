@extends('admin.index')

@section('title')
    <title>Ecommerce Dashboard - Jastipol</title>
@endsection


@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Verifikasi Pembayaran</h1>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Invoices</h4>
                            <div class="card-header-action">
                                <a href="#" class="btn btn-danger">View More <i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Customer</th>
                                        <th>Nama Jastiper</th>
                                        <th>Alamat</th>
                                        <th>Metode Pembayaran</th>
                                        <th>No Hp</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>

                                    @forelse($order as $order)
                                        @csrf
                                        {{-- @if ($order->status==='menunggu uang muka') --}}
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td class="font-weight-600"></td>
                                            <td class="font-weight-600">{{ $order->jastiper->nama_jastiper }}</td>
                                            <td class="font-weight-600">{{ $order->customer->alamat }}</td>
                                            <td><img width="200px" src="">{{ $order->metode_pembayaran }}</td>
                                            <td>{{ $order->customer->no_hp }}</td>
                                            <td>
                                                <div class="badge badge-success">{{ $order->status }}</div>
                                            </td>
                                            <form method='POST' action='/validasi-pembayaran/{{ $order->id }}'>
                                            @csrf
                                            <td>
                                                <button type="submit" class="btn btn-primary">Verifikasi</button>
                                            </td>
                                            </form>
                                        </tr>
                                        {{-- @endif --}}
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
