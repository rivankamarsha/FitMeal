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
        Schema::create('program', function (Blueprint $table) {
            $table->id();
            $table->string('nama_program');
            $table->string('slug')->unique();
            $table->text('deskripsi');
            $table->integer('harga_normal'); 
            $table->integer('harga_diskon')->nullable(); 
            $table->boolean('is_popular')->default(false);
            $table->string('image');
            $table->timestamps();
        });              
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('program');
    }
};
