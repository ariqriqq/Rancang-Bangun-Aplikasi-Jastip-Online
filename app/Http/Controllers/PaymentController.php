<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function index(Request $request)
    {

        $order = Order::with('jasa')->where('customer_id', Auth::user()->customer_id)->with('jastiper')->with('customer')->get();
        // $total = Order::with('jasa')->where('total_harga', Auth::user()->total_harga);
        // $order = Order::with('jastiper')->findOrFail();
        // $order=Order::with('jastiper')->get();
        // dd($order);
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = 'SB-Mid-server-jpdw45WzirMc8iq-U1r4TK8S';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => 8000,
            ),
            'item_details' => array(
                [
                    'id' => 'a01',
                    'price' => 10000,
                    'quantity' => 2,
                    'name' => 'Mangga'
                ],
                [
                    'id' => 'a02',
                    'price' => 3000,
                    'quantity' => 1,
                    'name' => 'Biaya Admin'
                ]

            ),
            'customer_details' => array(
                'first_name' => Auth::user()->name,
                'last_name' => '',
                'email' => Auth::user()->email,
                'phone' => Auth::user()->customer->no_hp,
            ),
        );
        // dd($order);
        $snapToken = \Midtrans\Snap::getSnapToken($params);

        // return $snapToken;
        // return view('payment', ['snap_token' => $snapToken]);
        return view('page.customer.pembayaran')->with([
            'order' => $order,
            'snap_token' => $snapToken
        ]);
    }

    public function store(Request $request)
    {
        // dd($request);
        Payment::create($request->all());
        return redirect('payment');
    }
    // public function index()
    // {
    //     $payment=Payment::with('order')->where('customer_id', Auth::user()->customer_id)->get();
    //     $payment = Payment::with('jastiper')->get();
    //     $payment = Payment::with('jasa')->get();
    //     $payment = Payment::with('customer')->get();
    //     $payment = Payment::with('user')->get();
    //     dd($payment);
    //     return view('page.customer.pembayaran')->with([
    //         'payment' => $payment,
    //     ]);
    // }

    // public function payment(Request $request)
    // {
    //     // Set your Merchant Server Key
    //     \Midtrans\Config::$serverKey = 'SB-Mid-server-jpdw45WzirMc8iq-U1r4TK8S';
    //     // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
    //     \Midtrans\Config::$isProduction = false;
    //     // Set sanitization on (default)
    //     \Midtrans\Config::$isSanitized = true;
    //     // Set 3DS transaction for credit card to true
    //     \Midtrans\Config::$is3ds = true;

    //     $params = array(
    //         'transaction_details' => array(
    //             'order_id' => rand(),
    //             'gross_amount' => 10000,
    //         ),
    //         'item_details' => array(
    //             [
    //                 'id' => 'a01',
    //                 'price' => 7000,
    //                 'quantity' => '1',
    //                 'name' => 'Mangga'
    //             ],
    //             [
    //                 'id' => 'a02',
    //                 'price' => 8000,
    //                 'quantity' => 1,
    //                 'name' => 'Jeruk'
    //             ]

    //         ),
    //         'customer_details' => array(
    //             'first_name' => '',
    //             'last_name' => '',
    //             'email' => '',
    //             'phone' => '',
    //         ),
    //     );
    //     // dd($params);
    //     $snapToken = \Midtrans\Snap::getSnapToken($params);

    //     // return $snapToken;
    //     return view('payment', ['snap_token' => $snapToken]);
    // }

    public function payment_post(Request $request)
    {
        $json = json_decode($request->get('json'));
        $payment = new Payment();
        $payment->status = $json->transaction_status;
        $payment->name = $request->get('name');
        $payment->email = $request->get('email');
        $payment->number = $request->get('number');
        $payment->transaction_id = $json->transaction_id;
        $payment->order_id = $json->order_id;
        $payment->gross_amount = $json->gross_amount;
        $payment->payment_type = $json->payment_type;
        $payment->payment_code = isset($json->payment_code) ? $json->payment_code : null;
        $payment->pdf_url = isset($json->pdf_url) ? $json->pdf_url : null;

        return $payment->save() ? redirect(url('/'))->with('alert-success', 'Pembayaran berhasil ') : redirect(url('/'))->with('alert-failed', 'Terjadi kesalahan');
    }
}
