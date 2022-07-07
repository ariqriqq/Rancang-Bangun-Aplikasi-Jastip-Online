<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jasa extends Model
{
    use HasFactory;
    protected $table = 'jasa';
    protected $fillable = [
        'jastiper_id',
        'kota_jasa',
        'harga_jasa',
        'uang_muka',
        'tanggal_tutup'
    ];


    public function jastiper()
    {
        return $this->belongsTo(Jastiper::class);
    }
}
