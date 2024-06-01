<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SinhVien extends Model
{
    use HasFactory;
    protected $table = "sinh_viens";
    protected $fillable = [
        'ten_sv',
        'ma_sv',
        'gioi_tinh',
        'que_quan',
        // 'tinh_trang',
    ];
}
