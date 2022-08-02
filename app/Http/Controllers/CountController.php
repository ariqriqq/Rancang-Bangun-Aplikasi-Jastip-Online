<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class CountController extends Controller
{
    public function index(){

        $customer=User::where('role','user')->count();
        $jastiper=User::where('role','jastiper')->count();
        $verifikasi=Order::where('status','menunggu uang muka')->count();
        $tagihan=Order::where('payment_status','lunas')->count();

        return view('page.admin.gdashboard', compact('customer','jastiper','tagihan', 'verifikasi'));
    }
}
