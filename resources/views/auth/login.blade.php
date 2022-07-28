@extends('user.style-daftar')

@section('title')
    <title>Login Akun</title>
@endsection

@section('content')
    <div class="wrapper mt-4 mb-4">
        <h2>Login</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="input-box">
                <input id="email" name="email" value="{{ old('email') }}" type="email" placeholder="Email" required
                    autocomplete="email" autofocus>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="input-box">
                <input class="@error('password') is-invalid @enderror" id="password" name="password"
                    value="{{ old('password') }}" type="password" placeholder="Password" required
                    autocomplete="current-password" autofocus>

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="input-box button">
                <input type="Submit" value="Login">
            </div>
            <div class="text">
                <h3>Belum Punya Akun? <a href="/daftar">Daftar</a></h3>
            </div>
            <div class="text">
                <h3>Kembali Ke Halaman Utama <a href="/">Back</a></h3>
            </div>
            {{-- <div class="row mb-0">
                <div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Login') }}
                    </button>

                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </div>
            </div> --}}

        </form>
    </div>
@endsection
