@extends('user.index')

@section('title')
    <title>My Order</title>
@endsection

@section('content')
    <div class="mt-5 mb-3 container">
        <div class="row mx-auto">
            <div class="col-3">
                <div class="card ">
                    <div class="card-header text-center">
                        <div class="form-group text-center">
                            <div class="">
                                <img src="..." class="rounded" alt="...">
                            </div>
                            <label>Hi, {{ Auth()->user()->name }}</label>
                        </div>
                    </div>
                    <div class="card-body" style=" padding:0">
                        <button type="button" class="btn btn-outline-secondary" style="width:100%; border-radius:0 0">Pesanan
                            Saya</button>
                        <button type="button" class="btn btn-outline-secondary"
                            style="width:100%; border-radius:0 0">Pembayaran</button>
                        <button type="button" class="btn btn-outline-secondary"
                            style="width:100%; border-radius:0 0">History Pemesanan</button>
                    </div>
                </div>
            </div>
            <div class="col-9" style="height: 100%">
                <h4>Pesanan Saya</h4>

                <div class="table-responsive">
                    <table class="table table-bordered table-md bg-light text-dark">
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Nama Produk</th>
                            <th>Nama Jastiper</th>
                            <th>Kota</th>
                            <th>Expedisi</th>
                            <th>Uang Muka</th>
                            <th>Total Harga</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>

                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="">
                                <a href="" class="btn btn-primary mb-2 mr-2">Edit</a>
                                <form action="" method="POST">


                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>


                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection
