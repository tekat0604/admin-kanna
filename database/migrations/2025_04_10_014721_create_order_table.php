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
        Schema::create('order', function (Blueprint $table) {
            $table->id();
            $table->string('no_pesan');
            $table->string('nama');
            $table->date('tgl_pesan');
            $table->date('tgl_deadline')->nullable();
            $table->text('produk');
            $table->string('variasi')->nullable();
            $table->integer('jumlah');
            $table->integer('harga');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order');
    }
};
