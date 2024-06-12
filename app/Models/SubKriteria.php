<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubKriteria extends Model
{
    use HasFactory;

    protected $guarded = [];

    // Relasi ke kriteria (parent model)
    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class);
    }

    // Relasi ke DataAnggotaModel
    // public function anggota()
    // {
    //     return $this->belongsTo(DataAnggotaModel::class, 'id_anggota', 'id_anggota');
    // }
}
