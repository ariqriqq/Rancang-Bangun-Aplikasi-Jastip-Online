<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id',
        'alamat',
        'no_hp',
        'jenis_kelamin',
        'jenis_ewallet',
        'nomor_ewallet',
        'tanggal_lahir'];

        public function user(){
        return $this->hasMany(User::class);
        }

        public function order()
        {
            return $this->hasMany(Order::class);
        }

        public function jasa()
        {
            return $this->belongTo(Jasa::class);
        }

        public function payment()
        {
            return $this->hasMany(payment::class);
        }
}
