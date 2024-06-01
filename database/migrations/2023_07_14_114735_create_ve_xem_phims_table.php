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
        Schema::create('ve_xem_phims', function (Blueprint $table) {
            $table->id();
            $table->integer('id_lich_chieu');
            $table->string('so_ghe');
            $table->string('ma_ve');
            $table->integer('gia_ve');
            $table->integer('tinh_trang');
            $table->integer('id_don_hang')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ve_xem_phims');
    }
};
