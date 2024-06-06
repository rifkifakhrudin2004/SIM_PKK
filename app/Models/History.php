<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    protected $table = 'histories';
    protected $primaryKey = 'id_pembukuan';

    protected $fillable = [
        'id_pembukuan',
        'nama_pemenang',
        'tanggal',
        'nominal',
        'nama_bendahara',
        'total_uang',
    ];
}
