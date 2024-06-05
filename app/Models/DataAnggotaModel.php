<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataAnggotaModel extends Model
{
    use HasFactory;

    protected $table ='m_anggota';
    protected $primaryKey ='id_anggota';
    protected $fillable =['nama_anggota','notelp_anggota','alamat_anggota','jumlah_tanggungan','status_kesehatan','verifikasi'];
}
