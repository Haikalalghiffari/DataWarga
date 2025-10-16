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
       Schema::create('wargas', function (Blueprint $table) {
    $table->id();
    $table->string('nik')->unique();
    $table->string('nama');
    $table->enum('jenis_kelamin', ['L', 'P']);
    $table->string('agama');
    $table->string('pekerjaan');
    $table->string('alamat'); // sekarang alamat diketik langsung
    $table->unsignedBigInteger('rt_id')->nullable();
    $table->unsignedBigInteger('rw_id')->nullable();
    $table->string('foto')->nullable();
    $table->string('status')->default('Warga');
    $table->timestamps();
});


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('warga');
    }
};
