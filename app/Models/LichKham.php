<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LichKham extends Model
{
    use HasFactory;
    protected $table = 'lich_khams';

    protected $fillable = [
        'ho_ten',
        'ngay_sinh',
        'gioi_tinh',
        'cccd',
        'dia_chi',
        'yeu_cau_kham',
        'khung_gio',
        'ten_don_vi',
    ];
}
