<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnggotaModel extends Model
{
    protected $table = 'm_anggota'; // Nama tabel
    protected $primaryKey = 'id_anggota'; // Primary key

    protected $fillable = [
        'nama_anggota', 'alamat_anggota', 'notelp_anggota',
    ];

    // Relasi dengan arisan jika diperlukan
    public function arisans()
    {
        return $this->hasMany(ArisanModel::class, 'id_anggota', 'id_arisan');
    }
}