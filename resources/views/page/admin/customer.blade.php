@extends('admin.index')

@section('title')
    <title>Admin - Jastipol</title>
@endsection


@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Data Customer</h1>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Invoices</h4>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>No Hp</th>
                                        <th>Alamat</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Nama E-Wallet</th>

                                    </tr>
                                    @forelse($data as $data)
                                        @csrf
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td class="font-weight-600">{{ $data->name }}</td>
                                            <td class="font-weight-600">{{ $data->no_hp }}</td>
                                            <td class="font-weight-600">{{ $data->alamat }}</td>
                                            <td class="font-weight-600">{{ $data->jenis_kelamin }}</td>
                                            <td class="font-weight-600">{{ $data->jenis_ewallet }} - {{ $data->nomor_ewallet }}</td>
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
