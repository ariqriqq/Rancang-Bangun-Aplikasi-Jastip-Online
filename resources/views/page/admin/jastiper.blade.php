@extends('admin.index')

@section('title')
    <title>Jastiper - Jastipol</title>
@endsection


@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Data Jastiper</h1>
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
                                        <th>Kota</th>
                                        <th>Nama Rekening</th>
                                        <th>Nama E-Wallet</th>
                                        <th>Tagihan Jasa</th>

                                    </tr>
                                    @forelse($jastiper as $jastiper)
                                        @csrf
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td class="font-weight-600">{{ $jastiper->nama_jastiper }}</td>
                                            <td class="font-weight-600">{{ $jastiper->no_hp_jastiper }}</td>
                                            <td class="font-weight-600">{{ $jastiper->kota_jastiper }}</td>
                                            <td class="font-weight-600">{{ $jastiper->nama_rekening }} -
                                                {{ $jastiper->nomor_rekening }} ({{ $jastiper->jenis_rekening }})</td>
                                            <td class="font-weight-600">{{ $jastiper->nama_ewallet }} -
                                                {{ $jastiper->nomor_ewallet }} ({{ $jastiper->jenis_ewallet }})</td>

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
