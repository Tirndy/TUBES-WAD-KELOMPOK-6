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
        Schema::create('produks', function (Blueprint $table) {
            $table->id();
            $table->string('nama_produk', 100)->nullable();
            $table->string('kategori', 50)->nullable();
            $table->string('merek', 50)->nullable();
            $table->integer('harga')->nullable();
            $table->integer('stok')->nullable();
            $table->integer('berat')->nullable();
            $table->text('deskripsi')->nullable();
            $table->string('status', 20)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produks');
    }
};
