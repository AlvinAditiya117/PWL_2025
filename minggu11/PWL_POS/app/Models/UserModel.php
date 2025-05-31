<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Monolog\Level;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;


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
class UserModel extends Authenticatable implements JWTSubject
{
    public function getJWTIdentifier()
 {
     return $this->getKey();
 }
 
 public function getJWTCustomClaims()
 {
     return [];
 }
    use HasFactory;

    protected $table = 'm_user';
    protected $primaryKey = 'user_id';
    protected $fillable = [
        'level_id',
        'username',
        'nama',
        'password',
        'profile_photo',
        'image' 
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

    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn($image) => url('/storage/posts/' . $image),
        );
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
