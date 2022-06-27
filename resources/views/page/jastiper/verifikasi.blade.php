@extends('user.index')

@section('title')
    <title>Verifikasi Jastiper</title>
@endsection


@section('content')
    <div class="text-center mt-2 mb-4">
        <h3 class="shadow-sm p-3 mb-5 bg-body rounded">Verifikasi Data Jastiper</h3>
    </div>
    <div class="container mt-3">
        <div class="stepper-wrapper">
            <div class="stepper-item completed">
                <div class="btn step-counter">1</div>
                <p class="font-monospace">Informasi Pemilik Bisnis</p>
            </div>
            <div class="stepper-item completed">
                <div class="btn step-counter">2</div>
                <p class="font-monospace">Informasi Bank</p>
            </div>
        </div>
    </div>
    <form action="{{ route('jastiper.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="footer-content">
                        <div class="footer-head">
                            <div class="footer-logo ">
                                <h2>Informasi Pemilik Bisnis</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end single footer -->
                <div class="col-md-4">
                    <div class="footer-content">
                        <p class="fw-bold">Nama Pemilik Bisnis</p>
                        <div class="form-group">
                            <input type="text" name="nama_jastiper" class="form-control" placeholder="Nama Lengkap"
                                required>
                        </div>
                        <p class="fw-bold mt-3">No WA Aktif</p>
                        <div class="form-group">
                            <input type="text" name="no_hp_jastiper" class="form-control" placeholder="08123456789"
                                required>
                        </div>
                        <p class="fw-bold mt-3">Kota - Provinsi</p>
                        <div class="form-group">
                            <input type="text" name="kota_jastiper" class="form-control"
                                placeholder="Bandung - Jawa Barat" required>
                        </div>
                        <p class="fw-bold mt-3">Alamat</p>
                        <div class="form-group">
                            <input type="text" name="alamat_jastiper" class="form-control" placeholder="Alamat Lengkap"
                                required>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="footer-content">
                        <div class="footer-head">
                            <p class="fw-bold">Upload KTP Pemilik Bisnis</p>
                            <div>
                                <input name="ktp" type="file" accept="image/png|image/jpg|.pdf">

                                <p class="mt-3 fw-bold text-white" style="background-color: #28b3c9">&nbsp; <i
                                        class="fas fa-info"></i>
                                    &nbsp;Data identitas Anda
                                    hanya akan digunakan untuk
                                    &nbsp;memverifikasi akun.</p>
                                <h4 class="fw-bold mt-4">! Panduan Upload KTP</h4>
                                <p class="fst-italic">* Pastikan foto atau hasil scan jelas, tidak buram dan tidak
                                    terpotong.</p>
                                <p class="fst-italic">* Pastikan nama di KTP sama dengan nama pemilik bisnis.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mt-5 mb-5">
            <div class="row">
                <div class="col-md-4">
                    <div class="footer-content">
                        <div class="footer-head">
                            <div class="footer-logo ">
                                <h2>Informasi Bank</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end single footer -->
                <div class="col-md-4">
                    <div class="footer-content">
                        <p class="fw-bold">Nama Rekening</p>
                        <div class="form-group">
                            <input type="text" name="nama_rekening" class="form-control" placeholder="Nama Rekening*"
                                required>
                        </div>

                        <p class="fw-bold mt-3">Pilih Nama Bank</p>
                        <div class="form-group mt-3">
                            <select class="form-control" name="jenis_rekening">
                                <option selected disabled>Pilih Rekening </option>
                                <option value="BCA">Bank BCA </option>
                                <option value="BNI">Bank BNI </option>
                                <option value="Mandiri">Bank Mandiri </option>
                                <option value="Sinarmas">Bank Sinarmas </option>
                                <option value="BSI">Bank Syariah Indonesia (BSI) </option>
                                <option value="BNI">Bank BNI </option>
                            </select>
                        </div>

                        <p class="fw-bold mt-3">Nomor Rekening</p>
                        <div class="form-group">
                            <input type="text" name="nomor_rekening" class="form-control" placeholder="Nomor Rekening*"
                                required>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="footer-content">
                        <div class="footer-head">
                            <p class="fw-bold">E-Wallet</p>
                            <div class="form-group">
                                <input type="text" name="nama_ewallet" class="form-control"
                                    placeholder="Nama Rekening E-Wallet*" required>
                            </div>

                            <div>
                                <p class="fw-bold mt-3">Pilih Nama E-Wallet</p>
                                <div class="form-group mt-3">
                                    <select class="form-control" name="jenis_ewallet">
                                        <option selected disabled>Pilih Rekening </option>
                                        <option value="Dana">Dana </option>
                                        <option value="Ovo">Ovo </option>
                                        <option value="GoPay">GoPay </option>
                                    </select>
                                </div>
                            </div>

                            <p class="fw-bold mt-3">Nomor E-Wallet</p>
                            <div class="form-group">
                                <input type="text" name="nomor_ewallet" class="form-control" placeholder="Nomor E-Wallet*"
                                    required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-5">Verifikasi</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
