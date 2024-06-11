<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class setoranModel extends Model
{
    use HasFactory;

    protected $table = 'm_setoran';
    protected $primaryKey = 'id_setoran';

    protected $fillable = [
        'id_simpan',
        'tgl_setoran',
        'jumlah_setoran',
    ];

    public function simpan()
    {
        return $this->belongsTo(SimpanModel::class, 'id_simpan', 'id_simpan');
    }
}
