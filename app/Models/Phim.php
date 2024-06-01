<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phim extends Model
{
    use HasFactory;

    protected $table = 'phims';

    protected $fillable = [
        'ten_phim',
        'slug_phim',
        'hinh_anh',
        'dao_dien',
        'dien_vien',
        'the_loai',
        'thoi_luong',
        'ngon_ngu',
        'rated',
        'mo_ta',
        'trailer',
        'bat_dau',
        'ket_thuc',
        'trang_thai',
    ];
}
