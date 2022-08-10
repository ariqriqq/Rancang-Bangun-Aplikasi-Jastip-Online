<?php

namespace App\Http\Controllers;


use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class OrderController extends Controller
{

    public function index()
    {
        $order = Order::with('jasa')->where('customer_id', Auth::user()->customer_id)->with('jastiper')->with('payment')->orderBy('id', 'DESC')->get();
        $kode = rand(1, 100);
        return view('page.customer.myorder')->with([
            'order' => $order,
            'kode' => $kode,
        ]);
    }


    public function store(Request $request)
    {
        Order::create($request->all());

        return redirect('myorder');
    }

    public function uang_muka($id)
    {
        $order = Order::with('jasa')->findOrFail($id);
        $kode = rand(1, 100);

        return view('page.customer.uang_muka')->with([
            'order' => $order,
            'kode' => $kode,
        ]);
    }

    public function update_uang_muka(Request $request, $id)
    {
        $order = Order::with('jasa')->findOrFail($id);
        $kode = rand(1, 100);
        $uang_muka = $order->jasa->harga_jasa + $kode;
        // dd($order);
        $order->update([
            'uang_muka' => $uang_muka,
        ]);
        return redirect('myorder');
    }


    public function show()
    {
        $order = Order::with('jasa')->where('jastiper_id', Auth::user()->jastiper_id)->with('customer')->orderBy('id', 'DESC')->get();
        return view('page.jastiper.orderan', [
            'data' => $order
        ]);
    }

    public function refund()
    { {
            $order = Order::where('payment_status', 'Ditolak')->where('customer_id', Auth::user()->customer_id)->with('jasa')->with('customer')->orderBy('id', 'DESC')->get();
            // dd($payment);
            return view('page.customer.refund')->with([
                'order' => $order,
            ]);
        }
    }


    public function tolak_jasa($id)
    {
        $order = Order::findOrFail($id);
        $order->update([
            'payment_status' => 'Ditolak',

        ]);
        Alert::success('Pesanan ditolak, dihapus dari daftar orderan');
        return redirect()->back();
    }

    public function show_tagihan()
    {
        $order = Order::with('jasa')->where('jastiper_id', Auth::user()->jastiper_id)->with('customer')->orderBy('id', 'DESC')->get();
        // $jumlah;
        // dd($order);
        return view('page.jastiper.tagihan', [
            'data' => $order,
            // 'jumlah' => $jumlah
        ]);
    }

    public function search(Request $request)
    {
        // mencari data
        $keyword = $request->keyword;
        $order = Order::where([
            ['status', 'like', '%' . $request->keyword . '%'],
        ])->get();
        return view('page.jastiper.orderan')->with([
            'data' => $order,
        ]);
    }
    public function search_id(Request $request)
    {
        // mencari data
        $keyword = $request->keyword;
        $order = Order::where([
            ['id', 'like', '%' . $request->keyword . '%'],
        ])->get();
        return view('page.jastiper.orderan')->with([
            'data' => $order,
        ]);
    }
    public function search_id2(Request $request)
    {
        // mencari data
        $keyword = $request->keyword;
        $order = Order::where([
            ['id', 'like', '%' . $request->keyword . '%'],
        ])->get();
        return view('page.customer.myorder')->with([
            'order' => $order,
        ]);
    }
    public function search_name(Request $request)
    {
        // mencari data
        $keyword = $request->keyword;
        $order = Order::whereHas('jastiper', function ($student) use ($request) {
            $student->where([
                ['nama_jastiper', 'like', '%' . $request->keyword . '%'],
            ]);
        })->get();
        return view('page.customer.myorder')->with([
            'order' => $order,
        ]);
    }


    public function form_pembayaran($id)
    {
        $order = Order::with('jasa')->findOrFail($id);
        // dd($order);
        return view('page.jastiper.form_pembayaran')->with([
            'data' => $order
        ]);
    }

    public function orderan_update(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->update([
            'total_harga' => $request->total_harga,
        ]);
        return redirect('orderan');
    }

    public function store_order(Request $request)
    {
        Order::create($request->all());
        return redirect('orderan');
    }



    public function update_pembayaran_jasa($id)
    {
        $order = Order::findOrFail($id);
        $order->update([
            'status' => 'Uang Muka Terverifikasi',
        ]);
        return redirect()->back();
    }




    public function destroy($id)
    {
        Order::where('id', $id)->delete();
        Alert::success('Pesanan berhasil dihapus');
        return redirect()->back();
    }
}
