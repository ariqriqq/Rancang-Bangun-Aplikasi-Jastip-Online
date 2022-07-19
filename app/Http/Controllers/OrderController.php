<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Jastiper;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{

    public function index()
    {

        $order=Order::with('jasa')->where('customer_id', Auth::user()->customer_id)->get();

        // $order = Order::with('jastiper')->findOrFail();
        // $order=Order::with('jastiper')->get();
        // dd($order);
        return view('page.customer.myorder')->with([
            'order'=>$order,
        ]);
    }


    public function store(Request $request)
    {
        // dd($request);
        Order::create($request->all());
        return redirect('myorder');
    }

    public function show()
    {
        // $jastiper = Jastiper::where('user_id', Auth::user()->id)->firstOrFail();
        $order=Order::with('jasa',)->where('jasa_id', Auth::user()->jastiper_id)->get();
        // $order=Order::with('customer')->get();
        // dd($order);
        return view('page.jastiper.orderan',[
            'data'=>$order
        ]);
    }

    
    public function form_pembayaran($id){
        $order=Order::with('jasa')->findOrFail($id);
        
        return view('page.jastiper.form_pembayaran')->with([
            'data'=>$order
        ]);
    }

    public function store_order(Request $request)
    {
        // dd($request);
        Order::create($request->all());
        return redirect('orderan');
    }

    public function pembayaran_jasa()
    {
        $order=Order::with('jasa')->with('customer')->get();
        // dd($order);
        return view('page.admin.pembayaran')->with([
            'order'=>$order,
        ]);
    }

    public function update_pembayaran_jasa($id)
    {
        $order = Order::findOrFail($id);
        $order -> update([
            'status' => 'Uang Muka Terverifikasi',
        ]);
        return redirect()->back();
    }


    public function update($id)
    {
        $order = Order::findOrFail($id);
        // $user = User::where('id',$order->customer_id);
        $order -> update([
            'status' => 'Sudah bayar uang muka, menunggu pencarian barang dan total harga',

        ]);
        return redirect()->back();
    }


    public function payment(Request $request)
    {
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
                'gross_amount' => 10000,
            ),
            'item_details' => array(
                [
                    'id' => 'a01',
                    'price' => $request->get('harga'),
                    'quantity' => $request->get('jumlah'),
                    'name' => $request->get('barang')
                ],
                [
                    'id' => 'a02',
                    'price' => 8000,
                    'quantity' => 1,
                    'name' => 'Jeruk'
                ]

            ),
            'customer_details' => array(
                'first_name' => $request->get('name'),
                'last_name' => '',
                'email' => $request->get('email'),
                'phone' => $request->get('number'),
            ),
        );
        // dd($params);
        $snapToken = \Midtrans\Snap::getSnapToken($params);

        // return $snapToken;
        return view('payment', ['snap_token' => $snapToken]);
    }

    public function payment_post(Request $request)
    {
        $json = json_decode($request->get('json'));
        $order = new Order();
        $order->status = $json->transaction_status;
        $order->name = $request->get('name');
        $order->email = $request->get('email');
        $order->number = $request->get('number');
        $order->transaction_id = $json->transaction_id;
        $order->order_id = $json->order_id;
        $order->gross_amount = $json->gross_amount;
        $order->payment_type = $json->payment_type;
        $order->payment_code = isset($json->payment_code) ? $json->payment_code : null;
        $order->pdf_url = isset($json->pdf_url) ? $json->pdf_url : null;

        return $order->save() ? redirect(url('/'))->with('alert-success', 'Order berhasil dibuat') : redirect(url('/'))->with('alert-failed', 'Terjadi kesalahan');
    }
}
