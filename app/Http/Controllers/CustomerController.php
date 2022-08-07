<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePasswordRequest;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::with('customer')->where('id', Auth::user()->id)->first();
        // dd($user);
        return view('page.profile')->with([
            "user" => $user,
        ]);
    }
    public function ganti_password()
    {
        $user = User::with('customer')->where('id', Auth::user()->id)->first();
        // dd($user);
        return view('page.customer.ganti_password')->with([
            "user" => $user,
        ]);
    }
    // public function update_ganti_password(Request $request, $id)
    // {

    //     $user = User::with('customer')->findOrFail($id);
    //     // $user->update([
    //     $request->user()->update([
    //         'password' => Hash::make($request->gett('password')),
    //     ]);
    //     // Alert::success('Password berhasil diganti');
    //     return redirect('customer');
    // }
    public function update_ganti_password(UpdatePasswordRequest $request)
    {
        $request->user()->update([
            'password' => Hash::make($request->get('password'))
        ]);
        Alert::success('Password berhasil diubah');
        return redirect()->route('user.password.edit');
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
     * @param  \App\Http\Requests\StoreCustomerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        return view('page.customer.ewallet')->with([
            "customer" => $customer,
        ]);
    }

    public function update_ewallet(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);
        $customer->update([
            'user_id' => auth()->user()->id,
            'jenis_ewallet' => $request->jenis_ewallet,
            'nomor_ewallet' => $request->nomor_ewallet,
        ]);
        return redirect('customer');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::with('customer')->findOrFail($id);
        $user->update([
            // 'name' => $request->name,
            'email' => $request->email,
        ]);
        $customer = Customer::where('id', $user->customer_id);
        $customer->update([
            'user_id' => auth()->user()->id,
            'name' => $request->name,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tanggal_lahir' => $request->tanggal_lahir,
            // 'jenis_ewallet' => $request->jenis_ewallet,
            // 'nomor_ewallet' => $request->nomor_ewallet,
        ]);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
