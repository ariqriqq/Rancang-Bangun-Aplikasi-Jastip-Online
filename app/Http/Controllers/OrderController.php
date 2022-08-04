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

        $order=Order::with('jasa')->where('customer_id', Auth::user()->customer_id)->with('jastiper')->with('payment')->orderBy('id', 'DESC')->get();

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
        $order=Order::with('jasa')->where('jastiper_id', Auth::user()->jastiper_id)->with('customer')->orderBy('id', 'DESC')->get();
        // $user=User::with('jasa')->where('jastiper_id', Auth::user()->jastiper_id)->get();

        // $order=Order::with('customer')->get();
        // dd($order);
        return view('page.jastiper.orderan',[
            'data'=>$order
        ]);
    }

    public function refund()
    {
        {
            $order=Order::where('payment_status','Ditolak')->where('customer_id', Auth::user()->customer_id)->with('jasa')->with('customer')->orderBy('id', 'DESC')->get();
            // dd($payment);
            return view('page.customer.refund')->with([
                'order'=>$order,
            ]);
        }
    }


    public function tolak_jasa($id)
    {
        $order = Order::findOrFail($id);
        $order -> update([
            'payment_status' => 'Ditolak',

        ]);
        return redirect()->back();
    }

    public function show_tagihan()
    {
        $order=Order::with('jasa')->where('jastiper_id', Auth::user()->jastiper_id)->with('customer')->orderBy('id', 'DESC')->get();

        // dd($order);
        return view('page.jastiper.tagihan',[
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
    public function search_id2(Request $request)
    {
        // mencari data
        $keyword = $request->keyword;
        $order=Order::where([
                ['id','like','%'.$request->keyword.'%'],
                // ['status','like','%'.$request->keyword.'%']
            ])->get();

        return view('page.customer.myorder')->with([
            'order' => $order,
        ]);
    }
    public function search_name(Request $request)
    {
        // mencari data
        $keyword = $request->keyword;
        $order=Order::whereHas('jastiper',function($student)use($request){
            $student->where([
                ['nama_jastiper','like','%'.$request->keyword.'%'],
                // ['status','like','%'.$request->keyword.'%']
            ]);
        })->get();
        return view('page.customer.myorder')->with([
            'order' => $order,
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
        ]);
        return redirect('orderan');
    }

    public function store_order(Request $request)
    {
        // dd($request);
        Order::create($request->all());
        return redirect('orderan');
    }



    public function update_pembayaran_jasa($id)
    {
        $order = Order::findOrFail($id);
        $order -> update([
            'status' => 'Uang Muka Terverifikasi',
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
