<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jasa extends Model
{
    use HasFactory;
    protected $fillable = [
        'kota_jasa',
        'harga_jasa',
        'uang_muka',
        'tanggal_tutup'
    ];
}
