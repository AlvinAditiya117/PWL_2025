<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Monolog\Level;

// class UserModel extends Model
// {
// use HasFactory;
// protected $table = 'm_user';
// protected $primaryKey = 'user_id'; 

// // protected $fillable = ['level_id', 'username','nama','password'];
// protected $fillable = ['level_id', 'username','nama','password'];

// // Jobsheet 4 Praktikum 2.7

// public function level(): BelongsTo
// {
//     return $this->belongsTo(LevelModel ::class, 'level_id', 'level_id');
// }

//jobsheet 7
class UserModel extends Authenticatable
{
    use HasFactory;

    protected $table = 'm_user';
    protected $primaryKey = 'user_id';
    protected $fillable = [
        'username',
        'password',
        'nama',
        'level_id',
        'created_at',
        'updated_at',
    ];

    protected $hidden = [
        'password', // jangan di tampilkan saat select
    ];

    protected $casts = [
        'password' => 'hashed', // casting password agar otomatis di hash
    ];

    /**
     * Relasi ke tabel level
     *
     * @return BelongsTo
     */
    public function level(): BelongsTo
    {
        return $this->belongsTo(LevelModel::class, 'level_id', 'level_id');
    }
    /**
     * Mendapatkan nama role
     */
    public function getRoleName(): string
    {
        return $this->level->level_nama;
    }

    /**
     * Cek apakah user memiliki rule tertentu
     */
    public function hasRole($role): bool
    {
        return $this->level->level_kode == $role;
    }

        /**
     * Mendapatkan kode role
     */
    public function getRole()
    {
        return $this->level->level_kode;
    }
}
