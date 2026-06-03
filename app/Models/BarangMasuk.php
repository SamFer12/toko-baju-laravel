<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BarangMasuk extends Model
{
    protected $fillable = [
        'tanggal',
        'barang_id',
        'supplier_id',
        'jumlah',
        'harga_beli',
        'keterangan'
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
    
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}