<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BendaharaModel extends Model
{
    use HasFactory;

    // Specify the table associated with the model
    protected $table = 'm_bendahara_pkk';

    // Specify the primary key
    protected $primaryKey = 'id_bendahara';

    // Specify the fields that are mass assignable
    protected $fillable = [
        'nama_bendahara_pkk',
        'alamat_bendahara_pkk',
        'notelp_bendahara_pkk',
    ];
}
