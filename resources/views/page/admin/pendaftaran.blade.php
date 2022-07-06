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
                                <table class="table table-striped">
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
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td class="font-weight-600">{{ $jastiper->nama_jastiper }}</td>
                                            <td class="font-weight-600">{{ $jastiper->nama_jastiper }}</td>
                                            <td class="font-weight-600">
                                                {{ $jastiper->kota_jastiper }}, {{ $jastiper->alamat_jastiper }}</td>
                                            <td><img src="{{ $jastiper->ktp}}"></td>
                                            <td>{{ $jastiper->no_hp_jastiper }}</td>
                                            <td>
                                                <div class="badge badge-success">{{ $jastiper->status }}</div>
                                            </td>
                                            <td>
                                                <a href="#" class="btn btn-primary">Verifikasi</a>
                                            </td>
                                        </tr>
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
