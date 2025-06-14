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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('nama_program');
            $table->integer('jumlah');
            $table->text('catatan')->nullable();
            $table->integer('harga_normal');
            $table->integer('total_harga');
            $table->string('alamat');
            $table->enum('status', ['pending', 'paid', 'cancelled'])->default('pending'); 
            $table->enum('delivery_status', ['sedang diproses', 'terkirim'])->nullable();
            $table->string('midtrans_order_id')->nullable()->unique();
            $table->timestamps();
        });       
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
