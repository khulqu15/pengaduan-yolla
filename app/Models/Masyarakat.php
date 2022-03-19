<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Masyarakat extends Authenticatable
{
    use HasFactory;

    protected $table = 'masyarakat';

    protected $primaryKey = 'nik';

    public $incrementing = false;

    protected $keyType = 'char';

    protected $fillable = [
        'nik',
        'nama',
        'username',
        'password',
        'telp',
    ];

    public function pengaduan(): HasMany
    {
        return $this->hasMany(Pengaduan::class, 'nik', 'nik');
    }
}
