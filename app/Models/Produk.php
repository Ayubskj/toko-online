<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $primaryKey = 'produk_id'; // Sesuai ERD kamu
    
    protected $fillable = [
        'penjual_id', 
        'kategori_id', 
        'nama_produk', 
        'harga', 
        'stok',
        'foto'
    ];

    // Relasi: Produk ini milik sebuah Kategori
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id', 'kategori_id');
    }

    // Relasi: Produk ini milik seorang Penjual
    public function penjual()
    {
        return $this->belongsTo(Penjual::class, 'penjual_id', 'penjual_id');
    }
}