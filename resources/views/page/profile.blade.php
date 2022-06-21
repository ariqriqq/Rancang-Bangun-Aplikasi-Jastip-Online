@extends('user.index')
@section('title')
    <title>Profile</title>
@endsection

@section('content')
    <div class="container mt-3 mb-5">
        <div class="section-body">
            <div class="footer-content text-center">
                <div class="footer-head">
                    <div class="footer-logo ">
                        <h2>Informasi Akun</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-8 col-lg-6">

                    <div class="card">
                        <div class="card-header text-center">
                            <h4>Detail Akun</h4>
                        </div>

                        <form action="{{ route('customer.update', auth()->user()->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="fw-bold">Nama Lengkap</label>
                                    <input type="text" value="{{ $user->name }}" name="name"
                                        class="form-control  @error('name') is-invalid @enderror" required
                                        autocomplete="name" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mt-3">
                                    <label class="fw-bold">Email</label>
                                    <input type="text" value="{{ $user->email }}" name="email"
                                        class="form-control @error('email') is-invalid @enderror" required
                                        autocomplete="email" autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mt-3">
                                    <label class="fw-bold">Alamat Lengkap</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="bi bi-house-fill"></i>
                                            </div>
                                        </div>
                                        <input type="text" value="{{ $user->customer->alamat }}" name="alamat"
                                            class="form-control  @error('alamat') is-invalid @enderror" required
                                            autocomplete="alamat" autofocus>
                                        @error('alamat')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group mt-3">
                                    <label class="fw-bold">Nomor Handphone (WA Aktif)</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="bi bi-phone-vibrate-fill"></i>
                                            </div>
                                        </div>
                                        <input type="text" value="{{ $user->customer->no_hp }}" name="no_hp"
                                            class="form-control phone-number @error('no_hp') is-invalid @enderror" required
                                            autocomplete="no_hp" autofocus>
                                        @error('no_hp')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group mt-3">
                                    <label class="fw-bold">Jenis Kelamin</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="bi bi-gender-ambiguous"></i>
                                            </div>
                                        </div>
                                        <select class="form-control" value="{{ $user->customer->jenis_kelamin }}"
                                            name="jenis_kelamin">
                                            <option
                                                value="{{ $user->customer->jenis_kelamin === 'Laki-Laki' ? 'Laki-Laki' : 'Perempuan' }}">
                                                {{ $user->customer->jenis_kelamin === 'Laki-Laki' ? 'Laki-Laki' : 'Perempuan' }}
                                            </option>
                                            <option
                                                value="{{ $user->customer->jenis_kelamin === 'Laki-Laki' ? 'Perempuan' : 'Laki-Laki' }}">
                                                {{ $user->customer->jenis_kelamin === 'Laki-Laki' ? 'Perempuan' : 'Laki-Laki' }}
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group mt-3">
                                    <label class="fw-bold">Tanggal Lahir</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="bi bi-calendar-date-fill"></i>
                                            </div>
                                        </div>
                                        <input type="date" value="{{ $user->customer->tanggal_lahir }}"
                                            name="tanggal_lahir" class="form-control phone-number">
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary mt-3">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-3 col-md-4 ">
                    <div class="card">
                        <div class="card-header text-center">
                            <h4>Profile</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group text-center">
                                <div class="">
                                    <img src="..." class="rounded" alt="...">
                                </div>
                                <label>Hi, {{ Auth()->user()->name }}</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
