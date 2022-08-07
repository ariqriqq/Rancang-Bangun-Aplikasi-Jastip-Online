@extends('user.index')

@section('title')
    <title>Pesanan Customer - Jastipol</title>
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
                            href="/orderan">Pesanan
                            Customer</a>
                        <a type="button" class="btn btn-outline-secondary" style="width:100%; border-radius:0 0"
                            href="/history-orderan">Pengiriman Pemesanan</a>
                        <a type="button" class="btn btn-outline-secondary" style="width:100%; border-radius:0 0"
                            href="/tagihan">Data Tagihan</a>
                    </div>
                </div>
            </div>
            <div class="col-9" style="height: 100%">
                <h4>Pesanan Customer</h4>
                <div class="d-flex">
                    <form class="d-flex col-5 mb-3" role="search" method="post" action="/orderan/cari-idpesanan">
                        @method('POST')
                        @csrf
                        <input class="form-control me-2" type="search" name="keyword"
                            placeholder="Cari berdasarkan IDPesanan..." aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                    <div>&nbsp;&nbsp;&nbsp;&nbsp;</div>
                    <form class="d-flex col-5 mb-3" role="search" method="post" action="/orderan/cari-status">
                        @method('POST')
                        @csrf
                        <input class="form-control me-2" type="search" name="keyword"
                            placeholder="Cari berdasarkan Status Uang Muka..." aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">

                        <tr>
                            <th>IDPesanan</th>
                            <th>Customer</th>
                            <th>Tanggal</th>
                            <th>Pesanan</th>
                            <th>Expedisi</th>
                            <th>Alamat</th>
                            <th>No Hp</th>
                            <th>Uang Muka</th>
                            <th>Total Harga</th>
                            <th>Action</th>
                        </tr>
                        @forelse($data as $data)
                            @csrf
                            <tr>
                                @if ($data->payment_status != 'Ditolak')
                                    <td>{{ $data->id }}</td>
                                    <td>{{ $data->customer->name }}</td>
                                    <td>{{ $data->created_at }}</td>
                                    <td>{{ $data->pesanan }} ({{ $data->jumlah }} {{ $data->satuan }}) -
                                        {{ $data->deskripsi }}
                                    </td>
                                    <td>{{ $data->kurir }}</td>
                                    <td>{{ $data->customer->alamat }}</td>
                                    <td>{{ $data->customer->no_hp }}</td>
                                    @if ($data->status === 'menunggu uang muka')
                                        <td>
                                            <div class="badge badge-danger">{{ $data->status }}</div>
                                            Rp{{ $data->jasa->harga_jasa }}
                                        </td>
                                    @else
                                        <td>
                                            <div class="badge badge-success">{{ $data->status }} </div>
                                            Rp{{ $data->jasa->harga_jasa }}
                                        </td>
                                    @endif

                                    <td>Rp{{ $data->total_harga }}</td>

                                    @if ($data->status === 'menunggu uang muka')
                                        <td>Menunggu uang muka</td>
                                    @elseif ($data->payment_status != null)
                                        <td>
                                            <a href="/history-orderan">Lihat data pembayaran</a>
                                        </td>
                                    @elseif ($data->total_harga === null)
                                        <td>
                                            <form action="/form_pembayaran/{{ $data->id }}" method="GET">
                                                @csrf
                                                <button class="btn btn-primary mb-1" type="submit">Pembayaran</button>
                                            </form>

                                            <form action="/tolak_jasa/{{ $data->id }}" method='POST'>
                                                @csrf
                                                <button type="submit" class="btn btn-danger mt-3">Tolak Pesanan</button>
                                            </form>
                                        </td>
                                    @else
                                        <td>Menunggu pembayaran</td>
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
