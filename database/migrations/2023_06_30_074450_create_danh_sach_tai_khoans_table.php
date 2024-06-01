<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('danh_sach_tai_khoans', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('password');
            $table->string('so_dien_thoai');
            $table->date('ngay_sinh');
            $table->string('dia_chi');
            $table->string('ho_va_ten');
            $table->integer('is_block') ;
            $table->integer('tinh_trang');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('danh_sach_tai_khoans');
    }
};
