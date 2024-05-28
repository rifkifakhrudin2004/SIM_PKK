<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArisanModel extends Model
{
    use HasFactory;

    protected $table = 'm_arisan';
    protected $primaryKey = 'id_arisan';

    protected $fillable = ['id_anggota', 'id_bendahara', 'tgl_arisan', 'catatan_arisan', 'setoran_arisan'];

    public function pembukuans()
    {
        return $this->hasMany(PembukuanArisanModel::class, 'id_arisan');
    }
}
