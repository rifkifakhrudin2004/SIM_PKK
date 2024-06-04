<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class PembukuanArisanModel extends Model
{
    use HasFactory;

    protected $table = 'pembukuan';
    protected $primaryKey = 'id_pembukuan';
    protected $foreignKey = 'id_arisan';

    protected $fillable = [
        'id_arisan',
        'tanggal',
        'pemasukan',
        'pengeluaran',
        'saldo',
        'keterangan',
    ];

    public function arisan()
    {
        return $this->belongsTo(ArisanModel::class, 'id_arisan');
    }
}