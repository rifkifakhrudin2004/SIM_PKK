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
    protected $fillable = ['username', 'password', 'level_users', 'status'];

    const LEVEL_USERS = [
        'admin' => 'Admin',
        'anggota' => 'Anggota',
        'ketua_pkk' => 'Ketua_pkk',
        'bendahara_pkk' => 'Bendahara_pkk',
    ];

    const STATUS = [
        'aktif' => 'Aktif',
        'tidak aktif' => 'Tidak aktif',
        
    ];
    protected $attributes = [
        'id_admin' => null,
        'id_ketua_pkk' => null,
        'id_bendahara' => null,
        'id_anggota' => null,
    ];

    public static function getLevelUsersOptions()
    {
        return self::LEVEL_USERS;
    }

    public static function getStatusOptions()
    {
        return self::STATUS;
    }

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
