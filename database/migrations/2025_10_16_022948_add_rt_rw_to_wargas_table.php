<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // ✅ Pastikan kolom rt_id & rw_id ada
        Schema::table('wargas', function (Blueprint $table) {
            if (!Schema::hasColumn('wargas', 'rt_id')) {
                $table->unsignedBigInteger('rt_id')->nullable()->after('alamat');
            }
            if (!Schema::hasColumn('wargas', 'rw_id')) {
                $table->unsignedBigInteger('rw_id')->nullable()->after('rt_id');
            }
        });

        // ✅ Bersihkan data yang tidak valid agar tidak melanggar relasi
        try {
            DB::statement('UPDATE wargas SET rt_id = NULL WHERE rt_id IS NOT NULL AND rt_id NOT IN (SELECT id FROM rts)');
            DB::statement('UPDATE wargas SET rw_id = NULL WHERE rw_id IS NOT NULL AND rw_id NOT IN (SELECT id FROM rws)');
        } catch (\Throwable $e) {
            // Abaikan jika tabel rts / rws belum ada
        }

        // ✅ Tambahkan relasi foreign key secara aman
        Schema::table('wargas', function (Blueprint $table) {
            // Pastikan tidak ada foreign key lama
            $sm = Schema::getConnection()->getDoctrineSchemaManager();
            $keys = $sm->listTableForeignKeys('wargas');

            $foreignNames = array_map(fn($fk) => $fk->getName(), $keys);

            if (!in_array('wargas_rt_id_foreign', $foreignNames)) {
                try {
                    $table->foreign('rt_id')
                        ->references('id')
                        ->on('rts')
                        ->onDelete('set null');
                } catch (\Throwable $e) {}
            }

            if (!in_array('wargas_rw_id_foreign', $foreignNames)) {
                try {
                    $table->foreign('rw_id')
                        ->references('id')
                        ->on('rws')
                        ->onDelete('set null');
                } catch (\Throwable $e) {}
            }
        });
    }

    public function down(): void
    {
        Schema::table('wargas', function (Blueprint $table) {
            try {
                $table->dropForeign(['rt_id']);
            } catch (\Throwable $e) {}

            try {
                $table->dropForeign(['rw_id']);
            } catch (\Throwable $e) {}

            if (Schema::hasColumn('wargas', 'rt_id')) {
                $table->dropColumn('rt_id');
            }

            if (Schema::hasColumn('wargas', 'rw_id')) {
                $table->dropColumn('rw_id');
            }
        });
    }
};
