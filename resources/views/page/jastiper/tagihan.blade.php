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
                                <img style="width: 50%;" src="https://bootdey.com/img/Content/avatar/avatar2.png" class="rounded" alt="avatar" >
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
                <h4>Tagihan Pembayaran</h4>
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
                    <table class="table table-bordered table-hover">

                        <tr>
                            <th>IDPesanan</th>
                            <th>Uang Muka</th>
                            <th>Total Harga</th>
                            <th>Status</th>
                        </tr>
                        @forelse($data as $data)
                            @csrf
                            @if ($data->payment_status === 'Lunas')
                                <tr>
                                    <td>{{ $data->id }}</td>
                                    @if ($data->status === 'menunggu uang muka')
                                        <td>
                                            Rp{{ $data->jasa->harga_jasa }}

                                        </td>
                                    @else
                                        <td>
                                            Rp{{ $data->jasa->harga_jasa }}
                                        </td>
                                    @endif

                                    <td>Rp{{ $data->total_harga }}</td>

                                    @if ($data->status_tagihan != null)
                                        <td>
                                            <div class="badge badge-success">{{ $data->status_tagihan }} </div>
                                        </td>
                                    @elseif ($data->resi_paket === null)
                                        <td>
                                            <div class="badge badge-danger">Menunggu pengiriman pesanan </div>
                                        </td>
                                    @else
                                        <td>
                                            <div class="badge badge-danger">Menunggu pembayaran </div>
                                        </td>
                                    @endif
                                </tr>
                            @endif
                        @empty
                        @endforelse
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
