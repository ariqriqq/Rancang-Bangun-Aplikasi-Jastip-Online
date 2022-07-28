@extends('user.index')

@section('title')
    <title>Status Pembayaran - Jastipol</title>
@endsection

@section('content')
    <div class="mt-5 mb-3 container-fluid">
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
                        <a type="button" class="btn btn-outline-secondary" style="width:100%; border-radius:0 0"
                            href="/myorder">Pesanan
                            Saya</a>
                        <a type="button" class="btn btn-outline-secondary" style="width:100%; border-radius:0 0"
                            href="/pembayaran">Pembayaran</a>
                        <a type="button" class="btn btn-outline-secondary" style="width:100%; border-radius:0 0"
                            href="/history">History Pemesanan</a>
                    </div>
                </div>
            </div>
            <div class="col-9" style="height: 100%">
                <h4>Pembayaran</h4>

                <div class="table-responsive">
                    <table class="table table-bordered table-md bg-light text-dark">
                        <tr>
                            <th>No</th>
                            <th>Pesanan</th>
                            <th>Nama Jastiper</th>
                            <th>Total Pembayaran</th>
                            <th>Status</th>
                            <th>Id Transaksi</th>
                            <th>Metode Pembayaran</th>
                            <th>Status Pembayaran</th>
                            <th>Action</th>
                        </tr>
                        @forelse($order as $order)
                            @csrf
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $order->pesanan }} ({{ $order->jumlah }} {{ $order->satuan }}) -
                                    {{ $order->deskripsi }}</td>
                                <td>{{ $order->jastiper->nama_jastiper }} </td>
                                <td>Rp{{ $order->total_harga }} </td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>

                                    <form action="/payment/{{ $order->id }}" method="GET">
                                        @csrf
                                        <button class="btn btn-secondary mb-1" type="submit">Pay!</button>
                                    </form>
                                </td>


                                    {{-- <form action="" id="submit_form" method="POST">
                                        @csrf
                                        <input type="hidden" name="json" id="json_callback">

                                    </form> --}}
{{--
                                    <script type="text/javascript">
                                        // For example trigger on button clicked, or any time you need
                                        var payButton = document.getElementById('pay-button');
                                        payButton.addEventListener('click', function() {
                                            // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
                                            window.snap.pay('{{ $snap_token }}', {
                                                onSuccess: function(result) {
                                                    /* You may add your own implementation here */
                                                    alert("payment success!");
                                                    console.log(result);
                                                    send_response_to_form(result);
                                                },
                                                onPending: function(result) {
                                                    /* You may add your own implementation here */
                                                    alert("wating your payment!");
                                                    console.log(result);
                                                    send_response_to_form(result);
                                                },
                                                onError: function(result) {
                                                    /* You may add your own implementation here */
                                                    alert("payment failed!");
                                                    console.log(result);
                                                    send_response_to_form(result);
                                                },
                                                onClose: function() {
                                                    /* You may add your own implementation here */
                                                    alert('you closed the popup without finishing the payment');
                                                }
                                            })
                                        });

                                        function send_response_to_form(result) {
                                            document.getElementById('json_callback').value = JSON.stringify(result);
                                            // alert(document.getElementById('json_callback').value)
                                            $('#submit_form').submit();
                                        }
                                    </script> --}}
                            @empty
                        @endforelse

                        </td>
                        </tr>

                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection
