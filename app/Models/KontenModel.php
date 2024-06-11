<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class KontenModel extends Model
{
    use HasFactory;
    protected $table = "m_konten";
    protected $primaryKey = "id_konten";
    protected $fillable = ['foto_konten','deskripsi_konten',];

    public function konten(): HasMany
    {
    return $this->hasMany(User::class);
    }

}

