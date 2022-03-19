<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pengaduan extends Model
{
    use HasFactory;

    protected $table = 'pengaduan';

    protected $primaryKey = 'id_pengaduan';

    protected $fillable = [
        'tgl_pengaduan',
        'nik',
        'isi_laporan',
        'foto',
        'status',
        'lokasi',
    ];

    protected $dates = ['tgl_pengaduan'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(Masyarakat::class,'nik','nik');
        
    }

    public function tanggapan(){
        return $this->hasOne(Tanggapan::class, 'id_pengaduan','id_pengaduan');
    }
}
