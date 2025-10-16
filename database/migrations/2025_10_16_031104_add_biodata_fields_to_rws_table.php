<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('rws', function (Blueprint $table) {
            if (!Schema::hasColumn('rws', 'nik')) {
                $table->string('nik')->nullable()->after('ketua_rw');
            }

            if (!Schema::hasColumn('rws', 'jenis_kelamin')) {
                $table->string('jenis_kelamin', 10)->nullable()->after('nik');
            }

            if (!Schema::hasColumn('rws', 'agama')) {
                $table->string('agama', 50)->nullable()->after('jenis_kelamin');
            }

            if (!Schema::hasColumn('rws', 'pekerjaan')) {
                $table->string('pekerjaan', 100)->nullable()->after('agama');
            }

            if (!Schema::hasColumn('rws', 'alamat')) {
                $table->string('alamat', 255)->nullable()->after('pekerjaan');
            }

            if (!Schema::hasColumn('rws', 'foto')) {
                $table->string('foto')->nullable()->after('alamat');
            }
        });
    }

    public function down(): void
    {
        Schema::table('rws', function (Blueprint $table) {
            if (Schema::hasColumn('rws', 'nik')) {
                $table->dropColumn('nik');
            }
            if (Schema::hasColumn('rws', 'jenis_kelamin')) {
                $table->dropColumn('jenis_kelamin');
            }
            if (Schema::hasColumn('rws', 'agama')) {
                $table->dropColumn('agama');
            }
            if (Schema::hasColumn('rws', 'pekerjaan')) {
                $table->dropColumn('pekerjaan');
            }
            if (Schema::hasColumn('rws', 'alamat')) {
                $table->dropColumn('alamat');
            }
            if (Schema::hasColumn('rws', 'foto')) {
                $table->dropColumn('foto');
            }
        });
    }
};
