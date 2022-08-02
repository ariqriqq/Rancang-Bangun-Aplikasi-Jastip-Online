@extends('user.index')

@section('title')
    <title>Pesan Jasa - Jastipol</title>
@endsection

@section('content')
    <form action="/myorder" method="post">
        @csrf
        <div class="container">
            <div class="row mt-5 mb-5">
                <div class="col-md-4 ">
                    <div class="footer-content">
                        <div class="footer-head">
                            <div class="footer-logo ">
                                <h2>Informasi Jasa</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end single footer -->

                <div class="col-md-4 ">
                    <div class="footer-content">
                        <p class="fw-bold">Kota Jastiper</p>
                        <div class="form-group">
                            <input type="text" name="kota_jastiper" class="form-control" value="{{ $data->kota_jasa }}"
                                required disabled>
                        </div>
                        <input type="text" name="kota_jastiper" class="form-control" value="{{ auth()->user()->id }}"
                            required hidden>
                        <p class="fw-bold mt-3">Harga Jasa</p>
                        <div class="form-group">
                            <input type="text" name="no_hp_jastiper" class="form-control" value="{{ $data->harga_jasa }}"
                                required disabled>
                        </div>


                    </div>
                </div>
                <div class="col-md-4">
                    <div class="footer-content">
                        <div class="footer-head">
                            <p class="fw-bold">Nama Jastiper</p>

                            <input type="text" name="nama_ewallet" class="form-control"
                                value="{{ $data->jastiper->nama_jastiper }}" required disabled>

                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row mt-5 mb-5">
                    <div class="col-md-4 ">
                        <div class="footer-content">
                            <div class="footer-head">
                                <div class="footer-logo ">
                                    <h2>Pengiriman dan Pemesanan</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end single footer -->
                    <div class="col-md-4 ">
                        <div class="footer-content">
                            <p class="fw-bold">Nama</p>
                            <div class="form-group">
                                <input type="text" name="kota_jastiper" class="form-control"
                                    value="{{ auth()->user()->customer->name }}" placeholder required disabled>
                            </div>

                            <div class="form-group">
                                <input type="text" name="jasa_id" class="form-control" value="{{ $data->id }}"
                                    placeholder required hidden>
                            </div>
                            <div class="form-group">
                                <input type="text" name="jastiper_id" class="form-control"
                                    value="{{ $data->jastiper_id }}" placeholder required hidden>
                            </div>
                            <div class="form-group">
                                <input type="text" name="customer_id" class="form-control"
                                    value="{{ auth()->user()->customer->id }}" placeholder required hidden>
                            </div>


                            <div class="form-group">
                                <input type="text" name="status" class="form-control" value="menunggu uang muka"
                                    placeholder required hidden>
                            </div>

                            <p class="fw-bold mt-3">Alamat Pengiriman</p>
                            <div class="form-group">
                                <input type="text" name="no_hp_jastiper" class="form-control"
                                    value="Rumah - {{ auth()->user()->customer->alamat }}" required disabled>
                            </div>

                            <p class="fw-bold mt-3">Kurir</p>
                            <div class="form-group mt-3">
                                <select class="form-control" name="kurir" required>
                                    <option selected disabled>Pilih Kurir Pesanan </option>
                                    <option value="SiCepat Reg">SiCepat Reg </option>
                                    <option value="J&T Reg">J&T Reg </option>
                                    <option value="JNE Reg">JNE Reg</option>
                                </select>
                            </div>

                            <p class="fw-bold mt-3">Pesanan</p>
                            <div class="form-group">
                                <input type="text" name="pesanan" class="form-control" placeholder="Kerupuk Kulit"
                                    required>
                            </div>

                            <p class="fw-bold mt-3">Deskripsi Produk</p>
                            <div class="form-group">
                                <input type="text" name="deskripsi" class="form-control" placeholder="Nama merk/toko"
                                    required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="footer-content">
                            <div class="footer-head">
                                <p class="fw-bold">No Handphone</p>

                                <input type="text" name="nama_ewallet" class="form-control"
                                    value="{{ auth()->user()->customer->no_hp }}" required disabled>

                                <p class="fw-bold mt-3">Uang Muka yang Harus Dibayar</p>
                                <input type="text" name="nomor_ewallet" class="form-control"
                                    value="{{ $data->harga_jasa }}" required disabled>

                                <p class="fw-bold mt-3">Metode Pembayaran Uang Muka</p>
                                <div class="form-group mt-3">
                                    <select class="form-control" name="metode_pembayaran" required>
                                        <option selected disabled>Pilih Rekening </option>
                                        <option value="Dana">Dana - 087727115750</option>
                                        <option value="Ovo">Ovo - 087727115750</option>
                                    </select>
                                </div>

                            </div>
                            <div class="form-group row ">
                                <div class=" col-6">
                                    {{-- <div class="footer-head "> --}}
                                    <p class="fw-bold ">Jumlah</p>
                                    <input type="text" name="jumlah" class="form-control" placeholder="1" required>

                                    {{-- </div> --}}
                                </div>

                                <div class=" col-6">
                                    {{-- <div class="footer-head "> --}}
                                    <p class="fw-bold ">Satuan</p>
                                    <select class="form-control" name="satuan" required>
                                        <option selected disabled>Pilih Satuan </option>
                                        <option value="Buah">Buah</option>
                                        <option value="Pack">Pack</option>
                                        <option value="Bungkus">Bungkus</option>
                                        <option value="Kg">Kg</option>
                                    </select>

                                    {{-- </div> --}}
                                </div>
                            </div>
                            <div class="badge badge-danger">***Pastikan data pribadi pada profil sudah benar</div>
                        </div>
                    </div>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal"
                        data-bs-target="#staticBackdrop">
                        Pesan
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Membuat Pesanan</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Pastikan semua data yang terisi sudah benar
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Pesan Sekarang</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
