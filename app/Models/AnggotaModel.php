<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnggotaModel extends Model
{
    protected $table = 'm_anggota'; // Nama tabel

    protected $fillable = [
        'nama', 'alamat', 'nomor_telepon', 'email', 
    ];

    // Relasi dengan arisan jika diperlukan
    public function arisans()
    {
        return $this->hasMany(ArisanModel::class, 'id_anggota', 'id');
    }
}