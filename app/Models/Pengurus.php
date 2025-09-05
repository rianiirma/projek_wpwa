<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengurus extends Model
{
    use HasFactory;

    protected $table = 'pengurus';

    protected $fillable = [
        'anggota_id',
        'jabatan',
        'periode',
    ];

    public function anggota()
    {
        return $this->belongsTo(Anggota::class);
    }
}
