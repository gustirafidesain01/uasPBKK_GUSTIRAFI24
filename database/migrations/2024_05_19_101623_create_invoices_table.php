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
        // Pastikan tabel 'invoices' belum ada sebelum membuatnya
        if (!Schema::hasTable('invoices')) {
            Schema::create('invoices', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('id_penyewa');
                $table->foreign('id_penyewa')->references('id')->on('penyewas')->onDelete('cascade');
                $table->unsignedBigInteger('id_sewa');
                $table->foreign('id_sewa')->references('id')->on('sewas')->onDelete('cascade');
                $table->unsignedBigInteger('id_kwitansi');
                $table->foreign('id_kwitansi')->references('id')->on('kwitansis')->onDelete('cascade');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Jika tabel 'invoices' sudah ada, hapus tabel tersebut ketika rollback migrasi
        if (Schema::hasTable('invoices')) {
            Schema::dropIfExists('invoices');
        }
    }
};

