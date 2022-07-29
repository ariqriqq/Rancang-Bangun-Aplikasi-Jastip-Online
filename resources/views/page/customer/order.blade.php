@extends('user.index')

@section('title')
    <title>Pesan Jasa - Jastipol</title>
@endsection

@section('content')
    <div class="mt-4 mb-3">
        <div class="row mx-auto">
            <div class="col-2">
                <div class="card bg-info">
                    <div class="card-header">
                        <h4>Cari Info Jastiper</h4>
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
                    {{-- @for ($i = 0; $i < 100; $i++) --}}
                    @forelse ($jasa as $jasa)
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
                                <a href="/bukajasa/{{ $jasa->id }}" class="btn btn-secondary mb-3">Pesan Jasa</a>
                            </div>
                        </div>
                    @empty
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection
