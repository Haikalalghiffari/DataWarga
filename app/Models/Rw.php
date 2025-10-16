<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rw extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_rw',
        'ketua_rw',
        'nik',
        'jenis_kelamin',
        'agama',
        'pekerjaan',
        'alamat',
        'foto',
        'rt_tempat_tinggal_id', // ✅ untuk RT tempat tinggal Ketua RW
    ];

    /**
     * 🔹 RT tempat tinggal Ketua RW
     */
    public function rtTempatTinggal()
    {
        return $this->belongsTo(Rt::class, 'rt_tempat_tinggal_id');
    }

    /**
     * 🔹 RT bawahan RW ini
     */
    public function rts()
    {
        return $this->hasMany(Rt::class, 'rw_id');
    }

    /**
     * 🔹 Sinkronisasi otomatis dengan tabel Warga
     */
    protected static function booted()
    {
        // Saat RW baru dibuat → otomatis buat Ketua RW di tabel warga
        static::created(function ($rw) {
            // Cek apakah Ketua RW sudah ada di Warga
            $existing = \App\Models\Warga::where('nama', $rw->ketua_rw)->first();

            if (!$existing) {
                \App\Models\Warga::create([
                    'nik' => $rw->nik,
                    'nama' => $rw->ketua_rw,
                    'jenis_kelamin' => $rw->jenis_kelamin,
                    'agama' => $rw->agama,
                    'tanggal_lahir' => now()->subYears(45),
                    'pekerjaan' => $rw->pekerjaan,
                    'alamat' => $rw->alamat,
                    'rw_id' => $rw->id,
                    'rt_id' => $rw->rt_tempat_tinggal_id ?? null, // ✅ RT tempat tinggal Ketua RW
                    'foto' => $rw->foto,
                    'status' => 'Ketua RW',
                ]);
            }
        });

        // Saat RW diperbarui → update juga data Ketua RW di tabel warga
        static::updated(function ($rw) {
            $warga = \App\Models\Warga::where('status', 'Ketua RW')
                ->where('rw_id', $rw->id)
                ->first();

            if ($warga) {
                $warga->update([
                    'nik' => $rw->nik,
                    'nama' => $rw->ketua_rw,
                    'jenis_kelamin' => $rw->jenis_kelamin,
                    'agama' => $rw->agama,
                    'pekerjaan' => $rw->pekerjaan,
                    'alamat' => $rw->alamat,
                    'rw_id' => $rw->id,
                    'rt_id' => $rw->rt_tempat_tinggal_id ?? null,
                    'foto' => $rw->foto,
                ]);
            }
        });
    }
}
