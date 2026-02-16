<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penjual extends Model
{
    protected $primaryKey = 'penjual_id';

    protected $fillable = ['user_id', 'nama_toko', 'email', 'no_hp'];

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function produks() {
        return $this->hasMany(Produk::class, 'penjual_id', 'penjual_id');
    }
}
