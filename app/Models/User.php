<?php
namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;//
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role', // admin / pengurus / anggota
    ];

    public $timestamps = true;

    public function anggota()
    {
        return $this->hasOne(Anggota::class, 'user_id');
    }

    public function pengurus()
    {
        return $this->hasOne(Pengurus::class, 'user_id');
    }
}

