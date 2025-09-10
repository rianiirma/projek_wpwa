<?php
namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;//
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'email',
        'role',
        'password',
    ];
    public $timestamp = true;

    public function siswa()
    {
        return $this->hasMany(Siswa::class);
    }

    public function guru()
    {
        return $this->hasOne(Guru::class, 'id_user');
    }

}
