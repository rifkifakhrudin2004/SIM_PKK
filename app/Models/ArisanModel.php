<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArisanModel extends Model
{
    use HasFactory;

    protected $table = 'm_arisan';
    protected $primaryKey = 'id_arisan';

    protected $fillable = ['id_anggota', 'id_bendahara', 'tgl_arisan', 'catatan_arisan', 'setoran_arisan', 'status'];

    public function anggota()
    {
        return $this->belongsTo(AnggotaModel::class, 'id_anggota');
    }

    public function bendahara()
    {
        return $this->belongsTo(BendaharaModel::class, 'id_bendahara');
    }
    

    public function pembukuan()
    {
        return $this->hasMany(PembukuanArisanModel::class, 'id_arisan');
    }
}
