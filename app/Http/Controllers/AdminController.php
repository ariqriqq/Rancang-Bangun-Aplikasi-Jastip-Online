<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Jastiper;
use App\Models\Order;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        {
            $jastiper=Jastiper::with('user')->get();
            // dd($jastiper);
            return view('page.admin.jastiper')->with([
                'jastiper'=>$jastiper,
            ]);
        }
    }
    public function payment()
    {
        {
            $payment=Payment::with('order')->get();
            // dd($payment);
            return view('page.admin.payment')->with([
                'payment'=>$payment,
            ]);
        }
    }
    public function payment_data($id)
    {
        {
            $payment=Payment::with('order')->with('jasa')->with('jastiper')->findOrFail($id);
            // dd($payment);
            return view('page.admin.payment_data')->with([
                'payment'=>$payment,
            ]);
        }
    }
    public function payment_update(Request $request, $id)
    {

        $payment=Payment::with('order')->findOrFail($id);
        $payment -> update([
            // $json = json_decode($request->get('json'));
            'status' => 'settlement',
        ]);
        $order = Order::where('id', $payment->order_id);
        $order->update([
            'payment_status' => 'Lunas',
        ]);

        return redirect()->back();
    }
    public function payment_confirm(Request $request, $id)
    {

        $payment=Payment::with('order')->findOrFail($id);

        $order = Order::where('id', $payment-> order_id);
        $order->update([
            // $json = json_decode($request->get('json'));
            'payment_status' => 'Lunas',
        ]);

        return redirect()->back();
    }
    public function customer()
    {
        {
            $user=User::with('customer')->get();
            // dd($customer);
            return view('page.admin.customer')->with([
                'data'=>$user,
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
