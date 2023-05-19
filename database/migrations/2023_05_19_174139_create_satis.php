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
        Schema::create('satis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('musteri_id');
            $table->unsignedBigInteger('urun_id');
            $table->integer("fiyat");
            $table->integer('adet');
            $table->timestamps();
            $table->foreign('musteri_id')->references('id')->on('musterilers');
            $table->foreign('urun_id')->references('id')->on('urunlers');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('satis');
    }
};
