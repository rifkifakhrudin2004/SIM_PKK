<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SimpanModel extends Model
{
    use HasFactory;

    protected $table = 'm_simpan';
    protected $primaryKey = 'id_simpan';

    protected $fillable = [
        'id_anggota', 
        'id_bendahara', 
        'tgl_simpan',
        'jumlah_simpan', 
    ];
    public function anggota()
    {
        return $this->belongsTo(AnggotaModel::class, 'id_anggota', 'id_anggota');
    }
    public function bendahara()
    {
        return $this->belongsTo(BendaharaModel::class, 'id_bendahara', 'id_bendahara');
    }
}
