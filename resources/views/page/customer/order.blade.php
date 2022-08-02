@extends('user.index')

@section('title')
    <title>Pesan Jasa - Jastipol</title>
@endsection

@section('content')
    <div class="container-fluid mt-4 mb-3">
        <div class="row mx-auto">
            <div class="col-2">
                <div class="card shadow p-3 mb-5 bg-body rounded">
                    <div class="card-header ">
                        <h4>Cari Jasa</h4>
                    </div>
                    <form class="d-flex mb-4" method="post" action="/order/cari">
                        @method('POST')
                        @csrf
                    <div class="card-body">
                        <h5 class="card-text">Kota Jastiper</h5>
                        <input type="search" name="keyword" class="form-control" placeholder="Cari kota..">
                        <button class="btn btn-primary mt-3" type="submit">Cari</button>
                    </div>
                </form>
                </div>
            </div>
            <div class="col-10" style="height: 100%">
                <div class="row">

                    @forelse ($jasa as $jasa)
                    @if ( $jasa->tanggal_tutup > now())
                    <div class="col-4 mb-3">
                        <div class="pri_table_list">
                            <h3>{{ $jasa->kota_jasa }}<br /> <span>Harga Jasa : Rp{{ $jasa->harga_jasa }}</span>
                            </h3>
                            <ol>
                                <li class="check"><i class="bi "></i><span>Batas tanggal pemesanan :
                                        {{ $jasa->tanggal_tutup }}</span></li>
                                <li class="check"><i class="bi "></i><span>Nama Jastiper : {{ $jasa->jastiper->nama_jastiper }}
                                        {{ $jasa->uang_muka }}</span></li>
                                <li class="check"><i class="bi bi-check"></i><span>Seluruh Pembayaran Pada Admin </span></li>

                            </ol>
                            <form action="/form-order/{{ $jasa->id }}" method="post" >
                                @csrf
                                <button>Pesan Jasa</button>
                            </form>
                        </div>
                    </div>
                    @else
                    <div class="col-4 mb-3">
                        <div class="pri_table_list">
                            <h3>{{ $jasa->kota_jasa }}<br /> <span>Harga Jasa : Rp{{ $jasa->harga_jasa }}</span>
                            </h3>
                            <ol>
                                <li class="check"><i class="bi "></i><span>Batas tanggal pemesanan :
                                        {{ $jasa->tanggal_tutup }}</span></li>
                                <li class="check"><i class="bi "></i><span>Nama Jastiper : {{ $jasa->jastiper->nama_jastiper }}
                                        {{ $jasa->uang_muka }}</span></li>
                                <li class="check"><i class="bi bi-check"></i><span>Seluruh Pembayaran Pada Admin </span></li>

                            </ol>
                                <button disabled>Orderan ditutup</button>
                        </div>
                    </div>
                    @endif

                    @empty
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection
