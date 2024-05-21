<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UsersModel extends Authenticatable implements JWTSubject
{
    use HasFactory;

    // Mengimplementasikan metode yang diperlukan oleh JWTSubject
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    // Mengatur nama tabel dan kunci primer
    protected $table = "m_users";
    protected $primaryKey = "id_users";

    // Mengatur kolom yang dapat diisi (mass assignable)
    protected $fillable = [
        'username', 'nama', 'password', 'level_id', 'status', 'id_admin'
    ];

    // Mendefinisikan konstanta untuk level pengguna
    const LEVEL_USERS = [
        '1' => 'Anggota',
        '2' => 'Bendahara PKK',
        '3' => 'Ketua PKK',
    ];

    // Mendefinisikan konstanta untuk status pengguna
    const STATUS = [
        'aktif' => 'Aktif',
        'tidak aktif' => 'Tidak aktif',
    ];

    // Mendefinisikan konstanta untuk admin
    const ADMIN = [
        '1' => 'AdminPKK',
    ];

    // Metode untuk mendapatkan opsi level pengguna
    public static function getLevelUsersOptions()
    {
        return self::LEVEL_USERS;
    }

    // Metode untuk mendapatkan opsi status
    public static function getStatusOptions()
    {
        return self::STATUS;
    }

    // Metode untuk mendapatkan opsi admin
    public static function getAdminOptions()
    {
        return self::ADMIN;
    }

    // Mendefinisikan hubungan dengan model User
    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    // Mendefinisikan hubungan dengan model LevelModel
    public function level()
    {
        return $this->belongsTo(LevelModel::class, 'level_id', 'level_id');
    }

    // Mendefinisikan hubungan dengan model AdminModel
    public function admin()
    {
        return $this->belongsTo(AdminModel::class, 'id_admin', 'id_admin');
    }
}
