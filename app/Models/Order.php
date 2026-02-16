<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $primaryKey = 'order_id';
    protected $fillable = ['user_id', 'tanggal', 'status_order'];

    public function transaksis() {
        return $this->hasMany(Transaksi::class, 'order_id', 'order_id');
    }
}
