<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up(): void
{
    Schema::table('rws', function (Blueprint $table) {
        $table->string('foto')->nullable()->after('nama_rw');
    });
}

public function down(): void
{
    Schema::table('rws', function (Blueprint $table) {
        $table->dropColumn('foto');
    });
}

};
