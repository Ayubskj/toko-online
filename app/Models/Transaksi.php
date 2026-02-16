<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $primaryKey = 'transaksi_id';
    protected $fillable = ['order_id', 'produk_id', 'jumlah', 'subtotal'];

    public function order() {
        return $this->belongsTo(Order::class, 'order_id', 'order_id');
}
}
