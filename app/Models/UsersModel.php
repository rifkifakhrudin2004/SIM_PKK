<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UsersModel extends Model
{
    use HasFactory;

    protected $table = "m_users";
    protected $primaryKey = "id_users";
    protected $fillable = ['username', 'password','level_users','status'];

    public function users(): HasMany
    {
    return $this->hasMany(User::class);
    }
}
