<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Jastiper;
use App\Models\User;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{

    public function index()
    {

        $order=Order::with('jasa')->where('customer_id', Auth::user()->customer_id)->with('jastiper')->with('payment')->get();

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
        $order=Order::with('jasa')->where('jastiper_id', Auth::user()->jastiper_id)->with('customer')->get();
        // $user=User::with('jasa')->where('jastiper_id', Auth::user()->jastiper_id)->get();

        // $order=Order::with('customer')->get();
        // dd($order);
        return view('page.jastiper.orderan',[
            'data'=>$order
        ]);
    }

    public function search(Request $request)
    {
        // mencari data
        $keyword = $request->keyword;
        $order=Order::where([
                ['status','like','%'.$request->keyword.'%'],
                // ['status','like','%'.$request->keyword.'%']
            ])->get();
        
        return view('page.jastiper.orderan')->with([
            'data' => $order,
        ]);
    }
    public function search_id(Request $request)
    {
        // mencari data
        $keyword = $request->keyword;
        $order=Order::where([
                ['id','like','%'.$request->keyword.'%'],
                // ['status','like','%'.$request->keyword.'%']
            ])->get();
        
        return view('page.jastiper.orderan')->with([
            'data' => $order,
        ]);
    }

    public function form_pembayaran($id){
        $order=Order::with('jasa')->findOrFail($id);
        // dd($order);
        return view('page.jastiper.form_pembayaran')->with([
            'data'=>$order
        ]);
    }

    public function orderan_update(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        // dd($order);
        $order->update([
            'total_harga'=>$request->total_harga,
            // 'data'=>$order
        ]);
        return redirect('orderan');
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

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
        return redirect()->back();
    }



}
