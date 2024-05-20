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
        Schema::create('kwitansis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sewa_id');
            $table->foreign('sewa_id')->references('id')->on('sewas')->onDelete('cascade');
            $table->date('tanggal_pembayaran');
            $table->double('jumlah_pembayaran', 10, 2);
            // Tambahkan kolom lain yang sesuai dengan kebutuhan
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kwitansis');
    }
};
