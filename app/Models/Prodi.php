<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    protected $table = 'prodi'; // nama table

    protected $fillable = [
        'nama',
        'singkatan',
        'kaprodi',
        'sekretaris',
        'fakultas_id'
    ];

    public function fakultas()
    {
        return $this->belongsTo(Fakultas::class, 'fakultas_id', 'id'); // relasi ke fakultas
    }

    // public function mahasiswa()
    // {
    //     return $this->hasMany(Prodi::class, 'prodi_id', 'id');
    // }
}
