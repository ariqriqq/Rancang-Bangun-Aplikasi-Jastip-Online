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
                                <img src="..." class="rounded" alt="...">
                            </div>
                            <label>Hi, {{ Auth()->user()->name }}</label>
                        </div>
                    </div>
                    <div class="card-body" style=" padding:0">
                        <a type="button" class="btn btn-outline-secondary" style="width:100%; border-radius:0 0"
                            href="/orderan">Pesanan
                            Customer</a>
                        <a type="button" class="btn btn-outline-secondary" style="width:100%; border-radius:0 0"
                            href="/history-orderan">Pengiriman Pemesanan</a>
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
                            placeholder="Cari berdasarkan Status..." aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-md bg-light text-dark">

                        <tr>
                            <th>IDPesanan</th>
                            <th>Tanggal</th>
                            <th>Pesanan</th>
                            <th>Expedisi</th>
                            <th>Alamat</th>
                            <th>No Hp</th>
                            <th>Status</th>
                            <th>Total Pembayaran</th>
                            <th>Action</th>
                        </tr>
                        @forelse($data as $data)
                            @csrf
                            <tr>
                                <td>{{ $data->id }}</td>
                                <td>{{ $data->created_at }}</td>
                                <td>{{ $data->pesanan }} ({{ $data->jumlah }} {{ $data->satuan }}) - {{ $data->deskripsi }}
                                </td>
                                <td>{{ $data->kurir }}</td>
                                <td>{{ $data->customer->alamat }}</td>
                                <td>{{ $data->customer->no_hp }}</td>
                                <td>{{ $data->status }} (Rp{{ $data->jasa->harga_jasa }})</td>
                                <td>Rp{{ $data->total_harga }}</td>
                                <td class="">
                                    @if ($data->status === 'menunggu uang muka')
                                <td></td>
                            @elseif ($data->total_harga != null)
                                <a href="/history-orderan">Lihat data pembayaran</a>
                            @elseif ($data->status === 'Uang Muka Terverifikasi')
                                <form action="/form_pembayaran/{{ $data->id }}" method="GET">
                                    @csrf
                                    <button class="btn btn-primary mb-1" type="submit">Pembayaran</button>
                                </form>
                        @endif
                        {{-- <a href="{{ route('orderan') }}" class="btn btn-primary mb-2 mr-2">Edit</a> --}}
                        {{-- <form action="" method="POST">
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                    </form> --}}
                        </td>
                        </tr>
                    @empty
                        @endforelse
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
