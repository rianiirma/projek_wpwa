<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;

    protected $table = 'anggota';

    protected $fillable = [
        'user_id',
        'nama',
        'alamat',
        'no_hp',
        'tanggal_gabung',
        'status',
    ];

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke Pengurus
    public function pengurus()
    {
        return $this->hasOne(Pengurus::class);
    }

    // Relasi ke Kehadiran
    public function kehadiran()
    {
        return $this->hasMany(Kehadiran::class);
    }

    // Relasi ke Iuran
    public function iuran()
    {
        return $this->hasMany(Iuran::class);
    }

    /*
    |--------------------------------------------------------------------------
    | Accessor untuk Status
    |--------------------------------------------------------------------------
    */

    // Label sederhana
    public function getStatusLabelAttribute()
    {
        $status = strtolower($this->status);

        if ($status === 'aktif' || $status === '1') {
            return 'Aktif';
        }

        return 'Tidak Aktif';
    }

    // Badge HTML siap pakai
    public function getStatusBadgeAttribute()
    {
        $status = strtolower($this->status);

        if ($status === 'aktif' || $status === '1') {
            return '<span class="badge bg-primary">Aktif</span>';
        }

        return '<span class="badge bg-info">Tidak Aktif</span>';
    }
}
