<?php

namespace App\Http\Controllers;

use App\Models\Jasa;
use App\Models\Jastiper;
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
        // dd($jasa);
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
        // dd (Auth::user()->jastiper()->id);
        // dd(auth()->user());
        // dd($request);
        $jastiper = Jastiper::where('user_id', Auth::user()->id)->firstOrFail();
        // dd($jastiper);
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

        return view('page.customer.form_order',[
            'data'=>$jasa
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
}
