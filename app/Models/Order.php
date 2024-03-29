<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'jasa_id',
        'jastiper_id',
        'customer_id',
        'payment_status',
        'status',
        'kurir',
        'metode_pembayaran',
        'pesanan',
        'jumlah',
        'satuan',
        'deskripsi',
        'uang_muka',
        'total_harga',
        'resi_paket',
        'status_tagihan',
        'status_refund'

    ];

    public function jastiper()
    {
        return $this->belongsTo(Jastiper::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function jasa()
    {
        return $this->belongsTo(Jasa::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function payment()
    {
        return $this->hasMany(payment::class);
    }
}
