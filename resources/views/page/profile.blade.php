@extends('user.index')
@section('title')
    <title>Profile</title>
@endsection

@section('content')
    <div class="container mt-3 mb-5">
        <div class="section-body">
            <div class="footer-content text-center">
                <div class="footer-head">
                    <div class="footer-logo mb-3 mt-3">
                        <h2>Informasi Akun</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-8 col-md-8 col-lg-8">
                    <div class="pri_table_list">
                        <h3>Detail Akun</h3>
                        <ol>
                            <form action="{{ route('customer.update', auth()->user()->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group">

                                        <input id="user_id" name="user_id"type="text" value={{ auth()->user()->id }}
                                            required hidden>
                                        {{-- <input name="jenis_ewallet" type="text" value={{ $user->customer->jenis_ewallet }} hidden>
                                        <input name="nomor_ewallet" type="text" value={{ $user->customer->nomor_ewallet }} hidden> --}}

                                        <li class="fw-bold">Nama Lengkap</li>
                                        <input type="text" value="{{ $user->customer->name }}" name="name"
                                            class="form-control  @error('name') is-invalid @enderror" required
                                            autocomplete="name" autofocus>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group ">
                                        <li class="fw-bold">Email</li>
                                        <input type="text" value="{{ $user->email }}" name="email"
                                            class="form-control @error('email') is-invalid @enderror" required autofocus
                                            disabled>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <input type="text" value="{{ $user->email }}" name="email"
                                        class="form-control @error('email') is-invalid @enderror" required hidden>


                                    <div class="form-group ">
                                        <li class="fw-bold">Alamat Lengkap</li>
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
                                    <div class="form-group ">
                                        <li class="fw-bold">Nomor Handphone (WA Aktif)</li>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="bi bi-phone-vibrate-fill"></i>
                                                </div>
                                            </div>
                                            <input type="text" value="{{ $user->customer->no_hp }}" name="no_hp"
                                                class="form-control phone-number @error('no_hp') is-invalid @enderror"
                                                required autocomplete="no_hp" autofocus>
                                            @error('no_hp')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <li class="fw-bold">Jenis Kelamin</li>
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
                                    <div class="form-group ">
                                        <li class="fw-bold">Tanggal Lahir</li>
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

                                    <button type="submit" class="btn btn-primary mt-5">Submit</button>
                                </div>
                            </form>
                        </ol>
                    </div>
                </div>
                <div class="col-3 col-md-4 ">
                    <div class="pri_table_list">
                        <h3>Profile</h3>
                        <div class="card-body">
                            <div class="form-group text-center">
                                <div class="">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar2.png" class="rounded" alt="avatar">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pri_table_list mt-5">
                        <h3>Akun E-Wallet</h3>
                        <ol>
                            <form action="{{ route('customer.edit', auth()->user()->customer->id) }}" method="GET">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <li class="fw-bold">Jenis E-Wallet</li>
                                        <input type="text" name="jenis_ewallet"
                                            value="{{ $user->customer->jenis_ewallet }}" class="form-control" disabled>
                                        <li class="fw-bold">Nomor E-Wallet</li>
                                        <input type="text" name="nomor_ewallet"
                                            value="{{ $user->customer->nomor_ewallet }}" class="form-control" disabled>
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-5">Edit Akun</button>
                                </div>
                            </form>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
