<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{

    use HasFactory;
    protected $fillable = [
        'order_id',
        'jastiper_id',
        'customer_id',
        'nama_customer',
        'status',
        'transaction_id',
        'gross_amount',
        'payment_type',
        'payment_code',
        'pdf_url',
    ];


    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function order()
    {
        return $this->belongsTo(Order::class);
    }


    public function jasa()
    {
        return $this->belongsTo(Jasa::class);
    }


    public function jastiper()
    {
        return $this->belongsTo(Jastiper::class);
    }


    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

}
