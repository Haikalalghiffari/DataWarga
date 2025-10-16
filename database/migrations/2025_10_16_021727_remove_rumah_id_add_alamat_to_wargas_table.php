<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // 🔹 Cek apakah foreign key 'wargas_rumah_id_foreign' ada
        $hasForeignKey = DB::select("
            SELECT CONSTRAINT_NAME 
            FROM information_schema.KEY_COLUMN_USAGE 
            WHERE TABLE_NAME = 'wargas' 
            AND CONSTRAINT_NAME = 'wargas_rumah_id_foreign';
        ");

        // 🔹 Hapus foreign key kalau memang ada
        if (!empty($hasForeignKey)) {
            DB::statement('ALTER TABLE wargas DROP FOREIGN KEY wargas_rumah_id_foreign');
        }

        Schema::table('wargas', function (Blueprint $table) {
            // 🔹 Hapus kolom rumah_id jika masih ada
            if (Schema::hasColumn('wargas', 'rumah_id')) {
                $table->dropColumn('rumah_id');
            }

            // 🔹 Tambah kolom alamat jika belum ada
            if (!Schema::hasColumn('wargas', 'alamat')) {
                $table->string('alamat')->nullable()->after('pekerjaan');
            }
        });
    }

    public function down(): void
    {
        Schema::table('wargas', function (Blueprint $table) {
            // 🔹 Tambahkan kembali kolom rumah_id (jika rollback)
            if (!Schema::hasColumn('wargas', 'rumah_id')) {
                $table->unsignedBigInteger('rumah_id')->nullable();
            }

            // 🔹 Hapus kolom alamat saat rollback
            if (Schema::hasColumn('wargas', 'alamat')) {
                $table->dropColumn('alamat');
            }
        });
    }
};
