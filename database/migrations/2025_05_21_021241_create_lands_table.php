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
        Schema::create('lands', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('deskripsi')->nullable();
            $table->string('harga'); // bisa gunakan string karena format Rp100.000.000
            $table->string('lokasi');
            $table->string('status')->default('tersedia'); // tersedia, terjual, disewa
            $table->string('kategori')->default('tanah_kosong'); // tanah_kosong, sawah, kebun, dll
            $table->decimal('luas_tanah', 15, 2); // dalam m²
            $table->string('sertifikat')->nullable(); // SHM, HGB, dll
            $table->json('gambar')->nullable(); // simpan path gambar sebagai array
            $table->boolean('tampilkan_website')->default(true);
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lands');
    }
};
