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
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('email');
            $table->string('password');
            $table->integer('id_quyen')->comment('1: Admin, 2: Kế Toán, 3: Nhân Viên');
            $table->string('ho_va_ten');
            $table->date('ngay_sinh');
            $table->string('que_quan');
            $table->string('so_dien_thoai');
            $table->integer('gioi_tinh');
            $table->string('cccd');
            $table->integer('is_block') ;
            $table->string('hash_reset')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
