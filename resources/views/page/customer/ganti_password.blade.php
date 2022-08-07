@extends('user.index')
@section('title')
    <title>Profile</title>
@endsection

@section('content')
    <div class="container mt-5 mb-5 col-lg-5" style="text-align: center">
        {{-- <div class="col-4 col-md-8 col-lg-4 mt-5" style="content: center;"> --}}
        <div class="pri_table_list">
            <h3>Update Password</h3>
            <ol>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="card-body">
                            <form method="POST" action="{{ route('user.password.update') }}">
                                @method('patch')
                                @csrf
                                <div class="form-group row">
                                    <label for="current_password"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Password Saat Ini') }}</label>

                                    <div class="col-md-6">
                                        <input id="current_password" type="password"
                                            class="form-control @error('current_password') is-invalid @enderror"
                                            name="current_password" required autocomplete="current_password">

                                        @error('current_password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Password Baru') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password-confirm"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password Baru') }}</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control"
                                            name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">
                                    Update Password
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </ol>
        </div>
    </div>
@endsection
