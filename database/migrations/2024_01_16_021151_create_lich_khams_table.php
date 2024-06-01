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
        Schema::create('lich_khams', function (Blueprint $table) {
            $table->id();
            $table->string('ho_ten');
            $table->date('ngay_sinh');
            $table->string('gioi_tinh')->comment('Nam, Nữ, Khác');
            $table->integer('cccd');
            $table->string('dia_chi');
            $table->string('yeu_cau_kham');
            $table->string('khung_gio') ->comment('7:00, 8:00, 9:00, 13:00, 14:00, 14:00');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lich_khams');
    }
};
