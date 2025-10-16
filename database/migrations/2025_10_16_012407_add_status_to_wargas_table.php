<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('wargas', function (Blueprint $table) {
            if (!Schema::hasColumn('wargas', 'status')) {
                $table->string('status')->default('Warga')->after('rw');
            }
        });
    }

    public function down(): void
    {
        Schema::table('wargas', function (Blueprint $table) {
            if (Schema::hasColumn('wargas', 'status')) {
                $table->dropColumn('status');
            }
        });
    }
};
