@extends('user.index')
@section('title')
    <title>Payment - Jastipol</title>
@endsection

@section('content')
    <div class="container mt-3 mb-5">
        <div class="section-body">
            <div class="footer-content text-center">
                <div class="footer-head">
                    <div class="footer-logo mb-3 mt-3">
                        <h2>Pembayaran Pesanan</h2>
                    </div>
                </div>
            </div>
            <div class="text center">
                <div class=" ">
                    <div class="pri_table_list">
                        <h3>Detail Pesanan</h3>
                        <ol>
                            <div class="card-body">
                                <div class="form-group">
                                    <input id="user_id" name="user_id"type="text" value={{ auth()->user()->id }}
                                        required hidden>

                                    <li class="fw-bold">Nama Jastiper</li>
                                    <input type="text"
                                        value="{{ $order->jastiper->nama_jastiper }}"
                                        class="form-control" required autocomplete="name" autofocus disabled>
                                    <li class="fw-bold">Kota Jastiper</li>
                                    <input type="text"
                                        value="{{ $order->jasa->kota_jasa }}"
                                        class="form-control" required autocomplete="name" autofocus disabled>
                                    <li class="fw-bold">Pesanan</li>
                                    <input type="text"
                                        value="{{ $order->pesanan }} ({{ $order->jumlah }} {{ $order->satuan }})"
                                        class="form-control" required autocomplete="name" autofocus disabled>
                                    <li class="fw-bold">Deskripsi Pesanan</li>
                                    <input type="text"
                                        value="{{ $order->deskripsi }}"
                                        class="form-control" required autocomplete="name" autofocus disabled>

                                    <div class="form-group ">
                                        <li class="fw-bold">Total Harga Pesanan</li>
                                        <input type="text" value="{{ $order->total_harga }}" name="email"
                                            class="form-control" required autofocus disabled>
                                    </div>

                                </div>
                                <button id="pay-button" class="mt-4">Pay!</button>

                                <form action="" id="submit_form" method="POST">
                                    @csrf
                                    <input type="hidden" name="json" id="json_callback">
                            
                                </form>
                            
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
                            
                                    function send_response_to_form(result){
                                        document.getElementById('json_callback').value = JSON.stringify(result);
                                        // alert(document.getElementById('json_callback').value)
                                        $('#submit_form').submit();
                                    }
                            
                                </script>
                            </div>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
