@extends('user.style-daftar')

@section('title')
    <title>Daftar Akun</title>
@endsection

@section('content')
    <div class="wrapper mt-4 mb-4">
        <h2>Registration</h2>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="input-box">
                <input id="name" name="name"type="text" placeholder="Nama Lengkap" required>

            </div>
            <input id="user_id" name="user_id"type="text" hidden>
            <div class="input-box">
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                    placeholder="Alamat Email" required>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="input-box">
                <input type="text" name="alamat" placeholder="Alamat Lengkap" required>
            </div>
            <div class="input-box">
                <input type="text" name="no_hp" placeholder="No HP (WA Aktif)" required>
            </div>
            <div class="input-box">
                <select class="form-control" name="jenis_kelamin">
                    <option selected disabled>Pilih Jenis Kelamin</option>
                    <option value="Laki-Laki">Laki-Laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
            <div class="input-box">
                <input type="date" name="tanggal_lahir" placeholder="Tanggal Lahir" required>
            </div>
            <div class="input-box">
                <input type="password" name="password" placeholder="Create password" required>
            </div>
            <div class="input-box">
                <input type="password" name="password_confirmation" placeholder="Confirm password" required>
            </div>
            <div class="input-box button">
                <input type="Submit" value="Daftar">
            </div>
            <div class="text">
                <h3>Sudah Punya Akun? <a href="/login">Login</a></h3>
            </div>
            <div class="text">
                <h3>Kembali Ke Halaman Utama <a href="/">Back</a></h3>
            </div>
        </form>
    </div>
@endsection
