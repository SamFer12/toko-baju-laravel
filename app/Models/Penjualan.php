<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    protected $fillable = [
        'invoice',
        'tanggal',
        'total',
        'bayar',
        'kembalian'
    ];
    public function detail()
    {
        return $this->hasMany(
            DetailPenjualan::class
        );
    }
}