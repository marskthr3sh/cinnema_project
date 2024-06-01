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
        Schema::create('user_phims', function (Blueprint $table) {
            $table->id();
            $table->integer('id_user');
            $table->integer('id_phim');
            $table->integer('rap_chieu')->comment('Đà Nẵng, Hà Nội, HCM');
            $table->integer('khung_gio_chieu')->comment('13:00 PM, 14:00 PM, 15:00 PM, 18:00 PM, 19:00 PM, 20:00 PM');
            $table->integer('phong_chieu')->comment('Phòng 3D, Phòng 2D, Phòng IMAX');
            $table->integer('so_ghe');
            $table->integer('gia_tien');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_phims');
    }
};
