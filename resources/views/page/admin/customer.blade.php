@extends('admin.index')

@section('title')
    <title>Customer - Jastipol</title>
@endsection


@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Data Customer</h1>
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
                                        <th>Nama</th>
                                        <th>No Hp</th>
                                        <th>Alamat</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Nama E-Wallet</th>
                                        <th>Tagihan Jasa</th>

                                    </tr>
                                    @forelse($data as $data)
                                        @csrf
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td class="font-weight-600">{{ $data->name }}</td>
                                            <td class="font-weight-600">{{ $data->customer->no_hp }}</td>
                                            <td class="font-weight-600">{{ $data->customer->alamat }}</td>
                                            <td class="font-weight-600">{{ $data->customer->jenis_kelamin }}</td>
                                            <td class="font-weight-600"></td>

                                            {{-- <form method='POST' action='/validasi-pembayaran/{{ $order->id }}'>
                                        @csrf --}}
                                            <td>
                                                <button type="submit" class="btn btn-primary">Lihat</button>
                                            </td>
                                            {{-- </form> --}}
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
