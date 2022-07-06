<?php

namespace App\Http\Controllers;

use App\Models\Jastiper;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JastiperController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jastiper=Jastiper::with('user')->get();
        return view('page.admin.pendaftaran')->with([
            'jastiper'=>$jastiper,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);

        $file = $request -> file('ktp');
        $ktp = $file -> storeAs('public/img/document',$file->getClientOriginalName());
        $jastiper = Jastiper::create([
            'user_id' => auth()->user()->id,
            'nama_jastiper' => $request->nama_jastiper,
            'no_hp_jastiper'=> $request->no_hp_jastiper,
            'kota_jastiper'=> $request->kota_jastiper,
            'alamat_jastiper' => $request->alamat_jastiper,
            'ktp' => $ktp,
            'nama_rekening' => $request->nama_rekening,
            'jenis_rekening' => $request->jenis_rekening,
            'nomor_rekening' => $request->nomor_rekening,
            'nama_ewallet' => $request->nama_ewallet,
            'jenis_ewallet' => $request->jenis_ewallet,
            'nomor_ewallet' => $request->nomor_ewallet,
            'status' => 'Pending'
        ]);
        $user = User::with('customer')->where('id', Auth::user()->id)->first();
        return view('page.profile', ['user'=>$user]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jastiper  $jastiper
     * @return \Illuminate\Http\Response
     */
    public function show(Jastiper $jastiper)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jastiper  $jastiper
     * @return \Illuminate\Http\Response
     */
    public function edit(Jastiper $jastiper)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jastiper  $jastiper
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jastiper $jastiper)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jastiper  $jastiper
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jastiper $jastiper)
    {
        //
    }
}
