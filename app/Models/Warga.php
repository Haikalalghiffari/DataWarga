<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warga extends Model
{
    use HasFactory;

    protected $fillable = [
        'nik',
        'nama',
        'jenis_kelamin',
        'agama',
        'tanggal_lahir',
        'pekerjaan',
        'alamat',
        'rt_id',
        'rw_id',
        'foto',
        'status'
    ];

    public function rt()
{
    return $this->belongsTo(\App\Models\Rt::class, 'rt_id');
}

public function rw()
{
    return $this->belongsTo(\App\Models\Rw::class, 'rw_id');
}

}
