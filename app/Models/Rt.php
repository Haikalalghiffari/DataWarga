<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rt extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_rt',
        'ketua_rt',
        'nik',
        'jenis_kelamin',
        'agama',
        'pekerjaan',
        'alamat',
        'foto',
        'rw_id',
    ];

    protected static function booted()
{
    static::created(function ($rt) {
        \App\Models\Warga::firstOrCreate(
            ['nama' => $rt->ketua_rt],
            [
                'nik' => $rt->nik,
                'jenis_kelamin' => $rt->jenis_kelamin,
                'agama' => $rt->agama,
                'tanggal_lahir' => now()->subYears(40),
                'pekerjaan' => $rt->pekerjaan,
                'alamat' => $rt->alamat,
                'rt_id' => $rt->id,
                'rw_id' => $rt->rw_id,
                'foto' => $rt->foto,
                'status' => 'Ketua RT',
            ]
        );
    });

        // Update otomatis kalau data RT berubah
        static::updated(function ($rt) {
            $warga = \App\Models\Warga::where('nama', $rt->ketua_rt)->first();
            if ($warga) {
                $warga->update([
                    'nik' => $rt->nik,
                    'jenis_kelamin' => $rt->jenis_kelamin,
                    'agama' => $rt->agama,
                    'pekerjaan' => $rt->pekerjaan,
                    'alamat' => $rt->alamat,
                    'rt_id' => $rt->id,
                    'rw_id' => $rt->rw_id,
                    'foto' => $rt->foto,
                ]);
            }
        });
    }

    public function rw()
    {
        return $this->belongsTo(Rw::class, 'rw_id');
    }
}
