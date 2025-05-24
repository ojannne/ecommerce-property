<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('buildings', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('deskripsi')->nullable();
            $table->string('harga');
            $table->string('luas_tanah')->nullable();
            $table->string('luas_bangunan')->nullable();
            $table->integer('jumlah_kamar_tidur')->nullable();
            $table->integer('jumlah_kamar_mandi')->nullable();
            $table->string('lokasi');
            $table->enum('tipe_bangunan', ['rumah', 'apartemen', 'ruko', 'kantor', 'gudang'])->default('rumah');
            $table->enum('status', ['Dijual','Disewa'])->default('Dijual');
            $table->json('gambar')->nullable(); // menyimpan array URL gambar
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('buildings');
    }
};