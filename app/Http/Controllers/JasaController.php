<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Jasa;
use App\Models\Jastiper;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JasaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jasa = Jasa::with('jastiper')->get();
        return view('page.jastiper.bukajasa')->with([
            'jasa' => $jasa,
        ]);
    }

    public function order()
    {
        $jasa = Jasa::with('jastiper')->orderBy('id', 'DESC')->get();
        return view('page.customer.order')->with([
            'jasa' => $jasa,
        ]);
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
        $jastiper = Jastiper::where('user_id', Auth::user()->id)->firstOrFail();
        $jasa = Jasa::create([
            'jastiper_id' => $jastiper->id,
            'kota_jasa' => $request->kota_jasa,
            'harga_jasa' => $request->harga_jasa,
            'tanggal_tutup' => $request->tanggal_tutup
        ]);
        return view('page.home');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jasa = Jasa::with('jastiper')->findOrFail($id);
        $kode = rand(1,100);
        return view('page.customer.form_order',[
            'data'=>$jasa,
            'kode'=>$kode,
        ]);
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


    public function search(Request $request)
    {
        // mencari data
        $keyword = $request->keyword;
        $jasa=Jasa::whereHas('jastiper',function($jastiper)use($request){
            $jastiper->where([
                ['kota_jasa','like','%'.$request->keyword.'%'],
            ]);
        })->get();
        return view('page.customer.order')->with([
            'jasa' => $jasa,
        ]);
    }
}
