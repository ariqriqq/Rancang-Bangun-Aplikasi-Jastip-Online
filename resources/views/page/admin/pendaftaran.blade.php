@extends('admin.index')

@section('title')
    <title>Pendaftaran Jastiper - Jastipol</title>
@endsection

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Pendaftaran Jastiper</h1>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Invoices</h4>
                            <div class="card-header-action">
                                <a href="#" class="btn btn-danger">View More <i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Akun</th>
                                        <th>Nama Pemilik Bisnis</th>
                                        <th>Alamat</th>
                                        <th>KTP</th>
                                        <th>No Hp</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    @forelse($jastiper as $jastiper)
                                    @csrf
                                    @if ($jastiper->status==='Pending')
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td class="font-weight-600">{{ $jastiper->nama_jastiper }}</td>
                                            <td class="font-weight-600">{{ $jastiper->nama_jastiper }}</td>
                                            <td class="font-weight-600">
                                                {{ $jastiper->alamat_jastiper }}, {{ $jastiper->kota_jastiper }}, </td>
                                            <td><img width="200px" src="{{ $jastiper->ktp }}"></td>
                                            <td>{{ $jastiper->no_hp_jastiper }}</td>
                                            <td>
                                                <div class="badge badge-warning">{{ $jastiper->status }}</div>
                                            </td>
                                            <form method='POST' action='/pendaftaran/{{ $jastiper->id }}'>
                                                @csrf
                                                <td>
                                                    <button type="submit" class="btn btn-primary">Verifikasi</button>
                                                </td>
                                            </form>
                                        </tr>
                                    @endif
                                    @empty
                                    @endforelse
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
