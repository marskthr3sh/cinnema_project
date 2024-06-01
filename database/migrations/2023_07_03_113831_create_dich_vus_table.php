<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('dich_vus', function (Blueprint $table) {
            $table->id();
            $table->string('ten_dich_vu'); //SEO
            $table->text('mo_ta');
            $table->string('hinh_anh');
            $table->integer('gia_ban');
            $table->integer('tinh_trang');
            $table->string('id_don_vi');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dich_vus');
    }
};
