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
        Schema::create('ibadahs', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_ibadah');
            $table->string('nama_minggu');
            $table->text('tema_khotbah');
            $table->string('version_code', 10)->default('TB'); // Foreign key to alkitab_versions
            $table->string('evangelium');
            $table->string('epistel');
            $table->string('s_patik');
            $table->json('daftar_ende')->nullable(); // Store as JSON array of objects
            $table->timestamps();

            // Foreign Key Constraint (optional but recommended)
            // $table->foreign('version_code')->references('code')->on('alkitab_versions')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ibadahs');
    }
};
