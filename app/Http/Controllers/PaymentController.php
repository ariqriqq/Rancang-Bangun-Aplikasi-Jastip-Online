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

        $payment = Payment::with('order')->where('customer_id', Auth::user()->customer_id)->with('jastiper')->with('customer')->with('jasa')->orderBy('id', 'DESC')->get();
        // dd($payment);
        return view('page.customer.history')->with([
            'payment' => $payment,
        ]);
    }

    public function history_jastiper(Request $request)
    {

        $payment = Payment::with('order')->where('jastiper_id', Auth::user()->jastiper_id)->with('jastiper')->with('customer')->with('jasa')->orderBy('id', 'DESC')->get();
        // dd($payment);
        return view('page.jastiper.history')->with([
            'payment' => $payment,
        ]);
    }

    public function resi_paket($id){
        $payment=Payment::with('order')->with('customer')->with('jasa')->findOrFail($id);
        // dd($payment);
        return view('page.jastiper.resi_paket')->with([
            'payment'=>$payment
        ]);
    }

    public function update_resi_paket(Request $request, $id)
    {
        $payment=Payment::with('order')->findOrFail($id);

        $order = Order::where('id', $payment->order_id);
        $order->update([
            // $json = json_decode($request->get('json'));
            'resi_paket'=>$request->resi_paket,
        ]);
        // dd($payment);

        return redirect('history-orderan');
    }


    public function search(Request $request)
    {
        // mencari data
        $keyword = $request->keyword;
        $payment=Payment::where([
                ['order_id','like','%'.$request->keyword.'%'],
                // ['status','like','%'.$request->keyword.'%']
            ])->get();

        return view('page.jastiper.history')->with([
            'payment' => $payment,
        ]);
    }
    public function search2(Request $request)
    {
        // mencari data
        $keyword = $request->keyword;
        $payment=Payment::where([
                ['order_id','like','%'.$request->keyword.'%'],
                // ['status','like','%'.$request->keyword.'%']
            ])->get();

        return view('page.customer.history')->with([
            'payment' => $payment,
        ]);
    }


    public function payment(Request $request, $id)
    {

        $order=Order::with('jasa')->findOrFail($id);

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
                'gross_amount' => 1,
            ),
            'item_details' => array(
                [
                    'id' => 'a01',
                    'price' => $order->total_harga,
                    'quantity' => 1,
                    'name' => $order->pesanan,
                ],
                [
                    'id' => 'a02',
                    'price' => 3000,
                    'quantity' => 1,
                    'name' => 'Biaya admin aplikasi'
                ]

            ),
            'customer_details' => array(
                 'first_name' => auth()->user()->customer->name,
                 'last_name' => '',
                 'email' => Auth::user()->email,
                 'phone' => Auth::user()->customer->no_hp,
                 'address' => Auth::user()->customer->alamat,
            ),
        );
        // dd($params);
        // dd($order);
        $snapToken = \Midtrans\Snap::getSnapToken($params);

        return view('page.customer.payment')->with([
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


    public function payment_post(Request $request, $id)
    {

        $order=Order::with('jasa')->findOrFail($id);


        $json = json_decode($request->get('json'));
        $payment = new Payment();
        $payment->order_id = $order->id;
        $payment->jasa_id = $order->jasa_id;
        $payment->jastiper_id = $order->jastiper_id;
        $payment->customer_id = $order->customer_id;
        $payment->name = auth()->user()->customer->name;
        $payment->status = $json->transaction_status;
        $payment->transaction_id = $json->transaction_id;
        $payment->payment_id = $json->order_id;
        $payment->gross_amount = $json->gross_amount;
        $payment->payment_type = $json->payment_type;
        $payment->payment_code = isset($json->payment_code) ? $json->payment_code : null;
        $payment->pdf_url = isset($json->pdf_url) ? $json->pdf_url : null;

        return $payment->save() ? redirect(url('/myorder'))->with('alert-success', 'Pembayaran berhasil ') : redirect(url('/pembayaran'))->with('alert-failed', 'Terjadi kesalahan');
    }


}
