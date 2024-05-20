<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
class AdminModel extends Model
{
    use HasFactory;
    protected $table = "m_admin";
protected $primaryKey = "id_admin";
protected $fillable = ['nama_admin'];
public function users(): HasMany
{
return $this->hasMany(User::class);
}
}
