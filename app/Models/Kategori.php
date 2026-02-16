<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    // Beritahu Laravel nama Primary Key-nya
    protected $primaryKey = 'kategori_id'; 

    // Kolom yang boleh diisi
    protected $fillable = ['nama_kategori'];

    // Relasi ke Produk (Satu kategori punya banyak produk)
    public function produks()
    {
        return $this->hasMany(Produk::class, 'kategori_id', 'kategori_id');
    }
}