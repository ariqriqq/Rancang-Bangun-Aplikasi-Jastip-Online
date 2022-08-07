@extends('admin.index')

@section('title')
    <title>General Dashboard - Jastipol</title>
@endsection

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>General Dashboard</h1>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="far fa-user"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total User</h4>
                            </div>
                            <div class="card-body">
                                {{ $user }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-danger">
                            <i class="fas fa-people-carry-box"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Jastiper</h4>
                            </div>
                            <div class="card-body">
                                {{ $jastiper }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-success">
                            <i class="fas fa-cash-register"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Tagihan Jastiper</h4>
                            </div>
                            <div class="card-body">
                                {{ $tagihan }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                            <i class="fas fa-money-check-dollar"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Uang Muka Pending</h4>
                            </div>
                            <div class="card-body">
                                {{ $verifikasi }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-6 col-sm-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Statistics Transaksi</h4>
                        </div>
                        <div class="card-body">
                            <canvas id="myChart" height="182"></canvas>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-6 col-sm-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Statistics Orderan</h4>
                        </div>
                        <div class="card-body">
                            <canvas id="OrderChart" height="182"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Data Pesan dan Saran User</h4>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Subject</th>
                                        <th>Pesan</th>
                                    </tr>
                                    @forelse($comment as $comment)
                                        {{-- @csrf
                                        @if ($comment->created_at > now()) --}}
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $comment->name }}</td>
                                            <td>{{ $comment->email }}</td>
                                            <td>{{ $comment->subject }}</td>
                                            <td>{{ $comment->message }}</td>
                                        </tr>
                                        {{-- @endif --}}
                                    @empty
                                    @endforelse
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                const data = {
                    labels: ['Berhasil', 'Pending', 'Gagal'],
                    datasets: [{
                        label: ['Berhasil', 'Pending', 'Gagal'],
                        backgroundColor: ['#47c363', 'yellow', '#fc544b'],
                        borderColor: 'black',
                        data: [{{ $payment1 }}, {{ $payment2 }}, {{ $payment3 }}],
                    }]
                };

                const config = {
                    type: 'doughnut',
                    data: data,
                    options: {}
                };

                const myChart = new Chart(
                    document.getElementById('myChart'),
                    config
                );

                const data2 = {
                    labels: ['Berhasil', 'Pending', 'Ditolak'],
                    datasets: [{
                        label: ['Berhasil', 'Pending', 'Ditolak'],
                        backgroundColor: ['#47c363', 'yellow', '#fc544b'],
                        borderColor: 'black',
                        data: [{{ $order1 }}, {{ $order2 }}, {{ $order3 }}],
                    }]
                };
                const config2 = {
                    type: 'doughnut',
                    data: data2,
                    options: {}
                };
                const LineChart = new Chart(
                    document.getElementById('OrderChart'),
                    config2
                );
            </script>
        </section>
    </div>
@endsection
