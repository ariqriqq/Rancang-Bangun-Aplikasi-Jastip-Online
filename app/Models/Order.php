<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'jasa_id',
        'customer_id',
        'status',
        'kurir',
        'metode_pembayaran',
        'pesanan',
        'jumlah',
        'satuan',
        'deskripsi'
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

}
