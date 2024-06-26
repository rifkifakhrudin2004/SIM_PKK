<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PinjamanModel extends Model
{
    use HasFactory;

    protected $table = 'm_pinjam'; // Nama tabel
    protected $primaryKey = 'id_pinjam'; // Primary key


    protected $fillable = [
        'id_anggota', 'id_bendahara', 'tgl_pengajuan','jumlah_pinjaman',
        'status_pinjaman','status_kesehatan','cicilan','lama','bunga','status_persetujuan','status'
    ];

    // Relasi dengan arisan jika diperlukan
    public function anggota2()
    {
        return $this->belongsTo(DataAnggotaModel::class, 'id_anggota', 'id_anggota');

    }
    public function bendahara2()
    {
        return $this->belongsTo(BendaharaModel::class, 'id_bendahara', 'id_bendahara');
    }
    public function angsuran()
    {
        return $this->hasOne(angsuranModel::class, 'id_pinjam', 'id_pinjam');
    }
}
