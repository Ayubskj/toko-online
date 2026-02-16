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
            $table->id('produk_id'); //primary key sesuai erd
            $table->foreignId('penjual_id')->constrained('penjuals', 'penjual_id')->onDelete('cascade');
            $table->foreignId('kategori_id')->constrained('kategoris', 'kategori_id')->onDelete('cascade');
            $table->string('nama_produk');
            $table->integer('harga');
            $table->integer('stok');
            $table->string('foto')->nullable(); //kolom foto yang baru dibuat
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
