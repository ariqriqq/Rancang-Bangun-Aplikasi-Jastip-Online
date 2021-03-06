<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jastiper extends Model
{

    use HasFactory;
    protected $fillable = [
        'user_id',
        'nama_jastiper',
        'no_hp_jastiper',
        'kota_jastiper',
        'alamat_jastiper',
        'ktp',
        'nama_rekening',
        'jenis_rekening',
        'nomor_rekening',
        'nama_ewallet',
        'jenis_ewallet',
        'nomor_ewallet',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function order()
    {
        return $this->hasMany(Order::class);
    }

    public function payment()
    {
        return $this->hasMany(payment::class);
    }
}
