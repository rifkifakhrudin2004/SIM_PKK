<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class angsuranModel extends Model
{
    use HasFactory;
    protected $table = "m_angsuran";
    protected $primaryKey = "id_angsuran";
    protected $fillable = ['id_pinjam','jumlah_angsuran','sisa_pinjaman','total_bayar','tanggal'];

    public function angsurans()
    {
        return $this->belongsTo(PinjamanModel::class, 'id_pinjam', 'id_pinjam');
    }
}
   


