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
    protected $fillable = ['username', 'nama','password', 'level_id', 'status','id_admin'];

    const LEVEL_USERS = [
        '1' => 'Anggota',
        '2' => 'Bendahara PKK',
        '3' => 'Ketua PKK',
    ];

    const STATUS = [
        'aktif' => 'Aktif',
        'tidak aktif' => 'Tidak aktif',
        
    ];
    const Admin = [
        '1' => 'AdminPKK',
    ];

    public static function getLevelUsersOptions()
    {
        return self::LEVEL_USERS;
    }

    public static function getStatusOptions()
    {
        return self::STATUS;
    }
    public static function getAdminOptions()
    {
        return self::Admin;
    }

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
    public function level()
    {
        return $this->belongsTo(LevelModel::class, 'level_id', 'level_id');
    }
    public function admin()
    {
        return $this->belongsTo(AdminModel::class, 'id_admin', 'id_admin');
    }
}
