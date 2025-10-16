<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Tambahkan kolom biodata di tabel RW
        Schema::table('rws', function (Blueprint $table) {
            if (!Schema::hasColumn('rws', 'nik')) {
                $table->string('nik')->nullable();
            }
            if (!Schema::hasColumn('rws', 'jenis_kelamin')) {
                $table->string('jenis_kelamin')->nullable();
            }
            if (!Schema::hasColumn('rws', 'agama')) {
                $table->string('agama')->nullable();
            }
            if (!Schema::hasColumn('rws', 'pekerjaan')) {
                $table->string('pekerjaan')->nullable();
            }
            if (!Schema::hasColumn('rws', 'alamat')) {
                $table->string('alamat')->nullable();
            }
            if (!Schema::hasColumn('rws', 'foto')) {
                $table->string('foto')->nullable();
            }
        });

        // Tambahkan kolom biodata di tabel RT
        Schema::table('rts', function (Blueprint $table) {
            if (!Schema::hasColumn('rts', 'nik')) {
                $table->string('nik')->nullable();
            }
            if (!Schema::hasColumn('rts', 'jenis_kelamin')) {
                $table->string('jenis_kelamin')->nullable();
            }
            if (!Schema::hasColumn('rts', 'agama')) {
                $table->string('agama')->nullable();
            }
            if (!Schema::hasColumn('rts', 'pekerjaan')) {
                $table->string('pekerjaan')->nullable();
            }
            if (!Schema::hasColumn('rts', 'alamat')) {
                $table->string('alamat')->nullable();
            }
            if (!Schema::hasColumn('rts', 'foto')) {
                $table->string('foto')->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('rws', function (Blueprint $table) {
            $table->dropColumn(['nik', 'jenis_kelamin', 'agama', 'pekerjaan', 'alamat', 'foto']);
        });

        Schema::table('rts', function (Blueprint $table) {
            $table->dropColumn(['nik', 'jenis_kelamin', 'agama', 'pekerjaan', 'alamat', 'foto']);
        });
    }
};
