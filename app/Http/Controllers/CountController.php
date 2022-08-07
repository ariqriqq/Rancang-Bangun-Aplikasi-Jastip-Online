<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Order;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;

class CountController extends Controller
{
    public function index()
    {

        $user = User::count();
        $jastiper = User::where('role', 'jastiper')->count();
        $verifikasi = Order::where('status', 'menunggu uang muka')->count();
        $tagihan = Order::where('payment_status', 'Lunas')->where('status_tagihan', null)->count();
        $payment1 = Payment::where('status', 'settlement')->count();
        $payment2 = Payment::where('status', 'pending')->count();
        $payment3 = Payment::where('status', 'failed')->count();
        $order1 = Order::where('payment_status', 'Lunas')->count();
        $order2 = Order::where('payment_status', null)->count();
        $order3 = Order::where('payment_status', 'Ditolak')->count();


        $comment = Comment::orderBy('id', 'DESC')->get();
        return view('page.admin.gdashboard', compact(
            'user','jastiper','tagihan','verifikasi','payment1','payment2','payment3','order1','order2','order3',
        ))->with([
            'comment' => $comment,
        ]);
    }
}
