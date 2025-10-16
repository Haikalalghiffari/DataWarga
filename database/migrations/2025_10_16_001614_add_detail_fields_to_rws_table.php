<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('rws', function (Blueprint $table) {
        $table->string('nik')->nullable();
        $table->string('jenis_kelamin')->nullable();
        $table->string('agama')->nullable();
        $table->string('pekerjaan')->nullable();
        $table->string('alamat')->nullable();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rws', function (Blueprint $table) {
            //
        });
    }
};
