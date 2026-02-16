<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // 1. Primary Key sesuai ERD
    protected $primaryKey = 'user_id';

    // 2. Sesuaikan 'name' jadi 'nama' agar sinkron dengan Migrasi/ERD 
    protected $fillable = [
        'name', 
        'email',
        'password',
        'alamat',
        'no_hp',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // --- RELASI (Cukup tulis di akhir biar gak ketimpa menimpa cihuy) ---//

    // Relasi ke Penjual (One-to-One)
// Hapus semua fungsi penjual yang lama, ganti dengan satu ini saja di dalam class User
public function penjual()
{
    // Karena kamu pakai user_id, bukan id standar
    return $this->hasOne(Penjual::class, 'user_id', 'user_id');
}

public function orders()
{
    return $this->hasMany(Order::class, 'user_id', 'user_id');//relasi ke order one to many
}
}